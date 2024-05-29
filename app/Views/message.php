<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Site de Covoiturage CNAM</title>
    <link rel="stylesheet" href="/../../public/css/message.css">
    <script src="/../../public/js/message.js"></script>
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
                require_once __DIR__ . '/../db/database.php';
                $pdo = Database::getInstance()->getConnection();
                
                // Identifier les utilisateurs concernés par la discussion (vous pouvez les remplacer par les IDs des utilisateurs spécifiques)
                $utilisateur1 = 'user2';
                $utilisateur2 = 'user1';
                
                // Requête SQL pour récupérer les messages entre les deux utilisateurs
                // $stmt = $pdo->prepare('SELECT u1.Nom AS nom_envoyeur, u2.Nom AS nom_destinataire, m.Message, m.heure_message 
                //                          FROM Message m
                //                          INNER JOIN Discussion d ON m.id_Discu = d.id_Discussion
                //                          INNER JOIN Utilisateur u1 ON d.Id_Ara_Envoyeur = u1.Id_ARA
                //                          INNER JOIN Utilisateur u2 ON d.Id_Ara_Destinataire = u2.Id_ARA
                //                          WHERE (d.Id_Ara_Envoyeur = :utilisateur1 AND d.Id_Ara_Destinataire = :utilisateur2)
                //                          OR (d.Id_Ara_Envoyeur = :utilisateur2 AND d.Id_Ara_Destinataire = :utilisateur1)
                //                          ORDER BY m.heure_message');
                // $stmt->execute(array(
                //     'utilisateur1' => $utilisateur1,
                //     'utilisateur2' => $utilisateur2
                // ));

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
                
                // Affichage des messages
                // while ($message = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //     echo '<div class="message ' . ($message['nom_envoyeur'] == 'Vous' ? 'sent' : 'received') . '">';
                //     echo '<span class="username">' . $message['nom_envoyeur'] . '</span>';
                //     echo '<p>' . $message['Message'] . '</p>';
                //     echo '<span class="timestamp">' . $message['heure_message'] . '</span>';
                //     echo '</div>';
                // }
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
            <button class="footer-btn" onclick="window.location.href='Accueil.html'">Accueil</button>
            <button class="footer-btn" onclick="window.location.href='Publication.html'">Publication</button>
        </footer>
    </div>
</body>
</html>
