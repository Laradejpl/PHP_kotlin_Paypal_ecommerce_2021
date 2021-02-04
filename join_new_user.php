<?php

$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");






$emailCheckSqlcommand = $connection->prepare("SELECT * FROM  app_users_table WHERE email = ?");

$emailCheckSqlcommand->bind_param("s",$_GET['email']);

$emailCheckSqlcommand->execute();

$emailResult = $emailCheckSqlcommand->get_result();

if ($emailResult->num_rows == 0) {


    $sqlcommand = $connection->prepare("insert into app_users_table values (?,?,?)");

    $sqlcommand->bind_param("sss",$_GET['email'],$_GET['username'],$_GET['pass']);

    $sqlcommand->execute();

    echo 'vous avez été enregistrez. ';


}else {
    
    echo 'a user with the same address already exists ';
}







?>