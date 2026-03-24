<?php

namespace Lib\SEO;

class SEO
{
    // Valeurs dynamiques
    protected static string $title = '';
    protected static string $description = '';
    protected static string $canonical = '';
    protected static string $image = 'https://byfect.com/assets/img/logo_B_transparent_turquoise.png';

    // Valeurs par défaut
    protected static string $defaultTitle = '';
    protected static string $defaultDescription = '';
    protected static string $defaultCanonical = '';
    protected static string $defaultImage = 'https://byfect.com/assets/img/logo_B_transparent_turquoise.png';

    /**
     * Initialise les valeurs par défaut (config globale).
     */
    public static function init(array $defaults): void
    {
        self::$defaultTitle = $defaults['title'] ?? '';
        self::$defaultDescription = $defaults['description'] ?? '';
        self::$defaultCanonical = $defaults['canonical'] ?? '';
        self::$defaultImage = $defaults['image'] ?? 'https://byfect.com/assets/img/logo_B_transparent_turquoise.png';
    }

    /**
     * Définit les balises SEO à afficher pour une page.
     */
    public static function set(
        string $title = '',
        string $description = '',
        string $canonical = '',
        string $image = 'https://byfect.com/assets/img/logo_B_transparent_turquoise.png'
    ): void {
        self::$title = $title;
        self::$description = $description;
        self::$canonical = $canonical;
        self::$image = $image;
    }

    /**
     * Affiche les balises dans le <head>.
     */
    public static function render(): void
    {
        $title = self::$title ?: self::$defaultTitle;
        $description = self::$description ?: self::$defaultDescription;
        $canonical = self::$canonical ?: self::$defaultCanonical;
        $image = self::$image ?: self::$defaultImage;

        if (!$title && !$description && !$canonical && !$image) {
            return; // ⛔️ Rien à afficher
        }

        // Balises classiques
        if ($title) {
            echo "<title>" . htmlspecialchars($title) . "</title>\n";
            echo "<meta property=\"og:title\" content=\"" . htmlspecialchars($title) . "\" />\n";
            echo "<meta name=\"twitter:title\" content=\"" . htmlspecialchars($title) . "\" />\n";
        }

        if ($description) {
            echo "<meta name=\"description\" content=\"" . htmlspecialchars($description) . "\">\n";
            echo "<meta property=\"og:description\" content=\"" . htmlspecialchars($description) . "\" />\n";
            echo "<meta name=\"twitter:description\" content=\"" . htmlspecialchars($description) . "\" />\n";
        }

        if ($canonical) {
            echo "<link rel=\"canonical\" href=\"" . htmlspecialchars($canonical) . "\">\n";
            echo "<meta property=\"og:url\" content=\"" . htmlspecialchars($canonical) . "\" />\n";
        }

        if ($image) {
            echo "<meta property=\"og:image\" content=\"" . htmlspecialchars($image) . "\" />\n";
            echo "<meta name=\"twitter:image\" content=\"" . htmlspecialchars($image) . "\" />\n";
        }

        // Défaut : Twitter en mode "summary_large_image"
        echo "<meta name=\"twitter:card\" content=\"summary_large_image\" />\n";
        echo "<meta property=\"og:type\" content=\"website\" />\n";
    }
}
