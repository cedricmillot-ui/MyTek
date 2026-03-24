<?php

// 🔹 1. Afficher toutes les erreurs en développement
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// 🔹 2. Démarrer la session utilisateur
session_start();

// 🔹 3. Charger les helpers globaux
require_once __DIR__ . '/../core/helpers.php';

// 🔹 4. Charger l'environnement (.env en local, .env sinon)
$envFile = file_exists(__DIR__ . '/../.env') 
    ? __DIR__ . '/../.env' 
    : __DIR__ . '/../.env';

if (file_exists($envFile)) {
    $env = parse_ini_file($envFile);
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
}

// 🔹 5. Autoloader PSR-4 simple
spl_autoload_register(function ($class) {
    $prefixes = [
        'App\\Controllers\\' => __DIR__ . '/../app/controllers/',
        'App\\Models\\'      => __DIR__ . '/../app/models/',
        'App\\Services\\'    => __DIR__ . '/../app/services/',
        'App\\Config\\'      => __DIR__ . '/../app/config/',
        'Core\\'             => __DIR__ . '/../core/',
        'Lib\\'              => __DIR__ . '/../src/',
    ];

    foreach ($prefixes as $prefix => $baseDir) {
        if (str_starts_with($class, $prefix)) {
            $relativeClass = substr($class, strlen($prefix));
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    }

    // 🔁 Fallback pour modules sans namespace (optionnel)
    foreach (glob(__DIR__ . '/../app/modules/*', GLOB_ONLYDIR) as $modulePath) {
        $file = $modulePath . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// 🔹 6. Charger les routes (web uniquement ici)
$routes = require_once __DIR__ . '/../app/config/routes.web.php';
if (!is_array($routes)) {
    exit("❌ Le fichier de routes ne retourne pas un tableau.");
}

// 🔹 7. Exécuter le routeur
$router = new Core\Router($routes);
$router->handle($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
