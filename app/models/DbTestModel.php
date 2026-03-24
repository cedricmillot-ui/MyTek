<?php
namespace App\Models;

use Core\Model;

class DbTestModel extends Model
{
    /**
     * Retourne la liste des tables pour valider la connexion.
     */
    public function getTables(): array
    {
        // Test simple pour vérifier que la connexion DB fonctionne.
        return $this->db()->query('SHOW TABLES')->fetchAll();
    }
}
