<?php
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../function/function.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = Database::getInstance()->getConnection();
    $userId = $_SESSION['user_id'];
    $mail = $userId;

    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $vehicule = $_POST['vehicule'] ?? '';
    $etude = $_POST['etude'] ?? '';

    // Préparer la requête SQL pour la mise à jour en incluant la clause WHERE pour filtrer par Mail = :userId
    $sql = "UPDATE utilisateur SET 
            Prenom = :firstName, 
            Nom = :lastName, 
            Ville = :ville, 
            Vehicule = :vehicule, 
            Etude = :etude 
            WHERE Mail = :mail";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
    $stmt->bindParam(':vehicule', $vehicule, PDO::PARAM_STR);
    $stmt->bindParam(':etude', $etude, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $userId, PDO::PARAM_STR); // Utiliser $userId pour filtrer par Mail

    if ($stmt->execute()) {
        redirect('../Profile.php?update=success');
        exit;
    } else {
        redirect('../Profile.php?update=error');
        exit;
    }
}
?>
