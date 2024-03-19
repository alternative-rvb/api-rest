# Documentation API-REST

Bienvenue dans la documentation de l'API-REST, une interface programmable en PHP conçue pour gérer des produits et des catégories de produits. Cette documentation est destinée à vous guider dans l'installation et l'utilisation de l'API, vous permettant d'interagir efficacement avec notre système de gestion.

## Installation

Pour démarrer avec l'API-REST, suivez ces étapes d'installation :

1. **Base de Données** : Accédez à phpMyAdmin et importez la base de données `api_rest.sql` disponible à la racine de notre projet. Cette base de données est à titre de démonstration et peut être modifiée selon vos besoins.

2. **Configuration de la Base de Données** : Dupliquez le fichier `.env.example` à la racine de votre projet, renommez cette copie en `.env`, et remplissez-le avec vos propres informations de connexion à la base de données.

    Exemple de contenu pour le fichier `.env` :

    ```plaintext
    DB_HOST=localhost
    DB_NAME=nom_de_votre_base_de_données
    DB_USER=votre_nom_d'utilisateur
    DB_PASS=votre_mot_de_passe
    ```

    Assurez-vous que le fichier `.env` n'est jamais inclus dans votre système de contrôle de version. Le fichier `.gitignore` devrait déjà être configuré pour exclure ce fichier.

## Utilisation

### Tester l'API

Pour interagir avec l'API, vous pouvez utiliser des outils de requêtes HTTP comme Postman, qui offrent une grande flexibilité pour effectuer divers tests.

#### URL de Base

La base de l'URL pour accéder à l'API est la suivante : `http://localhost/arvb-api-rest/produits/`

#### Endpoints Disponibles

- **Afficher tous les produits** :

  `GET http://localhost/arvb-api-rest/produits/`

- **Afficher un produit spécifique** (en envoyant un ID) :

  `GET http://localhost/arvb-api-rest/produits/single/`

  Exemple de corps de requête pour afficher un produit :

  ```json
  {
      "id": "5"
  }
  ```

- **Ajouter un produit** :

   `POST http://localhost/arvb-api-rest/produits/create/`
  
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

    `PUT http://localhost/arvb-api-rest/produits/update/`
  
    Exemple de corps de requête pour mettre à jour un produit :

    ```json
    {
        "id": "9",
        "nom": "Produit9",
        "description": "Description mise à jour",
        "prix": "99",
        "categories_id": 5
    }
    ```

- **Supprimer un produit** (en envoyant un ID) :

  `DELETE http://localhost/arvb-api-rest/produits/delete/`

  Exemple de corps de requête pour supprimer un produit :

  ```json
  {
      "id": "5"
  }

## Conclusion

Ce projet est un fork du projet disponible sur [NouvelleTechno/api-rest](https://github.com/NouvelleTechno/api-rest). Pour plus d'informations et pour contribuer, n'hésitez pas à visiter le dépôt GitHub officiel.

**Références :**

- Projet original sur GitHub : [NouvelleTechno/api-rest](https://github.com/NouvelleTechno/api-rest)
- Guide pour créer une API REST : [NouvelleTechno.fr](https://nouvelle-techno.fr/articles/live-coding-creer-une-api-rest)
