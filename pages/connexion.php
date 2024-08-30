
<style>
    main  {
        height: calc(100dvh - 55px );
    }
</style>

<main>
        <section id="form-connexion">
            <form action="pages/traitement_connexion.php" method="post">
                <div class="container">
                    <h2>Connexion</h2>
                    <div class="name-field">
                        <label for="login" >Login :</label>
                        <input type="text" id="login" name="login" class="form-control" required>
                    </div>

                    <div class="name-field">
                        <label for="password" >Mot de passe :</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <input style="margin-top: 10px;" type="submit" value="Se connecter">
                </div>
            </form>
        </section>
    </main>

  