<?php

include('DB.php');

$db = new DB();

$provera = '';
if ($_POST['provera'] == 'Provera') {
    $provera = 'Proveren';
} else {
    $provera = 'Provera';
}


$query = "update ocene set status='" . $provera . "' where id=" . $_POST['ID'];
$db->connection->query($query);


echo 'Status uspesno izmenjen';
