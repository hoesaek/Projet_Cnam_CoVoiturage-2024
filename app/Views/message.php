<?php session_start(); 
require_once __DIR__ . 'header.php';
?>
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
                require_once __DIR__ . '/../db/database.php';
                $pdo = Database::getInstance()->getConnection();
                $user = $_SESSION['user_id'];

// Récupération de l'ID_ARA de l'utilisateur
$statement = $pdo->prepare("SELECT Id_ARA FROM Utilisateur WHERE Mail = :user");
$statement->execute(array(
    'user' => $user,
));
$rows = $statement->fetch(PDO::FETCH_ASSOC); // Utilisez fetch() pour récupérer une seule ligne
$ID_ara = $rows['Id_ARA']; // Récupérez l'ID_ARA de la ligne

// Identifier les utilisateurs concernés par la discussion (vous pouvez les remplacer par les IDs des utilisateurs spécifiques)
$utilisateur1 = $ID_ara;
$utilisateur2 = 'user2'; // Remplacez 'user2' par l'ID_ARA de l'utilisateur 2 si nécessaire

// Récupération des messages entre les deux utilisateurs
$stmt = $pdo->prepare('SELECT m.id_ARA_Envoi, u.Nom, m.Message, m.heure_message 
                         FROM Message m
                         INNER JOIN Utilisateur u ON m.id_ARA_Envoi = u.Id_ARA
                         WHERE (m.id_Discu IN (SELECT d.id_Discussion FROM Discussion d WHERE d.Id_Ara_Envoyeur = :utilisateur1 AND d.Id_Ara_Destinataire = :utilisateur2)
                                OR m.id_Discu IN (SELECT d.id_Discussion FROM Discussion d WHERE d.Id_Ara_Envoyeur = :utilisateur2 AND d.Id_Ara_Destinataire = :utilisateur1))
                         ORDER BY m.heure_message');
$stmt->execute(array(
    'utilisateur1' => $utilisateur1,
    'utilisateur2' => $utilisateur2
));

                while ($message = $stmt->fetch()) {
                    echo '<div class="message ' . ($message['id_ARA_Envoi'] == $utilisateur1 ? 'sent' : 'received') . '">';
                    echo '<span class="username">' . $message['Nom'] . '</span>';
                    echo '<p>' . $message['Message'] . '</p>';
                    echo '<span class="timestamp">' . $message['heure_message'] . '</span>';
                    echo '</div>';
                }
                $stmt->closeCursor(); // Termine le traitement de la requête
                ?>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Écrire un message...">
                <button class="msg-btn" onclick="window.location.href='/../../app/Views/Account/msg-process.php'">Envoyer</button>
            </div>
        </main>
        <footer>
            <button class="footer-btn" onclick="window.location.href='Accueil.php'">Accueil</button>
            <button class="footer-btn" onclick="window.location.href='Publication.php'">Publication</button>
        </footer>
    </div>
</body>
</html>
