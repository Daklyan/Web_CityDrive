<?php
$action = 'categorie';
require('../bddConnect.php');
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
                <h1 class="mb-4">Ajout d'une catégorie d'une catégorie</h1>
                                  <hr>
                <form action="sendCategorieCreate.php" method="post">

                  <div class="form-group">
                    <label>Nom</label>
                      <input class="form-control text-white" type="text" name="nomEdit"></input>
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                      <input class="form-control text-white" type="text" name="descriptionEdit"></input>
                  </div>

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
