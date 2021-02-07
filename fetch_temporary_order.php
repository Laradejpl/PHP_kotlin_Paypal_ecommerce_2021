<?php
$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$sqlcmd = $connection->prepare("SELECT id,name,price,email,amount
 FROM temporary_place_order
  INNER JOIN confiserie_kotlin_app
   ON  confiserie_kotlin_app.id = temporary_place_order.product_id 
   WHERE email = ?
   ");

   $sqlcmd -> bind_param("s",$_GET["email"]);
   $sqlcmd->execute();

   $tempordearray = array();

   $sqlResult = $sqlcmd->get_result();

   while ($row = $sqlResult->fetch_assoc()) {
     array_push($tempordearray,$row);
   }

   echo json_encode($tempordearray);




?>