<?php
require_once __DIR__ . '/config/bootstrap.php';

$req = $pdo->prepare("SELECT  * FROM confiserie_kotlin_app WHERE brand = :brand");
$req->bindParam(':brand', $_GET['brand']);

$req->execute();

$brands = array();

while ($datas = $req->fetch(PDO::FETCH_OBJ)) {

    
    array_push($brands,$datas);

}

echo json_encode($brands);







?>