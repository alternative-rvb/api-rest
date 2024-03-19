<?php
class Produits
{
    // Connexion
    private $connexion;
    private $table = "produits";

    // object properties
    public $id;
    public $nom;
    public $description;
    public $prix;
    public $categories_id;
    public $categories_nom;
    public $created_at;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db)
    {
        $this->connexion = $db;
    }

    /**
     * Lecture des produits
     *
     * @return void
     */
    public function lire()
    {
        // On écrit la requête
        $sql = "SELECT c.nom as categories_nom, p.id, p.nom, p.description, p.prix, p.categories_id, p.created_at FROM " . $this->table . " p LEFT JOIN categories c ON p.categories_id = c.id ORDER BY p.created_at DESC";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Créer un produit
     *
     * @return void
     */
    public function creer()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " (nom, prix, description, categories_id) VALUES (:nom, :prix, :description, :categories_id)";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prix = htmlspecialchars(strip_tags($this->prix));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->categories_id = htmlspecialchars(strip_tags($this->categories_id));

        // Ajout des données protégées
        $query->bindParam(":nom", $this->nom);
        $query->bindParam(":prix", $this->prix);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":categories_id", $this->categories_id);

        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Lire un produit
     *
     * @return void
     */
    public function lireUn()
    {
        // On écrit la requête
        $sql = "SELECT c.nom as categories_nom, p.id, p.nom, p.description, p.prix, p.categories_id, p.created_at FROM " . $this->table . " p LEFT JOIN categories c ON p.categories_id = c.id WHERE p.id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifier si un résultat a été trouvé
        if ($row) {
            // On hydrate l'objet avec les données trouvées
            $this->nom = $row['nom'];
            $this->prix = $row['prix'];
            $this->description = $row['description'];
            $this->categories_id = $row['categories_id'];
            $this->categories_nom = $row['categories_nom'];
        } else {
            // Aucun produit trouvé avec cet ID, on peut définir `$this->nom` à null pour indiquer qu'aucun produit n'a été trouvé
            $this->nom = null;
        }
    }


    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer()
    {
        // Vérification de l'existence du produit
        $checkQuery = "SELECT id FROM " . $this->table . " WHERE id = ?";
        $checkStmt = $this->connexion->prepare($checkQuery);
        $checkStmt->bindParam(1, $this->id);
        $checkStmt->execute();
        if ($checkStmt->rowCount() == 0) {
            // Le produit n'existe pas
            return false;
        }

        // Le produit existe, procéder à la suppression
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";
        $query = $this->connexion->prepare($sql);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $query->bindParam(1, $this->id);

        if ($query->execute()) {
            return true;
        }
        return false;
    }


    /**
     * Mettre à jour un produit
     *
     * @return void
     */
    public function modifier()
    {
        // Vérifier d'abord si le produit existe
        $sqlExist = "SELECT id FROM " . $this->table . " WHERE id = :id LIMIT 0,1";
        $queryExist = $this->connexion->prepare($sqlExist);
        $queryExist->bindParam(':id', $this->id);
        $queryExist->execute();
        if ($queryExist->rowCount() == 0) {
            // Le produit spécifié par l'ID n'existe pas
            return false;
        }

        // Si le produit existe, procéder à la mise à jour
        $sql = "UPDATE " . $this->table . " SET nom = :nom, prix = :prix, description = :description, categories_id = :categories_id WHERE id = :id";

        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prix = htmlspecialchars(strip_tags($this->prix));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->categories_id = htmlspecialchars(strip_tags($this->categories_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Liaison des variables
        $query->bindParam(':nom', $this->nom);
        $query->bindParam(':prix', $this->prix);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':categories_id', $this->categories_id);
        $query->bindParam(':id', $this->id);

        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }

        return false;
    }
}
