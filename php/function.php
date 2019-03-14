<?php

$count = 0;

function secure($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sumPay($mdj, $mg, $mr, $mac1, $mac2, $laptop, $android, $ipad, $audio, $hotel, $billet, $restau) {
    $value = $mdj * 20;
    $value += $mg * 50;
    $value += $mr * 17;
    $value += $mac1 * 80;
    $value += $mac2 * 150;
    $value += $laptop * 60;
    $value += $android * 40;
    $value += $ipad * 40;
    $value += $audio * 8;
    $value += $hotel * 10;
    $value += $billet * 5;
    $value += $restau * 6;
    return $value;
}

function countService($data) {
    global $count;
    foreach ($data as $value) {
        if ($value > 0) $count++;
    }
    return $count;
}

function resKm($data) {
    $current_time = date("G") + 1;
    if($current_time <= 6) { //si l'heure actuelle est < ou egal a 6h = tarif du soir
        $pay = $data * 3.5;
        return $pay;
    } elseif ($current_time <= 20){ //si l'heure actuelle est < ou egal a 20h = tarif du jour
        $pay = $data * 3;
        return $pay;
    } else { //si l'heure actuelle est > 20 = tarif du soir
        $pay = $data * 3.5;
        return $pay;
    }
}

function product($data){
    $fetch = '';
    $counter = 0;
        foreach ($data as $row) {
            if ($row > 0) {
                $fetch .='<li class="list-group-item d-flex justify-content-between">
                        <div>
                             <h6 class="my-0"><b>'.detail($counter).'</b></h6> <small class="text-muted">pour '.$row.' personne</small>
                        </div> <span class="text-success">+'.priceDetail($row, $counter).'€</span>
                      </li>';
            }
            $counter++;
        }
        echo $fetch;
}

function detail($data){
    switch ($data){
        case 0:
            return "Menu du jour, boisson incluse";
            break;
        case 1:
            return "Menu gastronomique";
            break;
        case 2:
            return "Menu au choix";
            break;
        case 3:
            return "Apple Mac Book Air";
            break;
        case 4:
            return "Apple Mac Book Pro";
            break;
        case 5:
            return "Ordinateur portable (Windows)";
            break;
        case 6:
            return "Android";
            break;
        case 7:
            return "Ipad";
            break;
        case 8:
            return "audio guide";
            break;
        case 9:
            return "Réservation hôtel";
            break;
        case 10:
            return "Achats billets touristiques";
            break;
        case 11:
            return "Réservation restaurant";
            break;
        default:
            return "Service inconnu";
    }
}
function priceDetail($data, $row){
    switch ($row){
        case 0:
            $result = $data * 20;
            return $result;
            break;
        case 1:
            $result = $data * 50;
            return $result;
            break;
        case 2:
            $result = $data * 17;
            return $result;
            break;
        case 3:
            $result = $data * 80;
            return $result;
            break;
        case 4:
            $result = $data * 150;
            return $result;
            break;
        case 5:
            $result = $data * 60;
            return $result;
            break;
        case 6:
            $result = $data * 40;
            return $result;
            break;
        case 7:
            $result = $data * 40;
            return $result;
            break;
        case 8:
            $result = $data * 8;
            return $result;
            break;
        case 9:
            $result = $data * 10;
            return $result;
            break;
        case 10:
            $result = $data * 5;
            return $result;
            break;
        case 11:
            $result = $data * 6;
            return $result;
        default:
            return "0";
    }
}

function description($nbrKm, $services) {
    $string = "Payement effectuer pour une course de ".$nbrKm." Km";
    switch ($services) {
        case 0:
            return $string;
            break;
        case 1:
            $string .= ", et ".$services." service.";
            return $string;
            break;
        default:
            $string .= ", et ".$services." services.";
            return $string;
    }
}
?>