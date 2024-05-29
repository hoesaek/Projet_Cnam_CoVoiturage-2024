<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Discussions - Site de Covoiturage CNAM</title>
    <link rel="stylesheet" href="/../../public/css/mesdiscussions.css">
    <script src="/../../public/js/message.js"></script>
</head>
<body>
    <?php
    
    require_once __DIR__ . '/../db/database.php';
    $pdo = Database::getInstance()->getConnection();
    $utilisateurCo = 'user1';

    $stmt = $pdo->prepare("SELECT * FROM Discussion WHERE Id_Ara_Envoyeur = :utilisateurCo OR Id_Ara_Destinataire = :utilisateurCo");
    // $stmt->execute('utilisateurCo' => $utilisateurCo);
    $stmt->execute(array(
        'utilisateurCo' => $utilisateurCo
    ));
    $discussions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <header>
            <h1>Mes Discussions</h1>
            <input type="text" class="search-bar" placeholder="Rechercher...">
        </header>
        <main>
            <?php foreach ($discussions as $discussion): ?>
            <div class="conversation" onclick="window.location.href='message.php?id=<?php echo $discussion['id_Discussion']; ?>'">
                <div class="profile-icon"></div>
                <div class="conversation-info">
                    <?php
                    // Remplacer les placeholders par les informations réelles des utilisateurs
                    // À récupérer depuis votre base de données.
                    $nomEnvoyeur = "Nom de l'envoyeur";
                    $nomDestinataire = "Nom du destinataire";
                    ?>
                    <h2>Discussion avec <?php echo $nomEnvoyeur === $utilisateurCo ? $nomDestinataire : $nomEnvoyeur; ?></h2>
                </div>
            </div>
            <?php endforeach; ?>
        </main>
        <footer>
            <button class="footer-btn" onclick="window.location.href='Publication.html'">Publication</button>
            <button class="footer-btn">Nouveau Message</button>
        </footer>
    </div>
</body>
</html>
