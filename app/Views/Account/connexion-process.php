<?php
require_once __DIR__ . '/../function/function.php';
require_once __DIR__ . '/../db/database.php';
// Démarrer la session
session_start();


/**
 * Connecter un utilisateur
 * @param int $userId - L'ID de l'utilisateur
 */
function loginUser($userId) {
    // Stocker l'ID de l'utilisateur dans la session
    $_SESSION['user_id'] = $userId;
}

/**
 * Obtenir l'ID de l'utilisateur basé sur le nom d'utilisateur (email) et le mot de passe
 * @param string $username - L'email de l'utilisateur
 * @param string $password - Le mot de passe de l'utilisateur
 * @return mixed - L'ID de l'utilisateur si les informations d'identification sont correctes, sinon false
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
 * Déconnecter un utilisateur
 */
function logoutUser() {
    $_SESSION = array();

    // Si vous voulez détruire la session complètement, effacez aussi le cookie de session.
    // Notez : cela détruira la session, pas seulement les données de session.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Détruire la session
    session_destroy();
         redirect("/Account/login-process.php");
    exit();
}
