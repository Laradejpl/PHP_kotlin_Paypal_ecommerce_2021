<?php
$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$req =$connection->prepare("INSERT INTO  temporary_place_order  VALUES (?, ?, ?)");
$req->bind_param("sii", $_GET["email"],$_GET["product_id"],$_GET["amount"]);
$req->execute();











