<?php
namespace App\Controllers;

use App\Models\DbTestModel;
use Core\Controller;
use Lib\SEO\SEO;


class DbTestController extends Controller
{
    public function index()
    {
        $dbname = getenv('DB_NAME') ?: '';
        $env = getenv('APP_ENV') ?: 'prod';
        $tables = [];
        $error = null;

        try {
            // Test de connexion centralisé via le modèle.
            $model = new DbTestModel();
            $tables = $model->getTables();
        } catch (\PDOException $e) {
            http_response_code(500);
            $error = $env === 'dev'
                ? $e->getMessage()
                : 'Erreur de connexion à la base de données.';
        }

        $this->render('dbTest/index', [
            'dbname' => $dbname,
            'tables' => $tables,
            'error' => $error,
            'env' => $env,
        ]);
    }
}
