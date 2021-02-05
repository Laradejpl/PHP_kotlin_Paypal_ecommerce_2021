
<?php
require_once __DIR__ . '/config/bootstrap.php';

$req = $pdo->query("SELECT  DISTINCT brand FROM confiserie_kotlin_app");
$req->execute();

$brands = array();

while ($datas = $req->fetch(PDO::FETCH_OBJ)) {

    
    array_push($brands,$datas);



    
}

echo json_encode($brands);


//<?php
//require_once __DIR__ . '/config/bootstrap.php';

//$req = $pdo->query("SELECT  DISTINCT brand FROM confiserie_kotlin_app");
//$req->execute();

//while ($datas = $req->fetch(PDO::FETCH_OBJ)) {

    //echo json_encode($datas );
    
//}