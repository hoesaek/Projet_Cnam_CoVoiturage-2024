<?php
require_once __DIR__ . '/app/Views/session.php' ;

$requestUri = $_SERVER['REQUEST_URI'];
if ($requestUri === '/' || $requestUri === '') {
    //checkIfLoggedIn();
    redirect("/app/Views/connexion.php");
} else {
    // Gérez les URL non trouvées (404)
    redirect("/app/Views/connexion.php");
    exit;
}
