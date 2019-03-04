<?php
$action = 'projet';
require('../bddConnect.php');
// Récupération du nom de la marque et des informations de la mission sélectionnée
$req = $bdd->prepare('SELECT * FROM projet WHERE id = ?');
$req->execute(array($_POST['id']));
$projet = $req->fetch();
// recup l'user
$idUser = $projet['idUser'];
$userReq = $bdd->prepare('SELECT username FROM user WHERE id = ?');
$userReq->execute(array($idUser));
$projetUser = $userReq->fetch();
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
  <body>
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card text-dark bg-primary p-3" >
              <div class="card-body">
                <h1 class="mb-4">Modification des informations d'un projet</h1>
                <hr>
                <form action="sendProjetUpdate.php" method="post">

                  <div class="form-group">
                    <label>Créateur du projet</label>
                    <input class="form-control" type="text" value="<?php echo $projetUser['username']; ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label>Catégorie</label>
                    <select class="form-control" name="catEdit">
                      <?php
                      $req = $bdd->query('SELECT * FROM categorie');
                      foreach($req AS $nameCat) { ?>
                        <option value="<?php echo $nameCat['id'];?>"> <?php echo $nameCat['nom']; }?> </option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Nom du projet</label>
                      <input class="form-control text-white" type="text" value="<?php echo $projet['name']; ?>" name="nameEdit">
                    </div>

                    <div class="form-group">
                      <label>Objectif</label>
                      <input class="form-control text-white" value="<?php echo $projet['target']; ?>" name="targetEdit">
                    </div>

                    <div class="form-group">
                      <label>Fond Récolter</label>
                      <input class="form-control" value="<?php echo $projet['funds']; ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <input class="form-control text-white" value="<?php echo $projet['description']; ?>" name="descriptionEdit">
                    </div>

                    <div class="form-group">
                      <label>Contribution Minimal</label>
                      <input class="form-control text-white" value="<?php echo $projet['contribMin']; ?>" name="contribMinEdit">
                    </div>

                    <div class="form-group">
                      <label>Dead line</label>
                      <input class="form-control text-white" value="<?php echo $projet['deadLine']; ?>" name="deadLineEdit">
                    </div>

                    <div class="form-group">
                      <label>Validation (0 pour non | 1 pour oui)</label>
                      <input class="form-control text-white" value="<?php echo $projet['valid']; ?>" name="validEdit">
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
