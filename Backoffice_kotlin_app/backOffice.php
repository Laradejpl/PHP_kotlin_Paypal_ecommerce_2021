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
        <div class="col-12 unique-color-dark mb-1"><h1 style="text-align:center;color:white;">Gerez votre E.COMMERCE.</h1></div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 red accent-4 "><h3 style="text-align:center;color:white;">VAP</h3></div>
    </div>
</div>



<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size:18px;">id</th>
      <th scope="col"style="font-size:18px;" >Nom</th>
      <th scope="col"style="font-size:18px;" >Description</th>
      <th scope="col"style="font-size:18px;" >Price</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $req = $pdo->query("SELECT * FROM confiserie_kotlin_app WHERE brand = 'vap'");
  $item = $req->fetch(PDO::FETCH_ASSOC);
  while ($item = $req ->fetch(PDO::FETCH_ASSOC)) {
    ?>

  
  
  
    <tr>
      <th scope="row"><?php echo $item['id'];?></th>
     <td><?php echo $item['name'];?></td>
      <td><?php echo substr($item['description'],0,90);?></td>
      <td><?php echo $item['price'];?> €</td>
      <td class="btn btn-blue darken-1 "><i class="fa fa-eye" aria-hidden="true"></i><a href="detailmenus.php?id=<?=  $item['id']?>">Voir</a> </td>
      <td class="btn btn- lime darken-4"><i class="fa fa-pencil" aria-hidden="true"></i> <a href="updateItem.php?id=<?=  $item['id']?>">Modifier</a>  </td>
      <td class="btn btn-red accent-3"><i class="fa fa-trash" aria-hidden="true"></i><a href="deleteItem.php?id=<?=  $item['id']?>">Delete</a> </td>
      <td class="btn btn-lime lighten-2"><i class="fa fa-plus" aria-hidden="true"></i><a href="ajouter.php?id=<?=  $item['id']?>">ADD</a> </td>

    </tr>
    <?php
    }
    ?>



  </tbody>
</table>

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 teal accent-3 "><h3 style="text-align:center;color:white;">FLOWERS</h3></div>
    </div>
</div>




<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size:18px;">id</th>
      <th scope="col"style="font-size:18px;" >Nom</th>
      <th scope="col"style="font-size:18px;" >Description</th>
      <th scope="col"style="font-size:18px;" >Price</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $req1 = $pdo->query("SELECT * FROM confiserie_kotlin_app WHERE brand='FLOWERS'");
  $data = $req1->fetch(PDO::FETCH_ASSOC);
  while ($data = $req1 ->fetch(PDO::FETCH_ASSOC)) {
    ?>

  
  
  
    <tr>
      <th scope="row"><?php echo $data['id'];?></th>
     <td><?php echo $data['name'];?></td>
      <td><?php echo substr($data['description'],0,90);?></td>
      <td><?php echo $data['price'];?> €</td>
      <td class="btn btn-blue darken-1 "><i class="fa fa-eye" aria-hidden="true"></i><a href="detailmenus.php?id=<?=  $data['id']?>"> Voir </a></td>
      <td class="btn btn-light"><i class="fa fa-pencil" aria-hidden="true"></i><a href="updateItem.php?id=<?=  $data['id']?>">Modifier</a></td>
      <td class="btn btn-red accent-3"><i class="fa fa-trash" aria-hidden="true"></i><a href="deleteItem.php?id=<?=  $data['id']?>">Delete</a></td>
      <td class="btn btn-lime lighten-2"><i class="fa fa-plus" aria-hidden="true"></i><a href="ajouter.php?id=<?=  $data['id']?>">ADD</a> </td>
    </tr>
    <?php
    }
    ?>



  </tbody>
</table>

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12  lime accent-3 "><h3 style="text-align:center;color:white;">TEA</h3></div>
    </div>
</div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size:18px;">id</th>
      <th scope="col"style="font-size:18px;" >Nom</th>
      <th scope="col"style="font-size:18px;" >Description</th>
      <th scope="col"style="font-size:18px;" >Price</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $req2 = $pdo->query("SELECT * FROM confiserie_kotlin_app WHERE brand='TEA'");
  $donnees = $req2->fetch(PDO::FETCH_ASSOC);
  while ($donnees = $req2 ->fetch(PDO::FETCH_ASSOC)) {
    ?>

  
  
  
    <tr>
      <th scope="row"><?php echo $donnees['id'];?></th>
     <td><?php echo $donnees['name'];?></td>
      <td><?php echo substr($donnees['description'],0,90);?></td>
      <td><?php echo $donnees['price'];?> €</td>
      <td class="btn btn-blue darken-1 "><i class="fa fa-eye" aria-hidden="true"></i><a href="detailmenus.php?id=<?=  $donnees['id']?>"> Voir </a></td>
      <td class="btn btn-light"><i class="fa fa-pencil" aria-hidden="true"></i><a href="updateItem.php?id=<?=  $donnees['id']?>">Modifier</a></td>
      <td class="btn btn-red accent-3"><i class="fa fa-trash" aria-hidden="true"></i><a href="deleteItem.php?id=<?=  $donnees['id']?>">Delete</a></td>
      <td class="btn btn-lime lighten-2"><i class="fa fa-plus" aria-hidden="true"></i><a href="ajouter.php?id=<?=  $donnees['id']?>">ADD</a> </td>

    </tr>
    <?php
    }
    ?>



  </tbody>
</table>


<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12   green lighten-2 "><h3 style="text-align:center;color:white;">FOODS</h3></div>
    </div>
</div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size:18px;">id</th>
      <th scope="col"style="font-size:18px;" >Nom</th>
      <th scope="col"style="font-size:18px;" >Description</th>
      <th scope="col"style="font-size:18px;" >Price</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $req2 = $pdo->query("SELECT * FROM confiserie_kotlin_app WHERE brand='FOODS'");
  $dons = $req2->fetch(PDO::FETCH_ASSOC);
  while ($dons = $req2 ->fetch(PDO::FETCH_ASSOC)) {
    ?>

  
  
  
    <tr>
      <th scope="row"><?php echo $dons['id'];?></th>
     <td><?php echo $dons['name'];?></td>
      <td><?php echo substr($dons['description'],0,90);?></td>
      <td><?php echo $dons['price'];?> €</td>
      <td class="btn btn-blue darken-1 "><i class="fa fa-eye" aria-hidden="true"></i><a href="detailmenus.php?id=<?=  $dons['id']?>"> Voir </a></td>
      <td class="btn btn-light"><i class="fa fa-pencil" aria-hidden="true"></i><a href="updateItem.php?id=<?=  $dons['id']?>">Modifier</a></td>
      <td class="btn btn-red accent-3"><i class="fa fa-trash" aria-hidden="true"></i><a href="deleteItem.php?id=<?=  $dons['id']?>">Delete</a></td>
      <td class="btn btn-lime lighten-2"><i class="fa fa-plus" aria-hidden="true"></i><a href="ajouter.php?id=<?=  $dons['id']?>">ADD</a> </td>

      
    </tr>
    <?php
    }
    ?>



  </tbody>
</table>

<br>
