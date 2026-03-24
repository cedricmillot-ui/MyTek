<?php
namespace Core;

class Controller
{
    /**
     * Rend une vue avec le layout global
     *
     * @param string $view Nom de la vue (ex: 'main/index')
     * @param array $data Données passées à la vue
     */
    protected function render(string $view, array $data = [])
    {
        extract($data);

        // ✅ Utilisation d’un chemin absolu fiable
        $viewPath = __DIR__ . "/../app/views/$view.php";

        if (!file_exists($viewPath)) {
            http_response_code(500);
            exit("❌ Vue \"$view\" introuvable.");
        }

        // Injection du chemin de la vue pour layout
        $GLOBALS['__VIEW_PATH__'] = $viewPath;

        // ✅ Chemin absolu pour le layout aussi
        require_once __DIR__ . '/../app/templates/layout.php';
    }


    // protected function renderr(string $view, array $data = [])
    // {
    //     extract($data); // Exporte les variables

    //     // 🔹 Chemin vers la vue spécifique (ex: app/views/main/index.php)
    //     $viewPath = realpath(__DIR__ . '/../views/' . $view . '.php');
        
    //     if (!$viewPath || !file_exists($viewPath)) {
    //         http_response_code(500);
    //         exit("❌ Vue \"$view\" introuvable.");
    //     }

    //     // 🔹 Partage la vue avec le layout via une variable globale
    //     $GLOBALS['__VIEW_PATH__'] = $viewPath;

    //     // 🔹 Inclusion du layout global situé dans app/templates/layout.php
    //     $layoutPath = realpath(__DIR__ . '/../templates/layout.php');

    //     if (!$layoutPath || !file_exists($layoutPath)) {
    //         http_response_code(500);
    //         exit("❌ Layout introuvable.");
    //     }

    //     require_once $layoutPath;
    // }
}
