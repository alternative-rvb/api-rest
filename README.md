# Documentation API-REST (Beta)

Bienvenue dans la documentation de l'API-REST, une interface programmable en PHP conçue pour gérer des produits et des catégories de produits. Cette documentation est destinée à vous guider dans l'installation et l'utilisation de l'API, vous permettant d'interagir efficacement avec notre système de gestion.

## Installation

Pour démarrer avec l'API-REST, suivez ces étapes d'installation :

1. Accédez à phpMyAdmin et importez la base de données `api_rest.sql` disponible à la racine de notre projet. Cette base de données est à titre de démonstration et peut être modifiée selon vos besoins.

2. Configurez votre connexion à la base de données en modifiant le fichier `/config/Database.php` avec vos propres informations de connexion :

    ```php
    private $host = '<Votre_Host>';
    private $db_name = '<Nom_De_Votre_Base_De_Données>';
    private $username = '<Votre_Utilisateur>';
    private $password = '<Votre_Mot_De_Passe>';
    ```

## Utilisation

### Tester l'API

Pour interagir avec l'API, vous pouvez utiliser des outils de requêtes HTTP comme Postman, qui offrent une grande flexibilité pour effectuer divers tests.

#### URL de Base

La base de l'URL pour accéder à l'API est la suivante : `http://localhost/api_rest/produits`

#### Endpoints Disponibles

- **Afficher tous les produits** :
  `GET http://localhost/api_rest/produits/lire.php`

- **Afficher un produit spécifique** (en envoyant un ID) :
  `GET http://localhost/api_rest/produits/lire_un.phplire_un{id}`

- **Ajouter un produit** :
  `POST http://localhost/api_rest/produits/creer.php`

  Exemple de corps de requête pour ajouter un produit :
    ```json
    {
        "nom": "Produit1",
        "description": "Ma nouvelle description",
        "prix": "50",
        "categories_id": 5
    }
    ```

- **Mettre à jour un produit** :
  `PUT http://localhost/api_rest/produits/modifier.php`

  Exemple de corps de requête pour mettre à jour un produit :
    ```json
    {
        "id": "68",
        "nom": "Produit1",
        "description": "Description mise à jour",
        "prix": "55",
        "categories_id": 5
    }
    ```

- **Supprimer un produit** (en envoyant un ID) :
  `DELETE http://localhost/api_rest/produits/supprimer.php`

  Exemple de corps de requête pour supprimer un produit :
    ```json
    {
        "id": 5
    }
    ```

## Conclusion

Ce projet est un fork du projet disponible sur [NouvelleTechno/api-rest](https://github.com/NouvelleTechno/api-rest). Pour plus d'informations et pour contribuer, n'hésitez pas à visiter le dépôt GitHub officiel.

**Références :**

- Projet original sur GitHub : [NouvelleTechno/api-rest](https://github.com/NouvelleTechno/api-rest)
- Guide pour créer une API REST : [NouvelleTechno.fr](https://nouvelle-techno.fr/articles/live-coding-creer-une-api-rest)
