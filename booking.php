    <?php
      session_start();
        if (!isset($_SESSION['flag'])) {
          require "redirect2.php";
          } else {
            $idEmployee = $_POST['idEmployee'];
     ?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>City Drive</title>
      <meta name="description" content="Booking - Le nouveau Uber !">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
    </head>

    <body class="text-center" id="div3">
      <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <div class="container">
            <div class="collapse navbar-collapse"> <img src="assets/pic/title.png" class="navbar-brand">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link text-primary" href="index.php">Acceuil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <?php
                if (isset($_SESSION['flag'])) {
                  ?>
                <li class="nav-item">
                  <a class="nav-link text-primary" href="profil.php">Compte</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="disconnect.php">Déconnexion</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link text-primary" href="register.php">Inscription</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="connection.php">Connexion</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </nav>

      </header>
      <div class="container">
        <div class="row">
          <div class="p-5 col-md-7 d-flex flex-column justify-content-center">
            <h3 class="display-4 mb-3">Title</h3>
            <img class="" src="assets/pic/staticmap.png">
          </div>
          <div class="p-5 col-md-5">
            <h3 class="mb-3">Réserve ta course !</h3>
            <form action="sendBooking.php" method="post">
              <div class="form-group">
                <label>Départ</label>
                <input class="form-control" placeholder="1 rue du carrefour, paris, 75001..." name="start">
              </div>
              <div class="form-group">
                <label>Arrivée</label>
                <input class="form-control" placeholder="2 rue de paris, paris, 75013..." name="end">
              </div>
              <div class="form-group">
                <label>Nombre de personne</label>
                <input type="number" class="form-control" placeholder="2..." name="nbrPeople">
              </div>
                <input name="idEmployee" type="hidden" value="<?php echo $idEmployee;?>"/>
                <button type="submit" class="btn btn-outline-primary m-2">Primary</button>
            </form>
          </div>
        </div>
      </div>
      <footer>
        <div class="bg-dark py-3">
          <div class="container">
            <div class="row d-flex justify-content-between">
              <div class="col-lg-4 col-md-6">
                <p class="text-secondary mb-0">© Copyright - City drive 2019</p>
              </div>
              <div class="col-lg-4 col-md-6">
                <p class="text-secondary mb-0">dev team - Cosma, Louis, Kenji</p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <script src="js/function.js"></script>
    </body>

    </html>
    <?php } ?>
