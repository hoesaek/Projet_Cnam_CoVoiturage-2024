<?php
require_once __DIR__ . '/../db/database.php';
require_once __DIR__ . '/../function/function.php';
require_once __DIR__ . '/Account/search-process.php';
    $rows = $_SESSION['search_results'];
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
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <!-- Bouton de recherche -->
                <form action="" method="POST">
                    <input type="text" name="search" id="search-navbar" class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
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
    </nav>
</header>

<main class="mt-8 mb-8 flex flex-wrap justify-center">
    <?php foreach ($rows as $row) {
        // Récupérer les données de la base de données
        $Intitule = htmlspecialchars($row['Intitule']);
        $Place = htmlspecialchars($row['Place']);
        $date_depart = htmlspecialchars($row['date_depart']);
        $date_arrive = htmlspecialchars($row['date_arrive']);
        $Lieu_depart = htmlspecialchars($row['Lieu_depart']);
        $Lieu_arrive = htmlspecialchars($row['Lieu_arrive']);
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
            <!-- Bouton "Lire la suite" pour ouvrir le modal -->
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-toggle="<?php echo 'modal-' . $Intitule; ?>">
                Lire la suite
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>

            <!-- Modal -->
            <div id="<?php echo 'modal-' . $Intitule; ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white"><?php echo $Intitule; ?></h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="<?php echo 'modal-' . $Intitule; ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 md:p-5 space-y-4">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                Informations supplémentaires ici...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>
</html>