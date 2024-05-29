<?php
require_once __DIR__ . '/../../db/database.php';
$pdo = Database::getInstance()->getConnection();

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = '%' . $_GET['search'] . '%';
    $stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0 AND (Intitule LIKE ? OR Lieu_depart LIKE ? OR Lieu_arrive LIKE ?)');
    $stmt->execute([$search, $search, $search]);
} else {
    $stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0');
    $stmt->execute();
}

$rows = $stmt->fetchAll();

