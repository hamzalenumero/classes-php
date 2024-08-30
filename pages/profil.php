<?php

// Assurez-vous que la session est démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    
    header('Location: index.php?page=profil');
    exit;
}

// Inclure le fichier de la classe User
require_once  "classes/User.php"; 
require_once realpath( __DIR__ . "/../config/config.php");

$db = new mysqli(DM_HOST, DM_USER, DM_PASSWORD, DM_DBNAME); 

// Instancier l'utilisateur avec la connexion
$user = new User($db);
$user->setId($_SESSION['user_id']);
$user->loadUserData();

// Si le formulaire est soumis, mettre à jour les informations utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newLogin = $_POST['login'];
    $newPassword = $_POST['password'];
    $newEmail = $_POST['email'];
    $newFirstname = $_POST['firstname'];
    $newLastname = $_POST['lastname'];

    // Appeler la méthode update() pour mettre à jour les informations
    if ($user->update($_SESSION['user_id'], $newLogin, $newPassword, $newEmail, $newFirstname, $newLastname)) {
        echo "Profil mis à jour avec succès!";
        // Mettre à jour les informations de la session
        $_SESSION['login'] = $newLogin;
        $_SESSION['firstname'] = $newFirstname;
        $_SESSION['lastname'] = $newLastname;
    } else {
        echo "Erreur lors de la mise à jour du profil.";
    }


    // Si le formulaire de suppression est soumis, appeler la méthode delete()
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
        if ($user->delete()) {
            // Stocker un message de succès dans la session
            $_SESSION['message'] = "Votre compte a été supprimé avec succès.";
            // Rediriger vers la page d'accueil
            header('Location: index.php');
            exit;
        } else {
            echo "Erreur lors de la suppression du compte.";
        }
    }

}


?>

<main>
<h1>Bienvenue, <?php echo htmlspecialchars($user->firstname) . " " . htmlspecialchars($user->lastname); ?>!</h1>

<form action="" method="post">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($user->login); ?>" required><br>

    <label for="password">Nouveau mot de passe (laisser vide pour ne pas changer):</label>
    <input type="password" id="password" name="password"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required><br>

    <label for="firstname">Prénom:</label>
    <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user->firstname); ?>" required><br>

    <label for="lastname">Nom:</label>
    <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user->lastname); ?>" required><br>

    <button type="submit">Mettre à jour</button>

    <button type="submit" name="delete_account" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
        Supprimer mon compte
    </button>
</form>

</main>