<?php
require_once __DIR__ . '/../db/database.php';
require_once __DIR__ . '/../function/function.php';

session_start();
$pdo = Database::getInstance()->getConnection();

$stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0');
$stmt->execute();
$rows = $stmt->fetchAll();

if (!isset($_SESSION['search_results'])) {
    // Si les résultats de la recherche ne sont pas présents dans la session, exécutez la requête par défaut
    $stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Utilisez les résultats de la recherche stockés dans la session
    $rows = $_SESSION['search_results'];
    // Trier le tableau des résultats par date de départ
    usort($rows, 'compare_dates');
}
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
                <form action="../../app/Views/Account/search-process.php" method="POST">
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
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Lire la suite
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
<?php } ?>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>

<script>
const toggle = document.getElementById('toggle');

let printProfile = false;
toggle.style.display = 'none';

profile.addEventListener('click', (e) => {
    console.log('profile clicked');
    printProfile = !printProfile;
    if (printProfile) {
        //toggle.removeAttribute('hidden');
        toggle.style.display = 'block';
    } else {
        //toggle.setAttribute('hidden', 'hidden');
        toggle.style.display = 'none';
    }
});
</script>
</body>
</html>

