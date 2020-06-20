<?php

$pdo = new PDO('mysql:host=localhost;dbname=telemedicine','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$pdo = new PDO('mysql:host=localhost;dbname=websol_telemedicine','websol_telemedic','goway12');

?>