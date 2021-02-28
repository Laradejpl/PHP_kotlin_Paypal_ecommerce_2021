<?php
require_once __DIR__ . '/config/bootstrap.php';
require 'config/headerBack.php';

if (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
  
  }

  $req = $pdo->prepare("SELECT * FROM confiserie_kotlin_app WHERE id=?");
  $req->execute(array($id));
  $item = $req->fetch();
  

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 unique-color-dark mb-1"><h1 style="text-align:center;color:white;">Gerez votre site internet.</h1></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 blue darken-1 mb-1"><h1 style="text-align:center;color:white;">Voir une annonce.</h1></div>
    </div>
</div>
<br>
<div class="container-fluid">
                        <div class="row">
                        <div class="col-10">

<div class="col-sm-6 col-md-3 mr-3 ml-3 bg-light  mb-3 p-1 rounded">
                        <div class="thumbnail">

                            <img src="<?php echo $item["picture"];?>" alt="..." style="width:100%;">
                            <div class="price"><?php echo $item["price"];?> €</div>
                            <div class="caption">
                                <h4><?php echo $item["name"];?></h4>
                                <p><?php echo $item["description"];?></p>
                            </div>

                        </div>
                    </div>


                    </div>
                       </div>
                       </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 btn btn-light"><i class="fa fa-pencil" aria-hidden="true"></i>Modifier</div>
                            <div class="col-3 btn btn-red accent-3"><i class="fa fa-trash" aria-hidden="true"></i><a href="#"style="color:white;">Delete</a> </div>
                            <div class="col-2 btn btn-lime lighten-2"><i class="fa fa-plus" aria-hidden="true"></i><a href="#" style="color:white;">ajouter</a></div>
                            <div class="col-3 btn btn-orange darken-1"><i class="fa fa-home" aria-hidden="true"></i> <a href="backOffice.php">backoffice</a>  </div>

                        </div>
                    </div>





