<?php
require_once __DIR__ . '/../function/function.php';
require_once __DIR__ . '/../db/database.php';

// Démarrer la session
session_start();

/**
 * Vérifie si un utilisateur est connecté.
 * Redirige vers la page de connexion s'il n'est pas connecté.
 */
function checkIfLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        redirect("/app/Views/connexion.php");
        exit();
    }
}

/**
 * Connecter un utilisateur.
 * @param int $userId - L'ID de l'utilisateur.
 */
function loginUser($userId) {
    // Stocker l'ID de l'utilisateur dans la session
    $_SESSION['user_id'] = $userId;
}

/**
 * Obtenir l'ID de l'utilisateur basé sur l'email et le mot de passe.
 * @param string $email - L'email de l'utilisateur.
 * @param string $password - Le mot de passe de l'utilisateur.
 * @return mixed - L'ID de l'utilisateur si les informations d'identification sont correctes, sinon false.
 */
function getidutilisateur($email, $password) {
    // Obtenez l'instance de connexion à la base de données
    $pdo = Database::getInstance()->getConnection();

    // Préparer la requête SQL pour rechercher l'utilisateur
    $stmt = $pdo->prepare("SELECT MDP FROM utilisateur WHERE Mail = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['MDP'])) {
        // Si c'est le cas, retournez l'e-mail de l'utilisateur
        return $email;
    }

    // Sinon, retournez false
    return false;
}

/**
 * Déconnecter un utilisateur.
 */
function logoutUser() {
    // Détruire toutes les variables de session
    $_SESSION = array();

    // Détruire la session
    session_destroy();

    redirect('/app/Views/connexion.php');
    exit();
}
