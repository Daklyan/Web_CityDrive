<?php
$action = 'user';
require('../bddConnect.php');

//Récupération des infos 'Users'
$req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
$req->execute(array($_POST['id']));
$userInfo = $req->fetch();
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE settings -->
    <title>Administration</title>
    <!-- CSS dependencies -->
    <link type="text/css" rel="stylesheet" href="css/style.css" >
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
  </head>

  <body>
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card text-dark bg-primary p-3" >
              <div class="card-body">
                <h1 class="mb-4">Modification des informations de l'utilisateur</h1>
                                  <hr>
                <form action="sendUserUpdate.php" method="post">

                  <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['firstName']; ?>" name="firstNameEdit"> </div>
                  <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['lastName']; ?>" name="lastNameEdit"> </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['username']; ?>" name="usernameEdit">
                    </div>
                  <div class="form-group">
                    <label>Adresse</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['address']; ?>" name="addressEdit">
                    </div>
                  <div class="form-group">
                    <label>Ville</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['city']; ?>" name="cityEdit">
                    </div>
                  <div class="form-group">
                    <label>Code Postal</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['postalCode']; ?>" name="postalCodeEdit">
                    </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['description']; ?>" name="descriptionEdit">
                    </div>
                  <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['email']; ?>" name="emailEdit">
                    </div>
                  <div class="form-group">
                    <label>N° téléphone</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['phone']; ?>" name="phoneEdit">
                    </div>
                  <div class="form-group">
                    <label>Validation</label>
                    <input class="form-control text-white" value="<?php echo $userInfo['valid']; ?>" name="validEdit">
                    </div>
                  <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                  <button type="submit" class="btn btn-secondary">Envoyer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>
