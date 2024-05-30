<?php
session_start();
require_once __DIR__ . '/../../db/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
    $pdo = Database::getInstance()->getConnection();

    // Vérifie si l'utilisateur est authentifié
    if (!isset($_SESSION['user_id'])) {
        die('Erreur : utilisateur non authentifié');
    }

    $message = trim($_POST['message']);

    if (!empty($message)) {
        // Récupération de l'ID_ARA de l'utilisateur
        $user_id = $_SESSION['user_id'];
        $statement = $pdo->prepare("SELECT Id_ARA FROM Utilisateur WHERE Mail = :user");
        $statement->execute(['user' => $user_id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $id_ara = $row['Id_ARA'];

        // Exemple de l'identifiant de discussion, à remplacer par votre logique
        $discussion_id = 1; // Remplacez par l'identifiant de la discussion concernée

        // Insertion du message dans la base de données
        $stmt = $pdo->prepare('INSERT INTO Message (id_Discu, id_ARA_Envoi, Message, heure_message) VALUES (:discussion_id, :id_ARA_Envoi, :message, NOW())');
        $stmt->execute([
            'discussion_id' => $discussion_id,
            'id_ARA_Envoi' => $id_ara,
            'message' => $message,
        ]);
    }
}

// Redirection vers message.php après l'envoi du message
header('Location: /../app/Views/message.php');
exit();
