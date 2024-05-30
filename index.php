<?php
require_once __DIR__ . '/app/Views/session.php' ;
session_start();
$requestUri = $_SERVER['REQUEST_URI'];
if ($requestUri === '/' || $requestUri === '') {
    checkIfLoggedIn();
} else {
    // Gérez les URL non trouvées (404)
    redirect("/app/Views/connexion.php");
    exit;
}
