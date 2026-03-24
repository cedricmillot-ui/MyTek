<?php
namespace Core;

use PDO;
use PDOException;

class Model
{
    protected static ?PDO $db = null;

    public function __construct()
    {
        if (is_null(self::$db)) {
            self::connect();
        }
    }

    protected static function connect(): void
    {
        $host = getenv('DB_HOST') ?: die('Erreur : hôte de la base de données non défini');
        $port = getenv('DB_PORT') ?: '3306';
        $dbname = getenv('DB_NAME') ?: die('Erreur : nom de la base de données non défini');
        $user = getenv('DB_USER') ?: die('Erreur : utilisateur non défini');
        $pass = getenv('DB_PASS') ?: die('Erreur : mot de passe non défini');
        $charset = 'utf8mb4';

        $env = getenv('APP_ENV') ?: 'prod';

        if ($host === 'localhost' && $env !== 'dev') {
            die('Erreur : Ne pas utiliser localhost en production');
        }

        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

        try {
            self::$db = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            if ($env === 'dev') {
                die("Erreur de connexion : " . $e->getMessage());
            }
            die("Erreur de connexion à la base de données.");
        }
    }

    protected function db(): PDO
    {
        return self::$db;
    }
}
