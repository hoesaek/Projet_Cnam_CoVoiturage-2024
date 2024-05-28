<?php
require_once __DIR__ . '/../../function/function.php';
require_once __DIR__ . '/../session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $userId = getidutilisateur($username, $password);

    if ($userId == $username) {
        //var_dump($userId,$username);
        loginUser($userId);
        redirect("/../../app/Views/Accueil.php") ;
        exit();
    } else {
        $error = "Identifiant ou mot de passe incorrect.";
        redirect("/../../app/Views/connexion.php?error=Identifiant ou mot de passe incorrect.");
    }
}

