<?php
session_start(); 

require_once realpath(__DIR__ . "/../config/config.php") ;

// Créer une connexion à la base de données
$connection = new mysqli(DM_HOST, DM_USER, DM_PASSWORD, DM_DBNAME);

// Vérifier la connexion
if ($connection->connect_error) {
    die('Erreur de connexion : ' . $connection->connect_error);
}

require_once (__DIR__ . '/../classes/User.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Créer une nouvelle instance de la classe User
    $user = new User($connection, $login, $password);

    // Essayer de connecter l'utilisateur
    if ($user->connect()) {
        // Connexion réussie, rediriger vers la page de profil
        header("Location: ../index.php?page=profil");
        exit;
    } else {
        echo "Utilisateur ou mot de passe incorrect.";
    }
}


// Fermer la connexion
$connection->close();
?>
