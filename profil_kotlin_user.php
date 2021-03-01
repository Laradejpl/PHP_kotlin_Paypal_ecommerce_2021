<?php
$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

//$sqlinfouser = $connection->prepare("SELECT * FROM user_kotlin_app WHERE email = ?");
//$sqlinfouser -> bind_param("s",$_GET["email"]);
//$sqlinfouser->execute();



//$sqlResult = $sqlinfouser->get_result();
//$row = $sqlResult->fetch_assoc();


//echo json_encode($row);


$infoadress = $connection->prepare("SELECT * FROM volley WHERE email = ?");
$infoadress ->bind_param("s",$_GET['email']);
$infoadress ->execute();

$ftchinfoadress = $infoadress ->get_result();
$row = $ftchinfoadress ->fetch_assoc();


echo json_encode($row);





