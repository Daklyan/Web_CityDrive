<?php
  session_start();
  require_once('admin/bddConnect.php');
  //requete pour compter le nombre de chauffeur
  $nbrDriver = $bdd->query('SELECT COUNT(*) FROM service WHERE job = "chauffeur"');
  $nbrDriver = $nbrDriver->fetch();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>City Drive</title>
  <meta name="description" content="Page d'accueil - Le nouveau Uber !">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <div class="collapse navbar-collapse"> <img src="assets/pic/title.png" class="navbar-brand">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link text-primary" href="subscribe.php">Nos abonnements</a>
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
  <div class="py-5 text-center text-md-right" id="div1">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9 card">
          <h3 class="display-3 text-primary">Let's go !</h3>
          <p class="mb-3 lead">Recherche un chauffeur qui parle ta langue avec notre recherche instantané.</p>
          <form class="form-inline d-flex justify-content-end">
            <div class="input-group"> <input type="text" class="form-control" placeholder="Recherche" name="search" id="search">
              <div class="input-group-append"><i class="fas fa-search ml-2 mt-2 text-primary"></i> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="services" class="services-area area-padding" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2 class="m-4">Nos services</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-12">
          <div class="row mb-4">
            <div class="col-md-4">
              <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="about-move">
                  <div class="services-details">
                    <div class="single-services">
                      <a class="services-icon" href="#">
                        <i class="fas fa-car text-primary"></i>
                      </a>
                      <h4>Transport privé</h4>
                      <p> Nous mettons à dispositions des chauffeurs hautement qualifiés à votre disposition pour vous transporter où bon vous semble 24h/7j </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="about-move">
                  <div class="services-details">
                    <div class="single-services">
                      <a class="services-icon" href="#">
                        <i class="fas fa-hotel text-primary"></i>
                      </a>
                      <h4>Hôtellerie</h4>
                      <p> Nous avons plusieurs hôtels partenaires de très hauts standing (4 étoiles minimum) afin de vous loger le temps de votre séjour </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="col-md-12 col-sm-4 col-xs-12">
                <div class=" about-move">
                  <div class="services-details">
                    <div class="single-services">
                      <a class="services-icon" href="#">
                        <i class="fas fa-utensils text-primary"></i>
                      </a>
                      <h4>Restauration</h4>
                      <p> Retrouvez une sélection de boissons, de repas et de menus gastronomiques à consommer en voiture ou chez nos restauarants partenaires </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="single-services">
                <a class="services-icon" href="#">
                  <i class="fas fa-map-marked-alt text-primary"></i>
                </a>
                <h4>Activités culturelles</h4>
                <p> Téléchargez notre application et découvrez les activités culturelles (musées, visites touristiques, etc..) disponibles à proximité à faire. Des accompagnateurs sont disponibles pour ces activités </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="col-md-12 col-sm-4 col-xs-12">
                <div class=" about-move">
                  <div class="services-details">
                    <div class="single-services">
                      <a class="services-icon" href="#">
                        <i class="fas fa-laptop text-primary"></i>
                      </a>
                      <h4 style="">Location de matériels</h4>
                      <p> Nous mettons à votre dispositions des tablettes et des ordinateurs pour vous accompagner dans vos activités, si vous ne souhaitez pas être accompagnés physiquement </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="single-services">
                <a class="services-icon" href="#">
                  <i class="fas fa-paw text-primary"></i>
                </a>
                <h4>Garderie</h4>
                <p> Nous avons plusieurs garderies partenaires vous permettant de laisser vos enfants ou vos animaux en toute tranquillité pendant votre séjour </p>
              </div>
            </div>
          </div>
        </div>
        <div class="services-contents">
          <div class="col-md-6 col-sm-4 col-xs-12" style="">
            <div class=" about-move">
              <div class="services-details">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-4 col-xs-12" style="">
            <div class=" about-move">
              <div class="services-details">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="album bg-light">
    <hr>
    <h1 class="text-dark text-center">Les chauffeurs disponible pour vous !</h1>
    <div class="container">
      <div class="row" id="fetch">
      </div>
    </div>
  </div>
  <hr>
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
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  load_data();
  function load_data(input) {
    $.ajax({
      url:"search.php",
      method:"post",
      data:{input},
      success:function(data) {
        $('#fetch').html(data);
      }
    });
  }
  $('#search').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();
    }
  });
});
</script>

</html>
