
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-[$teal-500]">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li> -->
      </ul>
      
      <ul class="navbar-nav">
        <?php if (!isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=inscription">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=connexion">Connexion</a>
          </li>
        <?php else: ?>

          <li class="nav-item">
            <a class="nav-link" href="index.php?page=profil">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=logout">Déconnexion</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</header>
