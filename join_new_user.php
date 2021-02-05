<?php

$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");






$emailCheckSqlcommand = $connection->prepare("SELECT * FROM  user_kotlin_app WHERE email = ?");

$emailCheckSqlcommand->bind_param("s",$_GET['email']);

$emailCheckSqlcommand->execute();

$emailResult = $emailCheckSqlcommand->get_result();


if(!empty($_GET['email'])){

    //echo'Enter your email';

if ($emailResult->num_rows == 0) {


    $sqlcommand = $connection->prepare("insert into user_kotlin_app values (?,?,?,?)");

    $sqlcommand->bind_param("isss",$_GET['id'],$_GET['email'],$_GET['username'],$_GET['pass']);

    $sqlcommand->execute();

    echo 'Congratulation! The registration process was successful ';
    
    unset($_GET);

}
}





else {
    
    echo 'a user with the same address already exists ';
}














?>