<?php
$dc = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$check_login_info = $dc->prepare("SELECT * FROM user_kotlin_app WHERE email = ? AND pass = ?"); 

$check_login_info->bind_param("ss",$_GET['email'],$_GET['pass']);

$check_login_info->execute();

$login_result = $check_login_info->get_result();


   

   


if ($login_result->num_rows == 0 ) {


   

    echo 'The user does not exist ';

    


}elseif(empty($_GET['email'])){

    echo'Enter your email';





}

elseif(empty($_GET['pass'])){

    echo'Enter your password';





}



else {
    
    echo 'Bienvenue au Just CBD Shop';
    
}










?>