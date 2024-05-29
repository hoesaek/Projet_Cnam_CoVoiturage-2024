<?php
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../function/function.php';
$pdo = Database::getInstance()->getConnection();

$searchQuery = ''; 
$searchParams = []; 

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = '%' . $_GET['search'] . '%';
    $searchQuery = ' AND (Intitule LIKE ? OR Lieu_depart LIKE ? OR Lieu_arrive LIKE ?)';
    
    $searchParams = array_fill(0, 3, $search);
}

// Prépare la requête SQL avec la clause de recherche
$stmt = $pdo->prepare('SELECT Intitule, Place, date_depart, date_arrive, Lieu_depart, Lieu_arrive FROM Publication WHERE Plein = 0' . $searchQuery);
// Exécute la requête en fournissant les paramètres de recherche si nécessaire
$stmt->execute($searchParams);
$rows = $stmt->fetchAll();

//redirect('../Accueil.php');
