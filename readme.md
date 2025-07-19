# Projet de Fin d'Étude - Licence CNAM : Co-Voiturage 2024

## Description

Ce projet a été réalisé dans le cadre de la Licence en Développement Web du CNAM. Il s'agit d'une application de **co-voiturage** permettant aux utilisateurs de s'inscrire, se connecter et proposer ou rechercher des trajets.

## Fonctionnalités

- **Inscription / Connexion** : Système d'authentification des utilisateurs.
- **Gestion des trajets** : Proposer un trajet, rechercher des trajets disponibles.
- **Interface utilisateur** : Page d'accueil, tableau de bord utilisateur.

## Technologies Utilisées

- **Backend** : PHP
- **Frontend** : HTML, CSS
- **Base de données** : MySQL
- **Serveur local** : PHP intégré (`php -S localhost:8088 -t public`)

## Structure du Projet

├── app/                # Logique métier
├── config/             # Configuration de l'application
├── public/             # Dossier public (index.php, assets)
├── index.php           # Point d'entrée de l'application
├── projet-bddlocal.sql # Script SQL pour la base de données
└── readme.md           # Ce fichier


## Installation

1. Clonez le dépôt :

   ```bash
   git clone https://github.com/hoesaek/Projet_Cnam_CoVoiturage-2024.git
   cd Projet_Cnam_CoVoiturage-2024
   ```

2. Importez le fichier `projet-bddlocal.sql` dans votre base de données MySQL.

3. Démarrez le serveur PHP local :

   ```bash
   php -S localhost:8088 -t public
   ```

4. Accédez à l'application via [http://localhost:8088](http://localhost:8088).

## Auteurs

* [hoesaek](https://github.com/hoesaek)
* [Nalaelle](https://github.com/Nalaelle)
* [MaxenceDuv](https://github.com/MaxenceDuv)

## Licence

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT).

```

---
