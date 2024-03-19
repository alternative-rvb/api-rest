<?php
class Database{
    // Connexion à la base de données
    private $host = "localhost";
    private $db_name = "arvb_api_rest";
    private $username = "root";
    private $password = "";
    public $connexion;

    // getter pour la connexion
    public function getConnection(){

        $this->connexion = null;

        try{
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connexion->exec("set names utf8");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->connexion;
    }   
}