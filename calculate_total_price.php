<?php
$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$sqlCommand = $connection->prepare("SELECT price,amount FROM confiserie_kotlin_app INNER JOIN invoice_details on confiserie_kotlin_app.id=invoice_details.product_id where invoice_details.invoice_num=?");
$sqlCommand->bind_param("i", $_GET["invoice_num"]);
$sqlCommand->execute();

$sqlResult = $sqlCommand->get_result();
$totalPrice = 0;

while ($row = $sqlResult->fetch_assoc()) {
    
    
    $totalPrice = $totalPrice + ($row["price"] * $row["amount"]);
    
    
}

echo $totalPrice;
