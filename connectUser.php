<?php
session_start();
require_once("admin/bddConnect.php");
// Connecter un utilisateur sur City Drive :
if (isset($_POST['identifiant']) && isset($_POST['password'])) {

  $identifiant = htmlspecialchars($_POST['identifiant']);
  $password = htmlspecialchars($_POST['password']);
  $req = $bdd->prepare("SELECT password FROM user WHERE email = ? OR username = ?");
  $req->execute(array($identifiant, $identifiant));
  $realMdp = $req->fetch();
  if (!empty($realMdp)) {
    if (password_verify($password, $realMdp['password']))
    {
      // Ici, la connexion s'effectue, on récupère tout ce dont on a besoin et on redirige
      $connect = $bdd->prepare("SELECT id, username, firstName, secondName, email FROM user WHERE email = ? OR username = ?");
      $connect->execute(array($identifiant, $identifiant));
      $userInfos = $connect->fetch(PDO::FETCH_ASSOC);
      $_SESSION['flag'] = true;
      $_SESSION['email'] = $userInfos['email'];
      $_SESSION['firstName'] = $userInfos['firstName'];
      $_SESSION['lastName'] = $userInfos['secondName'];
      $_SESSION['username'] = $userInfos['username'];
      $_SESSION['id'] = $userInfos['id'];
      $dateCo = $bdd->prepare("UPDATE user SET lastConnection = NOW() WHERE email = ? OR username = ?");
      $dateCo->execute(array($identifiant, $identifiant));
      ?>
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>City Drive</title>
        <meta name="description" content="Connexion - Le nouveau Uber !">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
      </head>
      <body>
        <div class="py-5 text-center text-white align-items-center d-flex" id="div4">
          <div class="container w-50">
            <div class="row">
              <div class="col-md-12">
                <div class="card text-primary">
                  <div class="card-header h1"> Vous êtes connecté. </div>
                  <div class="card-body">
                    <p class="text-dark"> vous allez etre redirigez-vers l'acceuil. </p>
                    <a href="index.php" class="btn btn-lg btn-primary mx-1">Retour vers l'accueil</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </body>

      </html>
      <?php
    } else {?>
      <!DOCTYPE html>
      <html>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>City Drive</title>
        <meta name="description" content="Connexion - Le nouveau Uber !">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
      </head>

      <body class="text-center">
        <header>
          <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
              <div class="collapse navbar-collapse"> <a href="index.php"><img src="assets/pic/title.png" class="navbar-brand"></a>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link text-primary" href="index.php">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Inscription</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <div class="py-5" id="div2" style="height : 578px">
          <div class="container">
            <div class="row">
              <div class="p-5 col-lg-6">
                <h1>Connectez-vous !</h1>
                <p class="mb-3">nous sommes contents de vous revoir chez City Drive.</p>
                <form>
                  <div class="form-group">
                    <b class="text-red">identifiant ou Mot de passe incorrect (mdp)</b>
                    <label class="sr-only">Adresse mail - Nom d'utilisateur</label>
                    <input placeholder="Email - Username" class="form-control mb-1" type="text" name="identifiant" id="identifiant" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only">Mot de passe</label>
                    <input placeholder="Mot de passe" class="form-control" type="password" name="password" id="password" required>
                    <small class="form-text text-muted text-right">
                      <a href="#"> Mot de passe oublié?</a>
                    </small>
                  </div>
                  <button type="submit" class="btn btn-primary" onclick="connectUser()">Se connecter</button>
                </form>
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
      </body>
      </html><?php
    }
  }else {?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>City Drive</title>
                <meta name="description" content="Connexion - Le nouveau Uber !">
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                        <link rel="stylesheet" href="css/style.css">
    </head>

    <body class="text-center">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container">
                    <div class="collapse navbar-collapse"> <a href="index.php"><img src="assets/pic/title.png" class="navbar-brand"></a>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Inscription</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="py-5" id="div2" style="height : 578px">
            <div class="container">
                <div class="row">
                    <div class="p-5 col-lg-6">
                        <h1>Connectez-vous !</h1>
                        <p class="mb-3">nous sommes contents de vous revoir chez City Drive.</p>
                        <form>
                            <div class="form-group">
                                <b class="text-red">identifiant ou Mot de passe incorrect (user)</b>
                                <label class="sr-only">Adresse mail - Nom d'utilisateur</label>
                                <input placeholder="Email - Username" class="form-control mb-1" type="text" name="identifiant" id="identifiant" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Mot de passe</label>
                                <input placeholder="Mot de passe" class="form-control" type="password" name="password" id="password" required>
                                    <small class="form-text text-muted text-right">
                                        <a href="#"> Mot de passe oublié?</a>
                                    </small>
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="connectUser()">Se connecter</button>
                        </form>
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
    </body>
</html><?php
}
} ?>
