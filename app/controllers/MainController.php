<?php

namespace App\Controllers;

use Core\Controller;
use Lib\SEO\SEO;

class MainController extends Controller
{
    private string $baseUrl = "https://mytek-energies.fr";

    /* --- PAGES PRINCIPALES --- */

    public function index()
    {
        SEO::set(
            "MyTek Energies — Expert Climatisation, Chauffage & Pompes à Chaleur",
            "Spécialiste du confort thermique : installation et entretien de clim réversible, PAC air/eau et chauffe-eau thermodynamique. Devis gratuit.",
            $this->baseUrl . "/",
            $this->baseUrl . "/assets/img/MYTEK_HOME.webp"
        );

        $this->render('main/index', ['title' => 'Accueil']);
    }

    public function climatisation()
    {
        SEO::set(
            "Climatisation Réversible — Installation & Entretien MyTek Energies",
            "Installation de climatisations haute performance pour particuliers et professionnels. Économisez sur votre facture d'énergie.",
            $this->baseUrl . "/climatisation",
            $this->baseUrl . "/assets/img/Climatisation.webp"
        );
        
        $this->render('main/climatisation', ['title' => 'Climatisation']);
    }

    public function pompeAChaleur()
    {
        SEO::set(
            "Pompe à Chaleur Air/Eau — Solutions de Chauffage Écologiques",
            "Remplacez votre chaudière par une PAC air/eau performante. Réduisez vos consommations et profitez des aides d'État.",
            $this->baseUrl . "/pompe-a-chaleur",
            $this->baseUrl . "/assets/img/Pompe.webp"
        );
        
        $this->render('main/pompeAChaleur', ['title' => 'Pompe à chaleur']);
    }

    public function chauffeeau()
    {
        SEO::set(
            "Chauffe-Eau Thermodynamique — Eau Chaude à Moindre Coût",
            "Installation de ballons thermodynamiques. Une solution efficace et économique pour votre production d'eau chaude sanitaire.",
            $this->baseUrl . "/chauffe-eau",
            $this->baseUrl . "/assets/img/Chauffe-eau.webp"
        );
        
        $this->render('main/chauffe-eau', ['title' => 'Chauffe-eau']);
    }

    public function plomberie()
    {
        SEO::set(
            "Plomberie & Sanitaire — Dépannage et Rénovation MyTek",
            "Nos plombiers interviennent pour vos travaux de tuyauterie, installation de sanitaires et rénovation de salle de bain.",
            $this->baseUrl . "/plomberie",
            $this->baseUrl . "/assets/img/Plomberie.webp"
        );
        
        $this->render('main/plomberie', ['title' => 'Plomberie']);
    }

    public function nettoyage()
    {
        SEO::set(
            "Nettoyage & Désinfection de Climatisation — Qualité de l'Air",
            "Entretien complet de vos unités intérieures et extérieures. Élimination des bactéries, moisissures et optimisation du rendement.",
            $this->baseUrl . "/nettoyage",
            $this->baseUrl . "/assets/img/Nettoyage.webp"
        );
        
        $this->render('main/nettoyage', ['title' => 'Nettoyage']);
    }

    public function entretien()
    {
        SEO::set(
            "Contrat d'Entretien Chauffage et Clim — Sérénité & Longévité",
            "Assurez la pérennité de vos installations avec nos contrats de maintenance préventive pour pompes à chaleur et climatisations.",
            $this->baseUrl . "/entretien",
            $this->baseUrl . "/assets/img/Entretien.webp"
        );
        
        $this->render('main/entretien', ['title' => 'Entretien']);
    }

    public function contact()
    {
        SEO::set(
            "Contact & Devis Gratuit — MyTek Energies à votre écoute",
            "Besoin d'un dépannage ou d'une installation ? Contactez nos techniciens pour un audit gratuit de votre habitat.",
            $this->baseUrl . "/contact",
            $this->baseUrl . "/assets/img/Contact.webp"
        );
        
        $this->render('main/contact', ['title' => 'Contact']);
    }


    /* --- PAGES LÉGALES --- */

    public function mentions()
    {
        SEO::set(
            "Mentions Légales — MyTek Energies", 
            "Informations juridiques et identification de l'entreprise MyTek Energies.", 
            $this->baseUrl . "/mentions-legales"
        );
        $this->render('main/mentions', ['title' => 'Mentions légales']);
    }

    public function cgv()
    {
        SEO::set(
            "CGV — Conditions Générales de Vente MyTek Energies", 
            "Consultez nos conditions de vente et de prestation de services d'installation et de maintenance.", 
            $this->baseUrl . "/conditions-generales"
        );
        $this->render('main/cgv', ['title' => 'CGV']);
    }

    public function confidentialite()
    {
        SEO::set(
            "Politique de Confidentialité — Protection de vos données", 
            "Comment MyTek Energies protège et traite vos données personnelles conformément au RGPD.", 
            $this->baseUrl . "/politique-confidentialite"
        );
        $this->render('main/confidentialite', ['title' => 'Confidentialité']);
    }


    /* --- ERREURS --- */

    public function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        SEO::set(
            "Page non trouvée — MyTek Energies", 
            "Désolé, la page que vous recherchez n'existe pas ou a été déplacée.", 
            $this->baseUrl . "/404"
        );
        $this->render('errors/404', ['title' => 'Page introuvable']);
    }
}