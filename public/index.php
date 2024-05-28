<?php
require_once __DIR__ . '/../app/Views/session.php' ;
$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestUri) {
    case '/':
        checkIfLoggedIn();
        break;
    default:
        // Gérez les URL non trouvées (404)
        require_once __DIR__ . '/../app/Views/404.php';
        break;
}