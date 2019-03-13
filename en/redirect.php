<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>City Drive</title>
    <meta name="description" content="Connexion - Le nouveau Uber !">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="py-5 text-center text-white align-items-center d-flex" id="div4">
    <div class="container w-50">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-primary">
                    <div class="card-header h1"> You're already logged in. </div>
                    <div class="card-body">
                        <p class="text-dark"> You'll be redirect to the home page. </p>
                        <a href="index.php" class="btn btn-lg btn-primary mx-1">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php header( "Refresh:10; url=index.php" );?>
