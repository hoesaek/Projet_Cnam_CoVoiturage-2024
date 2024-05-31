<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Discussions - Site de Covoiturage CNAM</title>
    <link rel="stylesheet" href="/../../public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
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
$stmt->execute(array(
    'utilisateurCo' => $utilisateurCo
));
$discussions = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($discussions);
?>
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
    <main>
        <?php foreach ($discussions as $discussion): ?>
            <form action="message.php" method="POST">
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
                        $nomCorrespondant = $rows['Nom'] . ' ' . $rows['Prenom']; // Récupérez l'ID_ARA de la ligne
                        
                        ?>
                        <h2>Discussion avec <?php echo $nomCorrespondant; ?></h2>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </main>
<?php require_once __DIR__ . '/footer.php'; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>
</html>
