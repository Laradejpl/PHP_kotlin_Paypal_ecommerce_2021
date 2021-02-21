<?php
$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$sqlcmd = $connection->prepare("SELECT * FROM confiserie_kotlin_app WHERE id = ?");
$sqlcmd -> bind_param("i",$_GET["id"]);
$sqlcmd->execute();



$sqlResult = $sqlcmd->get_result();
$row = $sqlResult->fetch_assoc();


echo json_encode($row);