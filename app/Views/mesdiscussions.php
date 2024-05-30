<?php session_start(); ?>

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
$user = $_SESSION['user_id'];
// Récupération de l'ID_ARA de l'utilisateur
$statement = $pdo->prepare("SELECT Id_ARA FROM Utilisateur WHERE Mail = :user");
$statement->execute(array(
    'user' => $user,
));
$rows = $statement->fetch(PDO::FETCH_ASSOC); // Utilisez fetch() pour récupérer une seule ligne
$ID_ara = $rows['Id_ARA']; // Récupérez l'ID_ARA de la ligne

// Identifier les utilisateurs concernés par la discussion (vous pouvez les remplacer par les IDs des utilisateurs spécifiques)
$utilisateurCo = $ID_ara;

    $stmt = $pdo->prepare("SELECT * FROM Discussion WHERE Id_Ara_Envoyeur = :utilisateurCo OR Id_Ara_Destinataire = :utilisateurCo");
    // $stmt->execute('utilisateurCo' => $utilisateurCo);
    $stmt->execute(array(
        'utilisateurCo' => $utilisateurCo
    ));
    $discussions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($discussions);
    ?>
    <div class="container">
        <header>
            <h1>Mes Discussions</h1>
            <input type="text" class="search-bar" placeholder="Rechercher...">
        </header>
        <main>
            <?php foreach ($discussions as $discussion): ?>
                <form action="'message.php" method="POST">
                    <div class="conversation">
                        <div class="profile-icon"></div>
                        <div class="conversation-info">
                            <?php
                            // Remplacer les placeholders par les informations réelles des utilisateurs
                            // À récupérer depuis votre base de données.
                            if ($discussion['Id_Ara_Envoyeur'] === $ID_ara) {
                                $Id_Correspondant = $discussion['Id_Ara_Destinataire'];
                            } else {
                                $Id_Correspondant = $discussion['Id_Ara_Envoyeur'];
                            }
                            // Récupération de l'ID_ARA de l'utilisateur
                            $statement = $pdo->prepare("SELECT Nom, Prenom FROM Utilisateur WHERE Id_ARA = :id_USER");
                            $statement->execute(array(
                                'id_USER' => $Id_Correspondant,
                            ));
                            $rows = $statement->fetch(PDO::FETCH_ASSOC); // Utilisez fetch() pour récupérer une seule ligne
                            $nomEnvoyeur = $rows['Nom'] . ' ' . $rows['Prenom']; // Récupérez l'ID_ARA de la ligne
                            
                            ?>
                            <h2>Discussion avec <?php echo $nomEnvoyeur === $utilisateurCo ? $nomDestinataire : $nomEnvoyeur; ?></h2>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </main>
        <footer>
            <button class="footer-btn"><a href="./Accueil.php">Publications</a></button>
        </footer>
    </div>
</body>
</html>
