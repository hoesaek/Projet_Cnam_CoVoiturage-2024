<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/../db/database.php';
require_once __DIR__ . '/../function/function.php';
require_once __DIR__ . '/session.php';
require_once __DIR__ . '/Account/search-process.php';

$rows = $_SESSION['search_results'];
?>


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
                Reserver
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-toggle="<?php echo 'modal-' . $Intitule; ?>">
                Envoyez un message
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
        </div>
    </div>
    <?php } ?>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>
</html>