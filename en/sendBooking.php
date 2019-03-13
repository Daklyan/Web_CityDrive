<?php
session_start();
require_once('admin/bddConnect.php');
$idEmployee = $_POST['idEmployee'];
$idUser = $_POST['idUser'];
$start = secure($_POST['start']);
$end = secure($_POST['end']);
$nbrPeople = secure($_POST['nbrPeople']);
$service = secure($_POST['service']);

function secure($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$check = $bdd->prepare("SELECT COUNT(*) AS available FROM service WHERE available = 1 AND idEmployee = ?");
$check->execute(array($idEmployee));
$available = $check->fetch(PDO::FETCH_ASSOC);

if($available['available'] == 1) // Si le chauffeur est dispo
{
    $createBooking = $bdd->prepare("INSERT INTO booking(idUser, idEmployee, start, end, nbrPeople, price, services) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $createBooking->execute(array($idUser, $idEmployee, $start, $end, $nbrPeople, "40", $service));
    $update = $bdd->prepare("UPDATE service SET available = 0 WHERE service.id = ?");
    $update->execute(array($id));
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>City Drive</title>
        <meta name="description" content="Booking - The new Uber !">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="py-5 text-center text-white align-items-center d-flex" id="div4">
        <div class="container w-50">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-primary">
                        <div class="card-header h1">Reservation saved on City Drive.</div>
                        <div class="card-body">
                            <p class="text-dark">Your reservation has been taken in consideration, back to the home page. </p>
                            <a href="index.php" class="btn btn-lg btn-primary mx-1">Back to the home page</a>
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
} else {  ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>City Drive</title>
        <meta name="description" content="Booking - Le nouveau Uber !">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="py-5 text-center text-white align-items-center d-flex" id="div4">
        <div class="container w-50">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-primary">
                        <div class="card-header h1">Reservation failed. </div>
                        <div class="card-body">
                            <p class="text-dark">Sadly your reservation has failed, you'll be redirect to the home page. </p>
                            <a href="index.php" class="btn btn-lg btn-primary mx-1">Back to the home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php header( "Refresh:5; url=index.php" ); } ?>
