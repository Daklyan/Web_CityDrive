<?php
session_start();
require_once('admin/bddConnect.php');
require_once('php/function.php');
    if (!isset($_POST['start']) && !isset($_POST['nbrPeople']) && !isset($_POST['end']) ) {
      header("url=booking.php");
      } else {
$km = rand (2,15);
$idEmployee = $_POST['idEmployee'];
$idUser = $_SESSION['id'];
$start = secure($_POST['start']);
$end = secure($_POST['end']);
$nbrPeople = secure($_POST['nbrPeople']);
$mdj = !empty($_POST['mdj']) ? secure($_POST['mdj']) : 0;
$mg = !empty($_POST['mg']) ? secure($_POST['mg'] ) : 0;
$mr = !empty($_POST['mr']) ? secure($_POST['mr']) : 0;
$mac1 = !empty($_POST['mac1']) ? $_POST['mac1'] : 0;
$mac2 = !empty($_POST['mac2']) ? $_POST['mac2'] : 0;
$laptop = !empty($_POST['laptop']) ? $_POST['laptop'] : 0;
$android = !empty($_POST['android']) ? $_POST['android'] : 0;
$ipad = !empty($_POST['ipad']) ? $_POST['ipad'] : 0;
$audio = !empty($_POST['audio']) ? $_POST['audio'] : 0;
$hotel = !empty($_POST['hotel']) ? $_POST['hotel'] : 0;
$billet = !empty($_POST['billet']) ? $_POST['billet'] : 0;
$restau = !empty($_POST['restau']) ? $_POST['restau'] : 0;

$arrayService = array($mdj, $mg, $mr, $mac1, $mac2, $laptop, $android, $ipad, $audio, $hotel, $billet, $restau);
$nbrService = countService($arrayService);

$sumPay = sumPay($mdj, $mg, $mr, $mac1, $mac2, $laptop, $android, $ipad, $audio, $hotel, $billet, $restau) + resKm($km);

$check = $bdd->prepare("SELECT available FROM service WHERE available = 1 AND idEmployee = ?");
$check->execute(array($idEmployee));
$available = $check->fetch(PDO::FETCH_ASSOC);
?>

    <!DOCTYPE html>
    <html>

        <head>
            <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Réservation - City Drive</title>
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                        <link rel="stylesheet" href="css/style.css">
        </head>

        <body class="bg-light">
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
            <div class="pt-5">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-7 mx-auto">
                            <h2><i class="fa fa-credit-card"></i>CityPay</h2>
                            <p class="center">SECURE TRANSACTIONS</p>
                            <hr class="hr">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 order-md-2">
                            <h4 class="d-flex justify-content-between mb-3"> <span class="text-muted"><b>Service demandé</b></span> <span class="badge badge-pill badge-primary"><?php echo $nbrService ?></span> </h4>
                            <ul class="list-group">
                                <?php product($arrayService); ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <h6 class="my-0 text-primary"><b>Prix de la course</b></h6> <small class="text-muted">pour <?php echo $km; ?> km</small>
                                    </div> <span class="text-muted"><?php echo resKm($km);?>€</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (EUR)</span>
                                    <b><?php echo $sumPay."€"; ?></b>
                                </li>
                            </ul>
                            <form class="card p-2 my-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Promo code">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary">Redeem</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3"><b>Payment</b></h4>
                            <div class="row">
                                <div class="col-md-6 mb-3"> <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required=""> <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback"> Name on card is required </div>
                                </div>
                                <div class="col-md-6 mb-3"> <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                        <div class="invalid-feedback"> Credit card number is required </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3"> <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                        <div class="invalid-feedback"> Expiration date required </div>
                                </div>
                                <div class="col-md-3 mb-3"> <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                        <div class="invalid-feedback"> Security code required </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Payez</button>
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
            <script src="assets/js/validation.js"></script>
        </body>
    </html>
</html> <?php } ?>