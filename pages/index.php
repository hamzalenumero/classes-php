<main>

    <div class="container">
        <?php if (isset($_SESSION['firstname'])): ?>
            <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['firstname']) . " " . htmlspecialchars($_SESSION['lastname']) ; ?>!</h1>
            <?php else: ?>
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert text-center alert-success" role="alert">
                        <?php
                        // Afficher le message
                        echo htmlspecialchars($_SESSION['message']);
                        // Effacer le message après affichage
                        unset($_SESSION['message']);
                        ?>
                    </div>
                    <?php endif; ?>
                    <h1 >Bienvenue sur notre site</h1>
                    <p class="text-center"><a href="index.php?page=inscription">S'inscrire</a> ou <a href="index.php?page=connexion">se connecter</a></p>
                    <?php endif; ?>
                </div>
</main>