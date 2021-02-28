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

    $sqlcommand->bind_param("isss",$_GET['id'],$_GET['email'],$_GET['username'], $_GET['pass']);

    $sqlcommand->execute();

    echo 'Congratulation! The registration process was successful ';
    
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"wudemy.org"<pablolarade@gmail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $destinataire = $_GET['email'];
    $message='
    <html>
        <body style="background:black;color:lime;">
            <div align="center">
                <img  style="width:100%;"src="https://www.saintecroixtattoo.com/mailing/banniere.png"/>
                <br />
                Bienvenue sur JUST CBD le site du cbd .
                Vous etes bien inscrit sur le JUST CBD .
                
                Veuillez vous connectez sur le site en suivant ce lien 
                <a href="wudemy.org </a>
                <br />
                <img src="https://www.wudemy.org/config/icone.png"/>
                
    
            </div>
        </body>
    </html>
    ';
    
    mail($destinataire ,"CONFIRMATION INSCRIPTION !", $message, $header);

}else {
    echo 'a user with the same address already exists';
}
}





else {
    
    echo 'soit vide ou existe deja';
}














?>