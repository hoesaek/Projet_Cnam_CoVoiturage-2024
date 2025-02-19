<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion
    header("Location: login.php");
    exit; // Arrêter le script
}

// Inclure le fichier de connexion à la base de données
require_once __DIR__ . '/../db/database.php';
$pdo = Database::getInstance()->getConnection();

// Récupérer l'ID_ARA de l'utilisateur connecté
$user_id = $_SESSION['user_id'];

// Préparer la requête SQL pour sélectionner les publications de l'utilisateur connecté
$query = "SELECT * FROM `publication` WHERE Id_ARA = :user_id";

// Préparer la requête
$stmt = $pdo->prepare($query);

// Liaison des paramètres
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

// Exécuter la requête
$stmt->execute();

// Récupérer toutes les publications de l'utilisateur connecté
$publications = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Covoiturage CNAM</title>
    <link rel="stylesheet" href="/../../public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
</head>
<body>
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

<?php
foreach ($publications as $publication): 
    
    // Récupérer les données de la base de données
    $idPublication = htmlspecialchars($publication['id_Publication']);
    $Intitule = htmlspecialchars($publication['Intitule']);
    $Place = htmlspecialchars($publication['Place']);
    $date_depart = htmlspecialchars($publication['date_depart']);
    $date_arrive = htmlspecialchars($publication['date_arrive']);
    $Lieu_depart = htmlspecialchars($publication['Lieu_depart']);
    $Lieu_arrive = htmlspecialchars($publication['Lieu_arrive']);
    ?>

    <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 p-6 item-center">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $Intitule; ?></h5>
            </a>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400"><?php echo $Lieu_depart; ?> ➔ <?php echo $Lieu_arrive; ?></p>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400"><strong>Date de départ : </strong><?php echo $date_depart; ?></p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Date d'arrivée :</strong> <?php echo $date_arrive; ?></p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Places disponibles : </strong><?php echo $Place; ?></p>
        </div>
    </div>
<?php endforeach; ?>

<?php require_once __DIR__ . '/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>
</html>