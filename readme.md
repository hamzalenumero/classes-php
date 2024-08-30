# Projet PHP - Gestion des Utilisateurs


## Introduction

Ce projet PHP permet la gestion des utilisateurs avec une base de données MySQL. Il inclut des fonctionnalités pour se connecter, se déconnecter, mettre à jour et supprimer des utilisateurs à l'aide d'une classe User.

## Prérequis

Avant de commencer à utiliser le projet, assurez-vous d'avoir les éléments suivants :

- Serveur Web : Apache ou tout autre serveur supportant PHP ( WAMP, XAMP,LAMP, Laragon) selon votre choix.
- PHP : Version 8.1 ou supérieure recommandée.
- Base de Données : MySQL.

## Installation

1. Clonez le dépôt ou téléchargez les fichiers du projet sur votre serveur.


2. Configurez la base de données :
    - Créez une base de données dans MySQL.
    - Créez une table "utilisateurs" avec les colonnes suivantes :
    ```
    CREATE TABLE `utilisateurs` (
    `id` int NOT NULL AUTO_INCREMENT,
    `login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
    `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `login` (`login`),
    UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ```

3. Créez le fichier de configuration:
    - Dans le répertoire `config`, créez un fichier `config.php`.
    - Définissez les constantes suivantes pour la connexion à la base de données :

    ```
    <?php
        define('DM_HOST', 'localhost');      // Hôte de la base de données
        define('DM_USER', 'root');           // Nom d'utilisateur de la base de données
        define('DM_PASSWORD', '');       // Mot de passe de la base de données
        define('DM_DBNAME', 'nom_de_la_base');   // Nom de la base de données
    ?>
    ```

## Utilisation

1. Connexion

    La méthode `connect` de la classe `User` permet de connecter un utilisateur en vérifiant ses informations de connexion.
    ``` 
       public function connect(): bool
    {
        // Préparer la requête pour récupérer l'utilisateur avec prénom et nom
        $stmt = $this->db->prepare("SELECT id, password, firstname, lastname FROM utilisateurs WHERE login = ?");
        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $this->db->error);
        }
        $stmt->bind_param('s', $this->login);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            // L'utilisateur existe, vérifier le mot de passe
            $stmt->bind_result($user_id, $hashed_password, $firstname, $lastname);
            $stmt->fetch();

            // Utiliser le mot de passe en clair pour vérifier le hachage
            if (password_verify($this->password, $hashed_password)) {
                // Connexion réussie
                $_SESSION['user_id'] = $user_id;           
                $_SESSION['login'] = $this->login;         
                $_SESSION['firstname'] = $firstname;       
                $_SESSION['lastname'] = $lastname;       

                return true;
            } else {
                return false; // Mot de passe incorrect
            }
        } else {
            return false; // Utilisateur non trouvé
        }
    }
    ```

2. Déconnexion

    La méthode `disconnect` permet de déconnecter l'utilisateur courant en détruisant la session en redirigeant vers une page spécifiée.
    ```
      public function disconnect(string $redirectUrl = 'index.php?page=index'): void
    {
        // Détruire toutes les données de la session
        session_unset();
         session_destroy();
        
        // Rediriger vers la page spécifiée
         header('Location: ' . $redirectUrl);
        exit;
    }
    ```

3. Mise à jour

    La méthode `update` permet de mettre à jour les informations de l'utilisateur ( login, password, email, prénom, nom).
    ```
        if ($user->update($_SESSION['user_id'], $newLogin, $newPassword, $newEmail, $newFirstname, $newLastname)) {
        echo "Profil mis à jour avec succès!";
        // Mettre à jour les informations de la session
        $_SESSION['login'] = $newLogin;
        $_SESSION['firstname'] = $newFirstname;
        $_SESSION['lastname'] = $newLastname;
    } else {
        echo "Erreur lors de la mise à jour du profil.";
    }
    ```

4. Suppression

    La méthode `delete` permet de supprimer un utilisateur de la base de données et de déconnecter l'utilisateur courant.
    ```
        public function delete(): bool
    {
        // Préparer la requête pour supprimer l'utilisateur
        $stmt = $this->db->prepare("DELETE FROM utilisateurs WHERE id = ?");
        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $this->db->error);
        }
        $stmt->bind_param('i', $this->id);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Si la suppression réussit, déconnecter l'utilisateur
            $this->disconnect();

            // Retourner true pour indiquer que la suppression a réussi
            return true;
        } else {
            // En cas d'erreur, retourner false
            echo "Erreur lors de la suppression de l'utilisateur : " . $stmt->error;
            return false;
        }
    }
    ```

## Exemple d'Utilisation

Pour avoir une idée des manière dont vous pouvez utiliser ces méthodes , voici les fichiers qui utilisent les méthodes : <br>
    - `traitement_inscription.php` pour la méthode d'inscription. <br>
    - `traitement_connexion.php` pour la méthode de connexion. <br>
    - `profil.php` pour les méthode d'update et de delete. <br>


## Dépannage

- Erreur de connexion : Assurez-vous que les constantes dans `config/config.php` sont bien correctes et que que votre serveur MySQL fonctionne.
- Erreur lors de la création ou modification d'utilisateur : Vérifiez que les requêtes SQL sont correctes et que les champs dans la base de données correspondent auchamps utilisés dans le code.

## Contribution

Si vous souhaitez contribuer à ce projet ou à d'autre projets, veuillez me contacter pour en discuter.
- [Linkedin](https://www.linkedin.com/in/youssef-ghollamallah/)
