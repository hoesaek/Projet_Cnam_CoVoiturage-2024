<?php
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../function/function.php';


$pdo = Database::getInstance()->getConnection();

$search = isset($_POST['search']) ? trim($_POST['search']) : '';

if (!empty($search)) {
    $query = "SELECT id_Publication, Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Lieu_depart = :search ORDER BY date_depart DESC"; 
    $statement = $pdo->prepare($query);
    $statement->bindValue(':search', $search, PDO::PARAM_STR);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['search_results'] = $rows;
} else {
    $stmt = $pdo->prepare('SELECT id_Publication, Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['search_results'] = $rows;
}


require_once __DIR__ . '/../../Views/Accueil.php';