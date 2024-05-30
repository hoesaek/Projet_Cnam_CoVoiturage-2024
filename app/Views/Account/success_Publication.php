<?php
require_once __DIR__ . '/../db/database.php';
require_once __DIR__ . '/../session.php';  // Ajout de la session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données soumises
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $departure = isset($_POST['departure']) ? trim($_POST['departure']) : '';
    $date = isset($_POST['date']) ? trim($_POST['date']) : '';
    $seats = isset($_POST['seats']) ? (int)$_POST['seats'] : 0;
    $vehicle = isset($_POST['vehicle']) ? trim($_POST['vehicle']) : '';

    // Préparez et exécutez votre requête d'insertion ici
    $stmt = $pdo->prepare("INSERT INTO Publication (Intitule, Lieu_depart, date_depart, Place, Vehicle) VALUES (:title, :departure, :date, :seats, :vehicle)");
    $stmt->execute([
        ':title' => $title,
        ':departure' => $departure,
        ':date' => $date,
        ':seats' => $seats,
        ':vehicle' => $vehicle,
    ]);

    // Récupérer toutes les publications pour les stocker dans la session après insertion
    $stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['publication_results'] = $rows;

    // Rediriger vers la page d'accueil
    header('Location: /../../Views/Accueil.php');
    exit();
}
