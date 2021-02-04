<?php
$dc = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$check_login_info = $dc->prepare("SELECT * FROM app_users_table WHERE email = ? AND pass = ?"); 

$check_login_info->bind_param("ss",$_GET['email'],$_GET['pass']);

$check_login_info->execute();

$login_result = $check_login_info->get_result();



if ($login_result->num_rows == 0) {


   // $sqlcommand = $connection->prepare("insert into app_users_table values (?,?,?)");

   // $sqlcommand->bind_param("sss",$_GET['email'],$_GET['username'],$_GET['pass']);

   // $sqlcommand->execute();

    echo 'vous avez été enregistrez. ';


}else {
    
    echo 'a user with the same address already exists ';
}






?>