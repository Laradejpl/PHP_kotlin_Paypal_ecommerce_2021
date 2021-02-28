<?php
require_once __DIR__ . '/config/bootstrap.php';

//ont verifie si s'il y a un email deja enregistré.
$requette = $pdo->prepare("SELECT email_client FROM adress_client_kotlin WHERE email_client  = :email_client  ");
$requette->bindParam(':email_client',$_GET['email_client']);
$requette->execute();
$emailResult=$requette->fetch(PDO::FETCH_ASSOC);

//ont verifie s'il y a un user qui a cette email
$rcupinfouser = $pdo->prepare("SELECT *  FROM user_kotlin_app WHERE email=?");
$rcupinfouser->execute(array($_GET['email_client']));
$rcupinfouser->execute();
$infoduuser= $rcupinfouser->fetch(PDO::FETCH_ASSOC);
 



if ($emailResult) {
    echo 'ADRESS already exist with the same Email.';

}

if (!$infoduuser) {


    echo 'No user registred.';
}


if ($infoduuser) {
    


if (!$emailResult) {
   


   
     if(empty($_GET['email_client']) ){


       echo 'email is missing!';

       }
      if(!preg_match('~^[A-Z-a-z-0-9]{5}+$~', $_GET['cp'])) {

         echo 'le cp est mal formaté';
     }if(!filter_var($_GET['email_client'], FILTER_VALIDATE_EMAIL)) {
                            echo 'Enter validate Email!';
                        }
                        

    else{
             $req = $pdo->prepare("INSERT INTO adress_client_kotlin (email_client,rue,ville,cp,telephone,valided_status)VALUES (:email_client,:rue,:ville,:cp,:telephone,:valided_status)");
             $req->bindParam(':email_client',$_GET['email_client']);
             $req->bindParam(':rue',$_GET['rue']);
             $req->bindParam(':ville',$_GET['ville']);
             $req->bindParam(':cp',$_GET['cp']);
             $req->bindParam(':telephone',$_GET['telephone']);
             $req->binParam(':valided_status',1);
             $req->execute();

             $req =$pdo->prepare('SELECT *  FROM adress_client_kotlin WHERE email_client=?');
$req->execute(array($_GET['email_client']));
$item = $req->fetch();
$bill=$item['email_client'] ;
//echo $bill;


$rcupinfouser = $pdo->prepare("SELECT *  FROM user_kotlin_app WHERE email=?");
$rcupinfouser->execute(array($_GET['email_client']));
$infoduuser= $rcupinfouser->fetch();
 
echo $infoduuser['email'];
echo $infoduuser['username'];

echo $item['rue'];
echo $item['ville'];
echo $item['cp'];
echo $item['telephone'];

echo 'Your address is registred! ';

 
     }


    }

}








?>