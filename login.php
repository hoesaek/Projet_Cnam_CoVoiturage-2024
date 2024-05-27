<?php
require_once __DIR__ . '/includes/function.php';
require_once __DIR__ . '/includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $userId = getidutilisateur($username, $password);

    if ($userId == $username) {
        //var_dump($userId,$username);
        loginUser($userId);
        redirect("index.php?Connectionreussi");
        exit();
    } else {
        $error = "Identifiant ou mot de passe incorrect.";
        redirect("index.php?error=Identifiant ou mot de passe incorrect.");
    }
}

