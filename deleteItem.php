<?php
require_once __DIR__ . '/config/bootstrap.php';
require 'config/headerBack.php';
$flashmessage ="";

if (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
  
  }

  $req = $pdo->prepare("SELECT * FROM confiserie_kotlin_app WHERE id=?");
  $req->execute(array($id));
  $item = $req->fetch();

  
  if (!empty($_POST)) {
       
    $id = $_POST['id'];

    $req1 = $pdo->prepare("DELETE FROM confiserie_kotlin_app WHERE id = ? ");
    $req1->execute(array($id)); 
    $flashmessage =" Le produit a été supprimer !";
   }
  

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 unique-color-dark mb-1"><h1 style="text-align:center;color:white;">Gerez votre site internet.</h1></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 red accent-4 mb-1"><h1 style="text-align:center;color:white;">Effacer une annonce.</h1></div>
    </div>
</div>
<br>

<div class="container-fluid">
                        <div class="row">
                        

<div class="col-sm-6 col-md-3 mr-3 ml-3 bg-light  mb-3 p-1 rounded">
                        <div class="thumbnail">

                            <img src="img/<?php echo $item["photo"];?>" alt="..." style="width:100%;">
                            <div class="price"><?php echo $item["price"];?> €</div>
                            <div class="caption">
                                <h4><?php echo $item["name"];?></h4>
                                <p><?php echo $item["description"];?></p>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-8 border  mb-3 p-1 btn-lg bg-light">

<form action="" method="post" class="mt-4">
    <p class="alert alert-info"> voulez vous suprimez?</p>

    <div class="form-group form-check">
        <input type="hidden" name="id" value="<?php echo $id;  ?>"/>
       
    </div>

    <input type="submit" name="supprimer" value="Supprimer le post" class="btn btn-danger">
    <a class="btn btn-default border" href="backOffice.php">non</a>
</form>
                
            
        </div>

    </form>
</div>






                    </div>
                       </div>
                     

                       
<div class="container">
    <div class="row d-flex justify-content-end mt-4">
        <div class="col-6">
            
            <span  class="mess" style="font-size:2em;color:pink; text-shadow: 2px 2px #ff0000;"><?= $flashmessage ?></span>
        </div>
    </div>
</div>

     <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 btn btn-light"><i class="fa fa-pencil" aria-hidden="true"></i>Modifier</div>
                            <div class="col-2 btn btn-lime lighten-2"><i class="fa fa-plus" aria-hidden="true"></i><a href="#"style="color:white;">Ajouter</a> </div>
                            <div class="col-3 btn btn-blue darken-1"><i class="fa fa-eye" aria-hidden="true"></i><a href="detailmenus.php?id=<?=  $item['id']?>" style="color:white;">Voir</a></div>
                            <div class="col-3 btn btn-orange darken-1"><i class="fa fa-home" aria-hidden="true"></i> <a href="backOffice.php" style="color:white;">backoffice</a>  </div>


                        </div>
                    </div>


     

