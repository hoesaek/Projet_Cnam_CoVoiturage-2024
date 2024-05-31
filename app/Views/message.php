<?php
session_start();
require_once __DIR__ . '/../db/database.php';

// Constantes pour les chemins des fichiers et des URL
define('CSS_PATH', '/../../public/css/');
define('MSG_PROCESS_URL', '/../../app/Views/Account/msg-process.php');

$pdo = Database::getInstance()->getConnection();

$user_id = $_SESSION['user_id'] ?? null;
$publicationID = isset($_POST['publicationId']) ? $_POST['publicationId'] : null;

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
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>index.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">

</head>

<body>
    <div class="container">
    <header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <img src="./../../public/images/logo.png" class="h-8" alt="Logo" />
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <!-- Bouton de recherche -->
                <form action="" method="POST">
                    <input type="text" name="search" id="search-navbar" class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="D'où voulez-vous partir ?">
                    <button type="submit" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <span class="sr-only">Search</span>
                        Rechercher
                    </button>
                </form>
                <!-- Bouton pour ouvrir le menu principal -->
                <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
        </div>

                    <!-- Dropdown Avatar -->
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button
                            type="button"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 relative"
                            id="user-menu-button"
                            aria-expanded="false"
                            data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom"
                        >
                            <!-- <span class="sr-only">Open user menu</span> -->
                            <img class="w-8 h-8 rounded-full" src="/../../public/images/chat.jpeg" alt="user photo" />
                            <span
                                class="top-0 left-7 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"
                            ></span>
                        </button>

                        <!-- Dropdown menu -->
                        <!-- IL faut ajouter les lien correct !! -->
                        <div
                            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown"
                        >
                            <div class="px-4 py-3">
                                <!-- <span class="block text-sm text-gray-900 dark:text-white">Name User </span> -->
                                <span class="block text-sm text-gray-500 truncate dark:text-gray-400"><?php echo $email_user ; ?></span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a
                                        href="./Parametre.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Parametre</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./MyPublications.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Mes publications</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./mesdiscussions.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Mes conversations</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./Profile.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Profil</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./Account/logout-process.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Déconnexion</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end -->
       
    </nav>
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
        <?php require_once __DIR__ . '/footer.php'?>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>

</html>
