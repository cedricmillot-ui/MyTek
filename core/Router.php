<?php
namespace Core;

// echo "ROUTER FICHIER CHARGÉ<br>";

class Router
{
    protected $routes = [];
    protected string $basePath = ''; // ✅ Ajout ici

    public function __construct(array $routes)
    {
        // echo "ROUTER __construct<br>";
        //$this->routes = $routes;
        $this->routes = $routes;
        $this->basePath = getenv('APP_BASE_PATH') ?: '';
        $this->basePath = rtrim($this->basePath, '/');
    }

    public function handle($uri, $method)
    {
        // echo "ROUTER handle() appelé<br>";

        $path = parse_url($uri, PHP_URL_PATH);

        // Supprimer le préfixe si besoin (ex: /byfect/public)
        // $basePath = '/byfect/public';
        // if (str_starts_with($path, $basePath)) {
        //     $path = substr($path, strlen($basePath));
        // }

        // $path = rtrim($path, '/') ?: '/';

        // Si un basePath est défini, on le supprime du path actuel
        if ($this->basePath && str_starts_with($path, $this->basePath)) {
            $path = substr($path, strlen($this->basePath));
        }

        $path = rtrim($path, '/') ?: '/';



        // echo "URI analysée : $path<br>";

        if (isset($this->routes[$path])) {
            // echo "Route trouvée : " . $this->routes[$path] . "<br>";

            [$controllerName, $methodName] = explode('@', $this->routes[$path]);

            // echo "Chargement de $controllerName → méthode $methodName<br>";

            if (!class_exists($controllerName)) {
                http_response_code(500);
                exit("❌ Contrôleur \"$controllerName\" introuvable.");
            }

            $controller = new $controllerName();
            

            if (!method_exists($controller, $methodName)) {
                http_response_code(500);
                exit("❌ Méthode \"$methodName\" introuvable dans $controllerName.");
            }

            // echo "ROUTER OK<br>";
            return $controller->$methodName();
        }

        http_response_code(404);
        // echo "<h1>❌ 404 - Route \"$path\" non trouvée</h1>";
    }
}
