<?php 
//require_once __DIR__ . '/db/database.php'; // Inclure le fichier de connexion à la base de données
function redirect(string $locationName): void 
{
    header('Location: '. $locationName);
    exit;
}

function afficherErreur($erreur) {
    switch ($erreur) {
        case "mots_de_passe_incorrect":
            echo "<p>Les mots de passe ne correspondent pas.</p>";
            break;
        case "email_exists_or_ID_ara":
            echo "<p>L'e-mail ou l'identifiant ARA est déjà utilisé.</p>";
            break;
        // Ajoutez d'autres cas si nécessaire
        default:
            echo "<p>Une erreur inconnue s'est produite.</p>";
    }
}

