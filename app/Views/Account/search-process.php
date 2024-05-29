<?php
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../function/function.php';
$pdo = Database::getInstance()->getConnection();

$search = isset($_POST['search']) ? trim($_POST['search']) : '';

if ($search === '') {
    header('Location: ../Accueil.php');
    exit;
}

$stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0 AND Intitule LIKE :search');
$stmt->execute(['search' => '%' . $search . '%']);
$rows = $stmt->fetchAll();

$_SESSION['search_results'] = $rows;
redirect('../Accueil.php');