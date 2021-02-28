<?php
require_once __DIR__ . '/config/bootstrap.php';
require 'config/headerBack.php';

?>





<br>
<div class="container-fluid">
    <div class="row">
    <div class="col-12">


    
   




<div class="container-fluid">
    <div class="row">
        <div class="col-12 unique-color-dark mb-1"><h1 style="text-align:center;color:white;">Gerez votre site internet.</h1></div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 red accent-4 "><h3 style="text-align:center;color:white;">Les clients</h3></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col-1" style="font-size:18px;">id</th>
      <th scope="col-1"style="font-size:18px;" >Nom</th>
      <th scope="col-1"style="font-size:18px;" >Email</th>
      <th scope="col-1"style="font-size:18px;" >Adresse</th>
      <th scope="col-1"style="font-size:18px;" >Ville</th>
      <th scope="col-1"style="font-size:18px;" >Cp</th>
      <th scope="col-1"style="font-size:18px;" >Role</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $req = $pdo->query("SELECT * FROM user_kotlin_app ");
  
  while ($user= $req ->fetch(PDO::FETCH_ASSOC)) {
    ?>

  
  
  
    <tr>
      <th scope="row"><?php echo $user['id'];?></th>
      <td><?php echo $user['name'];?></td>
      <td><?php echo $user['email'];?></td>
      <td><?php echo $user['pass'];?> </td>
      <td class="btn btn-red accent-3"><i class="fa fa-trash" aria-hidden="true"></i><a href="deleteclient.php?id=<?=  $user['id']?>">Delete</a> </td>

    </tr>
    <?php
    }
    ?>

    </div>
    </div>