<?php
session_start();
require_once("admin/bddConnect.php");
require_once('php/function.php');
//ajoute la reservation et le payment a la bdd
if (isset($_POST['idUser']) && isset($_POST['idEmployee']) && isset($_POST['price']) && isset($_POST['startPoint']) &&
    isset($_POST['endPoint']) && isset($_POST['nbrKm']) && isset($_POST['services'])) {
    $idUser = $_POST['idUser'];
    $idEmployee = $_POST['idEmployee'];
    $price = $_POST['price'];
    $startPoint = $_POST['startPoint'];
    $endPoint = $_POST['endPoint'];
    $nbrKm = $_POST['nbrKm'];
    $services = $_POST['services'];
    $description = description($nbrKm, $services);
    $req = $bdd->prepare("SELECT count(*) as count FROM booking WHERE idUser = ? OR idEmployee = ? and finish = 0");
    $req->execute(array($idUser, $idEmployee));
    $count = $req->fetch(PDO::FETCH_ASSOC);
    if ($count['count'] == 0) {
        $createBooking = $bdd->prepare( "INSERT INTO booking(idUser, idEmployee, startPoint, endPoint, timeStart, nbrKm, services) VALUES (?, ?, ?, ?, NOW(), ?, ?)");
        $verif = $createBooking->execute(array($idUser, $idEmployee, $startPoint, $endPoint, $nbrKm, $services));
        if ($verif == "TRUE") {
            $req2 = $bdd->prepare("SELECT id FROM booking WHERE idUser = ? AND idEmployee = ? AND finish = 0");
            $req2->execute(array($idUser, $idEmployee));
            $idResult = $req2->fetch(PDO::FETCH_ASSOC);
            $idBooking = $idResult['id'];
            $createPay = $bdd->prepare( "INSERT INTO pay(idBooking, price, description) VALUES (?, ?, ?)");
            $verif = $createPay->execute(array($idBooking, $price, $description));
            $updateDriver = $bdd->prepare( "UPDATE service SET available = '0' WHERE service.idEmployee = ?;");
            $updateDriver->execute(array($idEmployee));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>City Drive</title>
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="py-5 text-center text-white align-items-center d-flex" id="div4">
            <div class="container w-50">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-primary">
                            <div class="card-header h1">Réservation Booké. </div>
                            <div class="card-body">
                                <p class="text-dark"> Vous n'avez plus cas attendre le chauffeur au lieu de rdv, vous allez être redirigez vers l'acceuil. </p>
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
        } else {
            header( "url=redirect4.php" );
        }
    } else {
        header( "url=redirect3.php" );
    }
} else {
    header( "url=redirect4.php" );
}
?>