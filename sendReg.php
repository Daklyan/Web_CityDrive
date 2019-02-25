<?php
session_start();
require_once('admin/bddConnect.php');
$firstName = secure($_POST['firstName']);
$secondName = secure($_POST['secondName']);
$username = secure($_POST['username']);
$email = secure($_POST['email']);
$country = secure($_POST['country']);
$address = secure($_POST['address']);
$city = secure($_POST['city']);
$dptCode = secure($_POST['dptCode']);
$password = secure($_POST['password']);
$verifPassword = secure($_POST['verifPassword']);

function secure($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// Après avoir initialiser toutes les variables (faire un contrôle d'erreur en cas d'oubli)
// On vérifie l'existence d'une adresse mail qui serai égale à celle entrée, pareillement pour l'username

$checkMail = $bdd->prepare("SELECT COUNT(*) AS nbrEmail FROM user WHERE email = ?");
$checkMail->execute(array($email));
$mailExists = $checkMail->fetch(PDO::FETCH_ASSOC);

if($mailExists['nbrEmail'] == 0) // Si l'email n'est pas utilisé
{
  if($password == $verifPassword) // Si les mots de passes rentrés correspondent
  {
    $checkUsr = $bdd->prepare("SELECT COUNT(*) AS nbrUser FROM user WHERE username = ?");
    $checkUsr->execute(array($username));
    $userExists = $checkUsr->fetch(PDO::FETCH_ASSOC);
    if($userExists['nbrUser'] == 0) // Ici tout est bon, utilisateur recevable.
    {
      // On va générer le code de validation de compte et l'insérer dans le champ "secureCode" de "user".
      $length = "7";
      $code = bin2hex(random_bytes($length));
      $createUser = $bdd->prepare("INSERT INTO user(firstName, secondName, username, email, country, address, city, dptCode, password, dateReg, lastConnection, codeSecure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), ?)");
      $createUser->execute(array($firstName, $secondName, $username, $email, mb_strtoupper($country), $address, $city, $dptCode, password_hash($password, PASSWORD_DEFAULT), $code));
      // Ici on envoie le mail qui contiendra le-dit code généré plus haut.
      if(isset($_POST['mailform']))
      {
        /*$header="MIME-Version: 1.0\r\n";
        $header.='From:"City Drive Register" <support@citydrive.com>'."\n";
        $header.='Content-Type:text/html; charset="utf-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
        <body>
        <h1>Bienvenue sur City Drive!</h1>
        <div>
        <p>Confirmez dès maintenant votre inscription cliquant sur ce lien.
        <a href="#". $code .'">Confirmer</a>. <br>
        Si vous n\'arrivez pas à accéder au lien, collez le code à l\'adresse suivante : <br>
        '. $code .' </p>
        <p>Si ce n\'était pas vous, ignorez cet email.</p>
        </div>
        </body>
        <html>
        ';
        mail($_POST['email'], "Bienvenue sur City Drive!", $message, $header); */?>
        <!DOCTYPE html>
        <html>
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>City Drive</title>
          <meta name="description" content="Inscription - Le nouveau Uber !">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
          <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
          <div class="py-5 text-center text-white align-items-center d-flex" id="div4">
            <div class="container w-50">
              <div class="row">
                <div class="col-md-12">
                  <div class="card text-primary">
                    <div class="card-header h1">Vous êtes bien enregistré sur City Drive.</div>
                    <div class="card-body">
                      <p class="text-dark">Pour continuer, vérifiez vos mails et validez votre compte. </p>
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
        header( "Refresh:5; url=index.php" );
      }
    } else {   // A partir d'ici on gère les cas d'erreur : Si l'username est déjà utilisé ?>
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
                <div class="card-header h1">Le nom d'utilisateur est déjà sur City Drive. </div>
                <div class="card-body">
                  <p class="text-dark"> vous allez être redirigez vers l'inscription dans 5 secondes. </p>
                  <a href="register.php" class="btn btn-lg btn-primary mx-1">Retour vers l'inscription</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
      <?php
     header( "Refresh:5; url=register.php" );
    }
  } else { // Si les mots de passe ne correspondent pas ?>
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
                <div class="card-header h1">Les mots de passe ne correspondent pas. </div>
                <div class="card-body">
                  <p class="text-dark"> vous allez être redirigez vers l'inscription dans 5 secondes. </p>
                  <a href="register.php" class="btn btn-lg btn-primary mx-1">Retour vers l'inscription</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
    <?php
   header( "Refresh:5; url=register.php" );
  }
} else { // Si l'adresse email existe déjà ?>
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
            <div class="card-header h1">L'adresse email existe déjà.</div>
            <div class="card-body">
              <p class="text-dark"> vous allez être redirigez vers la page de connexion dans 10 secondes.<br> Si ce n'est pas vous laissez nous un ticket sur notre page Contact disponible à l'acceuil</p>
              <a href="connection.php" class="btn btn-lg btn-primary mx-1">Connectez-vous</a>
              <a href="contact.php" class="btn btn-lg btn-primary mx-1">Contact</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
  <?php
 header( "Refresh:10; url=connection.php" );
}
?>
