<?php
require_once __DIR__ . '/config/bootstrap.php';

if ($_GET['email'] && $_GET['street'] && $_GET['ville'] && $_GET['cp'] && $_GET['telephone'] ) {


    if(!preg_match('~^[A-Z-a-z-0-9]{5}+$~', $_GET['cp'])) {

        echo"le cp est mal formaté";
    }

   
    else{


 $requettemail = $pdo->prepare("SELECT email FROM volley WHERE email = :email ");
 $requettemail->bindParam(':email',$_GET['email']);
 $requettemail->execute();
 $emailResult=$requettemail->fetch(PDO::FETCH_ASSOC);

 if ($emailResult) {
      
$rqt = $pdo->prepare("DELETE FROM volley WHERE email = :email");
$rqt->bindParam(':email',$_GET['email']);
$rqt->execute();

 }

$req = $pdo->prepare("INSERT INTO volley (street,ville,cp,pays,telephone,email)VALUES (:street,:ville,:cp,:pays,:telephone,:email)");
$req->bindParam(':street',$_GET['street']);
$req->bindParam(':ville',$_GET['ville']);
$req->bindParam(':cp',$_GET['cp']);
$req->bindParam(':telephone',$_GET['telephone']);
$req->bindParam(':email',$_GET['email']);
$req->bindParam(':pays',$_GET['pays']);
$req->execute();
echo "votre enregistrement est effectuer";}


  
}elseif (!$_GET['email'] ) {
   echo "pas email";
}
elseif (!$_GET['street'] ) {
    echo "street missing";
 }
 elseif (!$_GET['ville'] ) {
    echo "ville missing";
 }

elseif (!$_GET['telephone'] ) {
    echo "telephone missing";
 }
 elseif (!$_GET['cp'] ) {
    echo "cp missing";
 }
 

