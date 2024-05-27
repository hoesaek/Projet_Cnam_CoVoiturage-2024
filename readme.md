# Application de Gestion d'Utilisateurs

Ce projet est une application web pour la gestion d'utilisateurs, incluant des fonctionnalités d'inscription et de connexion. Il est développé en PHP et utilise une base de données MySQL pour le stockage des informations des utilisateurs.

## Structure du Projet

Le projet est organisé en plusieurs fichiers, chacun jouant un rôle spécifique dans le fonctionnement de l'application :

### Fichiers PHP

1. **`register.php`** : Ce fichier gère le processus d'inscription des nouveaux utilisateurs. Il effectue les opérations suivantes :
   - Récupère les données du formulaire d'inscription.
   - Vérifie si les mots de passe correspondent.
   - Utilise l'algorithme de hachage Argon2ID pour sécuriser le mot de passe.
   - Vérifie si l'adresse e-mail ou l'identifiant ARA existe déjà dans la base de données.
   - Insère un nouvel utilisateur dans la base de données.

2. **`login.php`** : Ce fichier gère le processus d'authentification des utilisateurs. Il effectue des opérations similaires à `register.php` pour la vérification du formulaire de connexion.

### Schéma de la Base de Données

Le schéma de la base de données est défini dans le fichier `projetCnam.sql`. Il contient une seule table :

- **`Utilisateur`** : Cette table stocke les informations des utilisateurs, y compris leur identifiant ARA, leur adresse e-mail et leur mot de passe. L'identifiant ARA est la clé primaire de la table, et il y a des contraintes d'unicité sur l'adresse e-mail et l'identifiant ARA.

## Utilisation

Pour utiliser l'application, vous devez mettre en place un environnement PHP et MySQL, puis importer le schéma de la base de données. Assurez-vous également d'avoir configuré correctement les paramètres de connexion à la base de données dans les fichiers PHP.

Une fois l'application configurée, vous pouvez accéder à la page d'accueil (`index.php`) où vous trouverez des formulaires d'inscription et de connexion.

## Personnalisation

Vous pouvez personnaliser l'application en modifiant les fichiers PHP pour répondre à vos besoins spécifiques. Par exemple, vous pouvez ajouter des fonctionnalités supplémentaires comme la récupération de mot de passe ou la gestion des profils utilisateur.

---

