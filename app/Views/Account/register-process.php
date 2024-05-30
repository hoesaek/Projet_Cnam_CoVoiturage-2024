<?php
require_once __DIR__ . '/../../function/function.php';
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat-password'];
    $ara = $_POST['ara']; 

    // Vérifier si les mots de passe correspondent
    if ($password !== $repeatPassword) {
        redirect("/../../app/Views/connexion.php?error=mots_de_passe_incorrect");
        exit; 
    } else {
        $options = ['memory_cost' => 1<<17, 'time_cost' => 4, 'threads' => 2]; 
        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID, $options);
        
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Utilisateur WHERE Mail = :email OR id_ARA = :ara");
        $stmt->execute(['email' => $email, 'ara' => $ara]);
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            redirect("/../../app/Views/connexion.php?error=email_exists_or_ID_ara");
            exit;
        }
        
        $stmt = $pdo->prepare("INSERT INTO Utilisateur (id_ARA, Mail, MDP) VALUES (:ara, :email, :password)");
        $stmt->execute(['ara' => $ara, 'email' => $email, 'password' => $hashedPassword]);
        
        redirect("/../../app/Views/connexion.php");
        exit;
    }
} else {
    require_once __DIR__ . "/../../app/Views/connexion.php";
    exit;
}
