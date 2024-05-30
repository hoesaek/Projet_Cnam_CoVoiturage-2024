<?php
require_once __DIR__ . '/../../app/db/database.php';

// Connexion à la base de données
$pdo = Database::getInstance()->getConnection();

// Récupération des messages depuis la base de données
$query = 'SELECT m.id_ARA_Envoi, u.Nom, m.Message, m.heure_message 
          FROM Message m
          INNER JOIN Utilisateur u ON m.id_ARA_Envoi = u.Id_ARA
          ORDER BY m.heure_message';
$stmt = $pdo->query($query);

// Affichage des messages
while ($message = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="message ' . ($message['id_ARA_Envoi'] == $id_ara ? 'sent' : 'received') . '">';
    echo '<span class="username">' . htmlspecialchars($message['Nom'] ?? '') . '</span>';
    echo '<p>' . htmlspecialchars($message['Message'] ?? '') . '</p>';
    echo '<span class="timestamp">' . htmlspecialchars($message['heure_message'] ?? '') . '</span>';
    echo '</div>';
}
