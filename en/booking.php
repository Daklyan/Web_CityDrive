<?php
session_start();
ini_set("display_errors",0);error_reporting(0);
if (!isset($_SESSION['flag'])) {
    require "redirect2.php";
} else {
    $idEmployee = $_POST['id'];
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>City Drive</title>
        <meta name="description" content="Booking - The new uber !">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body class="text-center" id="div3">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse"> <img src="assets/pic/title.png" class="navbar-brand">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="index.php">Home</a>
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

    </header>
    <div class="container">
        <div class="row">
            <div class="p-5 col-md-7 d-flex flex-column justify-content-center">
                <h3 class="display-4 mb-3">Title</h3>
                <p class="mb-4 lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="p-5 col-md-5">
                <h3 class="mb-3">Book a driver !</h3>
                <form>
                    <div class="form-group">
                        <label>Start</label>
                        <input class="form-control" placeholder="1 rue du carrefour, paris, 75001..." id="start">
                    </div>
                    <div class="form-group">
                        <label>Destination</label>
                        <input class="form-control" placeholder="2 rue de paris, paris, 75013..." id="end">
                    </div>
                    <div class="form-group">
                        <label>Number of persons</label>
                        <input type="number" class="form-control" placeholder="2..." id="nbrPeople">
                    </div>
                    <div class="form-group">
                        <label>Service</label>
                        <select class="custom-select d-block" id="service">
                            <option value="">Services available...</option>
                            <option value="Garderie">Nursery</option>
                        </select>
                    </div>
                    <input id="idEmployee" type="hidden" value="<?php $idEmployee;?>"/>
                    <input id="idUser" type="hidden" value="<?php $_SESSION['id'];?>"/>
                    <button type="submit" class="btn mt-4 btn-block btn-outline-dark p-2" onclick="booking()">
                        <b>City Pay</b>
                    </button>
                </form>
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

    </body>

    </html>
<?php } ?>
