<?php
namespace Core;

/**
 * Échappe une chaîne pour affichage HTML (protection XSS)
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirige vers une URL
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Vérifie si la méthode HTTP est POST
 */
function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Récupère une variable POST en toute sécurité
 */
function post($key, $default = null) {
    return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
}

/**
 * Récupère une variable GET en toute sécurité
 */
function get($key, $default = null) {
    return isset($_GET[$key]) ? trim($_GET[$key]) : $default;
}

/**
 * Génère un token CSRF simple
 */
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Vérifie la validité d’un token CSRF
 */
function csrf_verify($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Débogage rapide
 */
function dd($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}
