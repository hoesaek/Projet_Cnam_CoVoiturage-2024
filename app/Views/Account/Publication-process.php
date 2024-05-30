<?php
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../function/function.php';
session_start();

$pdo = Database::getInstance()->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_user = $_SESSION['user_id'];
    $stmt = $pdo->prepare('SELECT Id_ARA FROM Utilisateur WHERE Mail = :email_user');
    
    // Exécuter la requête en liant les paramètres
    $stmt->execute([':email_user' => $email_user]);

    
    $id_ara_row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si un résultat a été trouvé
    if ($id_ara_row) {
        $id_ara = $id_ara_row['Id_ARA'];}
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $departure = isset($_POST['departure']) ? trim($_POST['departure']) : '';
    $arrive = isset($_POST['arrive']) ? trim($_POST['arrive']) : '';
    $dateDep = isset($_POST['date-depart']) ? $_POST['date-depart'] : '';
    $dateArr = isset($_POST['date-arriver']) ? $_POST['date-arriver'] : '';
    $dateDep_obj = date_create_from_format('Y-m-d H:i', $dateDep); 
    $dateArr_obj = date_create_from_format('Y-m-d H:i', $dateArr); 
    $seats = isset($_POST['seats']) ? (int)$_POST['seats'] : 0;;


    $dateDep_mysql = date('Y-m-d H:i:s', strtotime($dateDep));
    $dateArr_mysql = date('Y-m-d H:i:s', strtotime($dateArr));

    // Préparez et exécutez votre requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO Publication (Intitule, Lieu_depart, Lieu_Arrive, date_depart,date_arrive, Place, Id_ARA) VALUES (:title, :departure, :arrive, :dateDep,:dateArr, :seats, :id_ara)");
    $stmt->execute([
        ':title' => $title,
        ':departure' => $departure,
        ':arrive' => $arrive,
        ':dateDep' => $dateDep_mysql, 
        ':dateArr' => $dateArr_mysql, 
        ':seats' => $seats,
        ':id_ara' => $id_ara, 
]);
redirect('/../../app/Views/Accueil.php');
}else{redirect('/../../app/Views/Accueil.php');}