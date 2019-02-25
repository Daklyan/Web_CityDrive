<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Informez-nous - City Drive</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-primary">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <div class="collapse navbar-collapse"> <a href="index.php"><img src="assets/pic/title.png" class="navbar-brand"></a>
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link text-primary" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="subscribe.php">Nos abonnements</a>
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
  <div class="py-5 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.475369416273!2d2.387470415674061!3d48.84914497928659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6727347e25d67%3A0xc73e22c1131584f7!2s242+Rue+du+Faubourg+Saint-Antoine%2C+75012+Paris!5e0!3m2!1sfr!2sfr!4v1550933272808" width="450" height="450" frameborder="1" style="border:1" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
          <h1>Contactez-nous</h1>
          <h3>Nous aimerions avoir vos retours</h3>
          <form method="POST" action="mail.php">
            <div class="form-group">
              <label>Votre nom :</label>
              <input id="name" name="name" type="text" class="form-control" placeholder="Nom, prénom..." value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>"> </div>
            <div class="form-group">
              <label>Adresse e-mail :</label>
              <input id="email" name="email" type="email" class="form-control" placeholder="E-mail..." value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"> </div>
            <div class="form-group">
              <label>Objet :</label>
              <input id="topic" name="topic" type="text" class="form-control" placeholder="Objet du mail..." value="<?php if(isset($_POST['topic'])) { echo $_POST['topic']; } ?>"> </div>
            <div class="form-group">
              <label for="Textarea">Contenue :</label>
              <textarea id="text" name="text" class="form-control" rows="3" placeholder="Description ..." value="<?php if(isset($_POST['text'])) { echo $_POST['text']; } ?>"></textarea> </div>
            <button name="mailform" type="submit" class="btn btn-secondary">Envoyer !</button>
          </form>
        </div>
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
</body>

</html>
