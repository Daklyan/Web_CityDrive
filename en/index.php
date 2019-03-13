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
    <meta name="description" content="Home page - Le nouveau Uber !">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse"> <img src="assets/pic/title.png" class="navbar-brand">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="subscribe.php">Our subscriptions</a>
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
                        <a class="nav-link text-primary" href="profil.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="disconnect.php">Log out</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connection.php">Log in</a>
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
                <p class="mb-3 lead">Look for a driver who speak your language with our instant research.</p>
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
                    <h2 class="m-4">Our services</h2>
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
                                        <h4>Private transport</h4>
                                        <p> We give you high qualified divers to get your where you want 24h/7d </p>
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
                                        <h4>Hotel</h4>
                                        <p> We have partnerships with hotels with high standing for you during your stay </p>
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
                                        <h4>Restoration</h4>
                                        <p> Find a selection of drinks, foods and gastronomic menus to eats during a drive or at a partner restaurant </p>
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
                            <h4>Cultural Activities</h4>
                            <p> Get our App and discover the cultural activities (museum, touristic visits,...) available near you. There are guides for this activities </p>
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
                                        <h4 style="">Location of equipment</h4>
                                        <p> We can borrow you tablets and computers to go with you in your activities if you don't want a physical guide. </p>
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
                            <h4>Nursery</h4>
                            <p> We have nurseries which are partner with us where you can leave your kids or pets safely during your stay</p>
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
        <h1 class="text-dark text-center">Drivers available for you !</h1>
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
