<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php'; // Assurez-vous que le chemin est correct

class Database {
    public $connexion;

    public function getConnection() {
        $this->connexion = null;

        // Charger les variables d'environnement
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $db_name = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        try {
            $this->connexion = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $this->connexion->exec("set names utf8");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->connexion;
    }
}
