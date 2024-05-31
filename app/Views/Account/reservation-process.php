<?php

require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../function/function.php';
session_start();

$pdo = Database::getInstance()->getConnection();

if (isset($_POST['publicationId'])) {
    $publicationId = $_POST['publicationId'];
    
    $userId = $_SESSION['user_id'];


    // Début de la transaction
    try {
        // Vérifiez s'il y a des places disponibles pour la publication donnée
        $publication ;
        $stmt = $pdo->prepare("SELECT Place, Nb_place_reserver, Plein FROM publication WHERE id_Publication = :publicationId");
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$publication) {
            throw new Exception("Publication non trouvée.");
        }

        
        $stmt = $conn->prepare("INSERT INTO reservation (id_publication, Id_ARA) VALUES (?, ?)");
        $stmt->bind_param("is", $publicationId, $userId);
        $stmt->execute();

        // Mettre à jour le nombre de places réservées (simulée)
        $newNbPlaceReserver = $publication['Nb_place_reserver'] + 1;
        $newPlein = ($newNbPlaceReserver >= $publication['Place']) ? 1 : 0;

        
        $stmt = $conn->prepare("UPDATE publication SET Nb_place_reserver = ?, Plein = ? WHERE id_Publication = ?");
        $stmt->bind_param("iii", $newNbPlaceReserver, $newPlein, $publicationId);
        $stmt->execute();


        // Rediriger vers une page de succès
        redirect("/../../app/Views/Accueil.php?success=trajet reserver");
        exit();

    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }

} else {
    redirect("/../../app/Views/Accueil.php?error=Aucun identifiant de publication fourni.");
}
