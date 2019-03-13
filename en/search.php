<?php
require_once('admin/bddConnect.php');
$fetch = '';
$err = '<h4 class="text-primary text-center mt-3">No driver available for the moment !</h4>';
if(isset($_POST["input"])) {
    $search = $_POST["input"];
    $nbrDriver = $bdd->prepare('SELECT employee.*,service.description FROM service,employee WHERE service.job = "chauffeur" AND service.idEmployee = employee.id AND employee.country like ?"%"');
    $nbrDriver->execute(array($search));
    $result = $nbrDriver->fetchAll(PDO::FETCH_ASSOC);
} else {
    $nbrDriver = $bdd->prepare('SELECT employee.*,service.description FROM service,employee WHERE service.job = "chauffeur" AND service.idEmployee = employee.id ORDER BY employee.id');
    $nbrDriver->execute();
    $result = $nbrDriver->fetchAll(PDO::FETCH_ASSOC);
}

if(count($result) > 0) {
    foreach ($result as $row) {
        $fetch .='
    <div class="col-md-4">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="assets/team/'.$row['picProfil'].'" alt="photo chauffeur">
        <div class="card-body">
          <h3 class="card-text">'.$row['firstName']." ".$row['secondName'].'</h3>
          <p class="card-text">Description : '.$row['description'].'</p>
          <p class="card-text">Laguage(s) spoken : '.$row['country'].'</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
            <form action="booking.php" method="post">
            <input id="id" name="id" type="hidden" value="'.$row['id'].'"/>
            <input class="btn btn-sm btn-outline-primary" type="submit" value="Reserver ma course !"/>
            </form>
            </div>
            <small class="text-muted">Note : 0 <i class="far fa-star"></i> </small>
          </div>
        </div>
      </div>
    </div>';
    }
    echo $fetch;
}
else
{
    echo $err;
}
?>
