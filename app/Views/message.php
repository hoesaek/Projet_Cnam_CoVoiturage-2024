<?php
session_start();
require_once __DIR__ . '/../db/database.php';

// Constantes pour les chemins des fichiers et des URL
define('CSS_PATH', '/../../public/css/');
define('PROFILE_URL', '/../../app/Views/Profile.php');
define('RESERVATIONS_URL', 'mes_reservations.html');
define('PARAMETRES_URL', 'parametre.html');
define('MSG_PROCESS_URL', '/../../app/Views/Account/msg-process.php');

$pdo = Database::getInstance()->getConnection();

$user_id = $_SESSION['user_id'] ?? null;
$publicationID = isset($_POST['Intituler']) ? $_POST['Intituler'] : null;

function getUserIdARA($pdo, $user_id)
{
    $statement = $pdo->prepare("SELECT Id_ARA FROM Utilisateur WHERE Mail = :user");
    $statement->execute(['user' => $user_id]);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row['Id_ARA'];
}

// Fonction pour récupérer l'ID_ARA associé à la publication
function getPublicationARA($pdo, $publicationID)
{
    $statement = $pdo->prepare("SELECT Id_ARA FROM Publication WHERE id_Publication = :publicationID");
    $statement->execute(['publicationID' => $publicationID]);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['Id_ARA'] : null;
}

$id_ara = getUserIdARA($pdo, $user_id);
$other_user_ara = getPublicationARA($pdo, $publicationID);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Covoiturage CNAM</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>message.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="profile-menu">
                <div class="profile-icon"></div>
                <div class="profile-dropdown">
                    <button onclick="window.location.href='<?php echo PROFILE_URL; ?>'">Mon Compte</button>
                    <button onclick="window.location.href='<?php echo RESERVATIONS_URL; ?>'">Mes Réservations</button>
                    <button onclick="window.location.href='<?php echo PARAMETRES_URL; ?>'">Paramètres</button>
                </div>
            </div>
        </header>
        <main class="chat-container">
            <div class="chat-box">
                <?php require_once __DIR__ . '/affichage.php'; ?>
            </div>
            <div class="input-box">
                <!-- Formulaire d'envoi de message -->
                <form action="<?php echo MSG_PROCESS_URL; ?>" method="POST"> <!-- Utilisation de la constante MSG_PROCESS_URL -->
                    <!-- Champ caché pour stocker l'ID de la publication -->
                    <input type="hidden" name="publicationID" value="<?php echo $publicationID; ?>">
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
