<?php
namespace App\Controllers;
use Core\Controller;
use Lib\SEO\SEO;
use Lib\Mailer\Mailer;
// Mailer::init(require __DIR__ . '/../src/Mailer/mailer.config.php');

class ContactController extends Controller
{
    public function index()
    {
    SEO::set(
    "Contact — TMP_PROJECT",
    "Vous avez un projet, une question ou besoin d’un conseil ? Contactez TMP_PROJECT pour échanger simplement.",
    "TMP_BASE_URL/contact",
    "TMP_BASE_URL/assets/img/TMP_LOGO.png"
    );


    $data = ['title' => 'Contact'];
        // echo "CONTROLLER OK<br>";
        $this->render('contact/index', $data);
        // $this->render('home');
    }

    public static function send()
    {
try {
    header('Content-Type: application/json');

    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $message   = trim($_POST['message'] ?? '');
    $hcaptchaResponse = $_POST['h-captcha-response'] ?? '';
    $consent   = $_POST['consent'] ?? '';

    // 1. Vérification des champs obligatoires
    if (!$firstname || !$lastname || !$email || !$message || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => 'Veuillez remplir tous les champs correctement.'
        ]);
        return;
    }

    // 2. Vérification du consentement
    if (!$consent) {
        echo json_encode([
            'success' => false,
            'message' => 'Vous devez accepter les mentions légales.'
        ]);
        return;
    }

    // 3. Vérification hCaptcha
    if (!$hcaptchaResponse) {
        echo json_encode([
            'success' => false,
            'message' => 'Veuillez valider le captcha.'
        ]);
        return;
    }

    $secret = getenv('HCAPTCHA_SECRET');
    if (!$secret) {
        echo json_encode([
            'success' => false,
            'message' => 'Clé secrète hCaptcha manquante sur le serveur.'
        ]);
        return;
    }

    // Requête vers l’API hCaptcha
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'secret'   => $secret,
        'response' => $hcaptchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? null
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if ($response === false) {
        echo json_encode([
            'success' => false,
            'message' => 'Erreur cURL : ' . curl_error($ch)
        ]);
        curl_close($ch);
        return;
    }
    curl_close($ch);

    $captchaSuccess = json_decode($response, true);

    // 🚨 Debug temporaire → à supprimer après validation
    if (!$captchaSuccess || !isset($captchaSuccess['success'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Réponse inattendue de hCaptcha.',
            'debug'   => $response,              // JSON brut renvoyé par hCaptcha
            'token'   => $hcaptchaResponse,      // Ce que ton formulaire envoie
            'secret'  => substr($secret, 0, 4) . '...' // Vérifier que le secret est bien chargé
        ]);
        return;
    }

    if ($captchaSuccess['success'] !== true) {
        echo json_encode([
            'success' => false,
            'message' => 'Captcha invalide. Veuillez réessayer.',
            'errors'  => $captchaSuccess['error-codes'] ?? []
        ]);
        return;
    }

    // 4. Envoi du mail via Brevo
    $subject = "Nouveau message depuis le site";
    $body = "
        <h2>Nouveau message via le formulaire</h2>
        <p><strong>Nom :</strong> {$lastname}</p>
        <p><strong>Prénom :</strong> {$firstname}</p>
        <p><strong>Email :</strong> {$email}</p>
        <p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
    ";

    $success = Mailer::sendWithBrevo($subject, $body, $email);

    echo json_encode([
        'success' => $success,
        'message' => $success
            ? "Votre message a bien été envoyé ✅"
            : "Erreur lors de l’envoi ❌"
    ]);
    exit;

} catch (\Throwable $th) {
    echo json_encode([
        'success' => false,
        'message' => "Erreur serveur : " . $th->getMessage()
    ]);
    exit;
}





    }
}
