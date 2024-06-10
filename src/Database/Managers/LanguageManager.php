<?php

namespace App\Database\Managers;

use App\Core\Manager;
use App\Database\Models\Language;
use PDOException;

class LanguageManager extends Manager
{
    public function __construct()
    {
        $this->setTable('language');
        $this->getConnection();
    }

    public function getLanguages(): array
    {
        $query = $this->_connexion->query('SELECT * FROM language ORDER BY libelle');
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Database\Models\Language");
    }
}