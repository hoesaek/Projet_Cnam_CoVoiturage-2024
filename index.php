<?php
session_start();
require_once __DIR__ . '/app/Views/session.php' ;

$requestUri = $_SERVER['REQUEST_URI'];
if ($requestUri === '/' || $requestUri === '') {
    checkIfLoggedIn();
} else {
    redirect("/app/Views/connexion.php");
    exit;
}
