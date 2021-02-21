<?php
$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$sqlCommand = $connection->prepare("delete from temporary_place_order where email=?");
$sqlCommand->bind_param("s", $_GET["email"]);
$sqlCommand->execute();