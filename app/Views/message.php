<?php 
session_start();
require_once __DIR__ . '/../db/database.php';
require_once __DIR__ . '/../../app/Views/Account/msg-process.php'; // Chemin absolu vers le fichier msg-process.php


$pdo = Database::getInstance()->getConnection();
$user_id = $_SESSION['user_id'];
$publicationId = $_POST['publicationid'];

// Récupération de l'ID_ARA de l'utilisateur connecté
$statement = $pdo->prepare("SELECT Id_ARA FROM Utilisateur WHERE Mail = :user");
$statement->execute(['user' => $user_id]);
$row = $statement->fetch(PDO::FETCH_ASSOC);
$id_ara = $row['Id_ARA'];

// Récupération de l'ID_ARA associé à la publication
$statement = $pdo->prepare("SELECT Id_ARA FROM Publication WHERE id_Publication = :publicationId");
$statement->execute(['publicationId' => $publicationId]);
$row = $statement->fetch(PDO::FETCH_ASSOC);
$other_user_ara = $row['Id_ARA'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Covoiturage CNAM</title>
    <link rel="stylesheet" href="/../../public/css/message.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="profile-menu">
                <div class="profile-icon"></div>
                <div class="profile-dropdown">
                    <button onclick="window.location.href='/../../app/Views/Profile.php'">Mon Compte</button>
                    <button onclick="window.location.href='mes_reservations.html'">Mes Réservations</button>
                    <button onclick="window.location.href='parametre.html'">Paramètres</button>
                </div>
            </div>
        </header>
        <main class="chat-container">
            <div class="chat-box">
                <?php
                $query = 'SELECT m.id_ARA_Envoi, u.Nom, m.Message, m.heure_message 
                          FROM Message m
                          INNER JOIN Utilisateur u ON m.id_ARA_Envoi = u.Id_ARA
                          WHERE (m.id_Discu IN (SELECT d.id_Discussion FROM Discussion d 
                                                WHERE d.Id_Ara_Envoyeur = :utilisateur1 AND d.Id_Ara_Destinataire = :utilisateur2)
                                 OR m.id_Discu IN (SELECT d.id_Discussion FROM Discussion d 
                                                   WHERE d.Id_Ara_Envoyeur = :utilisateur2 AND d.Id_Ara_Destinataire = :utilisateur1))
                          ORDER BY m.heure_message';
                $stmt = $pdo->prepare($query);

                $stmt->execute(['utilisateur1' => $id_ara, 'utilisateur2' => $other_user_ara]);

                while ($message = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="message ' . ($message['id_ARA_Envoi'] == $id_ara ? 'sent' : 'received') . '">';
                    echo '<span class="username">' . htmlspecialchars($message['Nom']) . '</span>';
                    echo '<p>' . htmlspecialchars($message['Message']) . '</p>';
                    echo '<span class="timestamp">' . htmlspecialchars($message['heure_message']) . '</span>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="input-box">
            <form action="/../../app/Views/Account/msg-process.php" method="POST">
                    <!-- Champ caché pour stocker l'ID de la publication -->
                    <input type="hidden" name="publicationid" value="<?php echo $publicationId; ?>">
                    <input type="text" name="message" placeholder="Écrire un message..." required>
                    <button type="submit" class="msg-btn">Envoyer</button>
                </form>
            </div>
        </main>
        <footer>
            <button class="footer-btn" onclick="window.location.href='Accueil.php'">Accueil</button>
            <button class="footer-btn" onclick="window.location.href='Publication.php'">Publication</button>
        </footer>
    </div>
</body>
</html>