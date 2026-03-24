<?php

// Fonction utilitaire pour charger dynamiquement les fichiers de routes
function loadRouteFiles(string $dir): array {
    $routes = [];

    foreach (glob($dir . '/*.php') as $file) {
        $loaded = require $file;

        if (!is_array($loaded)) {
            throw new Exception("❌ Le fichier \"$file\" doit retourner un tableau de routes.");
        }

        $routes = array_merge($routes, $loaded);
    }

    return $routes;
}


// Chargement de tous les fichiers dans app/config/routes/
$routes = loadRouteFiles(__DIR__ . '/routes');

return $routes;
