<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=city_drive;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur Connexion Sql: ' . $e->getMessage());
}
?>
