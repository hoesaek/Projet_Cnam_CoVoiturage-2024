<?php
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../function/function.php';
session_start();

$pdo = Database::getInstance()->getConnection();

$search = isset($_POST['search']) ? trim($_POST['search']) : '';

if ($search === '') {
    redirect('../Accueil.php');
    exit;
}

if (!empty($search)) {
    $query = "SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Lieu_depart = :search ORDER BY date_depart DESC"; 
    $statement = $pdo->prepare($query);
    $statement->bindValue(':search', $search, PDO::PARAM_STR);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['search_results'] = $rows;
} else {
    $stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['search_results'] = $rows;
}


redirect('../Accueil.php');
