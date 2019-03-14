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
$audio = !empty($_POST['audio']) ? secure(['audio']) : 0;
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
                            <form>
                            <h4 class="d-flex justify-content-between mb-3"> <span class="text-primary"><b>Service demandé</b></span> <span class="badge badge-pill badge-primary"><?php echo $nbrService ?></span> </h4>
                            <ul class="list-group">
                                <?php product($arrayService); ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <h6 class="my-0"><b>Prix de la course</b></h6> <small class="text-muted">pour <?php echo $km; ?> km</small>
                                    </div> <span class="text-success"><?php echo resKm($km);?>€</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (EUR)</span>
                                    <b><?php echo $sumPay."€"; ?></b>
                                </li>
                            </ul>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" placeholder="Code promo">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary"><i class="fas fa-check"></i></button>
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-8 order-md-1">

                            <h4 class="mb-3"><b>Payment</b></h4>
                            <div class="row">
                                <div class="col-md-6 mb-3"> <label>Titulaire de la carte</label>
                                    <input id="titulaire" class="form-control" type="text" onblur="verifyTitulaire()"> <small class="text-muted">Nom complet afficher sur la carte</small>
                                </div>
                                <div class="col-md-6 mb-3"> <label>Numéro de carte</label>
                                    <input id="number" class="form-control" type="text" maxlength="16" onblur="verifyNumberCard()">
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3" > <label>Date d'expiration </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select id="month" class="form-control" onclick="verifyDateCard()" onchange="verifyDateCard()">
                                                <?php
                                                for($i = 1; $i <= 12; $i++) {
                                                    $nb = date("m", strtotime(date("Y")."-".$i."-01"));
                                                    echo '<option value="'.$nb.'"';
                                                    if ($nb == date("m")) echo "selected";
                                                    echo '>'.$nb.'</option>';
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 p-0">
                                                <select id="year" class="form-control" onclick="verifyDateCard()" onchange="verifyDateCard()">
                                                <?php
                                                $year = date("Y");
                                                for($i = $year; $i <= $year + 10; $i++) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-md-3 mb-3"> <label>CVV</label>
                                    <input id="cryptogramme" class="form-control" type="text" max="999" maxlength="3" onblur="verifyCrypto()">
                                </div>
                            </div>
                            <hr class="mb-4">
                                <input id="idUser" type="hidden" value="<?php echo $_SESSION['id']; ?>">
                                <input id="idEmployee" type="hidden" value="<?php echo $idEmployee; ?>">
                                <input id="startPoint" type="hidden" value="<?php echo $start; ?>">
                                <input id="endPoint" type="hidden" value="<?php echo $end; ?>">
                                <input id="nbrKm" type="hidden" value="<?php echo $km; ?>">
                                <input id="services" type="hidden" value="<?php echo $nbrService; ?>">
                                <input id="price" type="hidden" value="<?php echo $sumPay; ?>">
                                <button id="buttonIpay" class="btn btn-primary btn-lg btn-block" type="submit" onclick="validate()" disabled>Payez</button>
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
            <script type="text/javascript" src="js/check.js"></script>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/function.js"></script>
            <script type="text/javascript">
                document.onload = function() {
                validate();
            };
            </script>
        </body>
    </html>
<?php } ?>