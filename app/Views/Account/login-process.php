<?php
require_once __DIR__ . '/../../function/function.php';
require_once __DIR__ . '/../session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userId = getidutilisateur($email, $password);

    if ($userId) {
        // Stocker l'ID de l'utilisateur dans la session
        loginUser($userId);
        // Rediriger vers la page d'accueil avec un message de succès
        redirect("/app/Views/Accueil.php?success=$userId");
        exit();
    } else {
        // Rediriger vers la page de connexion avec un message d'erreur
        redirect("/app/Views/connexion.php?error=Identifiant ou mot de passe incorrect.");
        exit();
    }
}
