<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>City Drive</title>
  <meta name="description" content="Abonnements - Le nouveau Uber !">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="text-center">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <div class="collapse navbar-collapse"> <a href="index.php"><img src="assets/pic/title.png" class="navbar-brand"></a>
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
  <div class="py-5" id="sub">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table text-center">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th class="text-center">
                  <h3> Compte essai </h3>
                  <h2> <b>Gratuit</b> </h2> <a class="btn btn-link text-primary" href="#">NULL</a>
                </th>
                <th class="text-center">
                  <h3> Simple </h3>
                  <h2> <b>49$</b> </h2> <a class="btn btn-link text-primary" href="#">NULL</a>
                </th>
                <th class="text-center">
                  <h3> Business </h3>
                  <h2> <b>99$</b> </h2> <a class="btn btn-link text-primary" href="#">NULL</a>
                </th>
              </tr>
              <tr>
                <td></td>
                <td>Bienvenue sur City Drive !</td>
                <td>Rejoignez la communauté City Drive <br>et bénéficiez de tarifs préférentiels !</td>
                <td>Rejoignez la communauté Business de City Drive <br>et devenez membre institutionnels !</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>NULL</td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
              </tr>
              <tr>
                <td>NULL</td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
              </tr>
              <tr>
                <td>NULL</td>
                <td></td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
              </tr>
              <tr>
                <td>NULL</td>
                <td></td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
              </tr>
              <tr>
                <td>NULL</td>
                <td></td>
                <td></td>
                <td> <i class="fa fa-check fa-lg text-muted"></i> </td>
              </tr>
              <tr>
                <td>NULL</td>
                <td></td>
                <td></td>
                <td> <i class="fa fa-check fa-lg text-muted"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="bg-dark p-2">
      <div class="container mt-1">
        <div class="row d-flex justify-content-between">
          <div class="col-lg-4">
            <p class="text-secondary">© Copyright - City drive 2019</p>
          </div>
          <div class="col-lg-4">
            <p class="text-secondary">dev team - Cosma, Louis, Kenji</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/function.js"></script>
</body>

</html>
