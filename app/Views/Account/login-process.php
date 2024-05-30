<?php
session_start();
require_once __DIR__ . '/../../function/function.php';
require_once __DIR__ . '/../session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $userId = getidutilisateur($email, $password);

        if ($userId) {
            // Regénérer l'ID de session pour prévenir les attaques de fixation de session
            session_regenerate_id(true);
            
            $_SESSION['user_id'] = $userId;

            
            redirect('/../../app/Views/Accueil.php');
            exit();
        } else {
            // Redirection vers la page de connexion avec un message d'erreur
            header('Location: /app/Views/connexion.php?error=Identifiant ou mot de passe incorrect.');
            exit();
        }
    } else {
        // Redirection vers la page de connexion avec un message d'erreur si les champs ne sont pas définis
        header('Location: /app/Views/connexion.php?error=Veuillez remplir tous les champs.');
        exit();
    }
}
