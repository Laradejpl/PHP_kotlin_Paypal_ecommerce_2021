<?php
require_once __DIR__ . '/config/bootstrap.php';
require 'config/headerBack.php';

$mssgAlert = '';

/*echo '<img src="'.$dest.'" width="250" height="250" />';*/


    if (isset($_POST['register'])) {
        // Enregistrer l'image (fichier)
        // Enregistrer le post (SQL)
    
        // Vérifications du titre
        if (empty($_POST['nom']) || strlen($_POST['nom']) > 255) {
            echo('Le titre doit contenir entre 1 et 255 caractères.');
    
            // Vérification du contenu
        } elseif (empty($_POST['description'])) {
            echo('Contenu manquant.');
        
            // Vérification sur l'envoi du fichier
        } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo('Problème lors de l\'envoi du fichier. Code ' . $_FILES['image']['error']);
    
            // Vérification du type de l'image
            // la clé "type" de $_FILES n'est pas fiable, contrairement à exif_imagetype()
            // Un fichier doit faire minimum 12 octets pour être lu par exif_imagetype()
        } elseif ($_FILES['image']['size'] < 12 || exif_imagetype($_FILES['image']['tmp_name']) === false) {
            echo('Le fichier envoyé n\'est pas une image');
    
            // OK: enregistrement de l'image
        } else {
            // Récupération de l'extension du fichier d'origine
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // Chemin jusqu'au dossier des images
            $path = __DIR__ . '/';
    
            // Générer un nom de fichier aléatoire qui n'est pas déjà pris par une autre image
            do {
                // random_bytes() génère une chaîne d'octets
                // bin2hex convertit les octets (illisibles) en chaîne hexadécimale

                $filename = bin2hex(random_bytes(16));
    
                // Chemin complet = dossier_des_images/nom_fichier.extension
                $complete_path = $path . '/' . $filename . '.' . $extension;
    
                // Tant que le nom généré n'est pas disponible, on continue la boucle
            } while (file_exists($complete_path));
    
            // Enregistrement du fichier
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $complete_path)) {
                echo('pu être enregistrée.');
    
            } else {
                // Enregistrement en base de données
                $req = $pdo->prepare(
                    'INSERT INTO confiserie_kotlin_app (name, description, price,brand, picture)
                    VALUES (:name, :description, :price,:brand, :picture)'
                );
    
                $req->bindParam(':name', $_POST['nom']);
                $req->bindParam(':description', $_POST['description']);
                $req->bindParam(':price', $_POST['valeur']);
                $req->bindParam(':brand', $_POST['cat']);
                $req->bindValue(':picture', $filename . '.' . $extension);
                // Instantiation à la volée (créer et utiliser un objet): (new Classe())->methode()
                $req->execute();
    
                //Pour vider le formulaire
                echo('successPost enregistré !');
                unset($_POST);
                header('Location: backOffice.php');
            }
    
        }
    }






?>


<script>
/**

permet de visualisé l'image uploadée */
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>


<style>

#photo img{


    visibility:hidden;

    
}



</style>

<div class="container">
    <div class="row">
        <div class="col-10">
        <h3><?php echo $mssgAlert;?></h3>
        
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-6 unique-color-dark mb-1"><h1 style="text-align:center;color:white;">Gerez votre site internet.</h1></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 lime lighten-2 mb-1"><h1 style="text-align:center;color:white;">Ajoutez un produit.</h1></div>
    </div>
</div>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10 bg-light mb-1"><p> Le back-office vous permet d'ajouter des produits a votre convenance ,un titre,une description ,une photo, une categorie,un prix.</p></div>
        <div class="col-2 btn btn-success">  <a href="backOffice.php" style="color:white">back-office</a>   </div>
    </div>
</div>
<br>
<!--le formulaire de post--->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">


        
        <form class=" bg-light p-4 rounded"  action="ajouter.php" method="post" ENCTYPE="multipart/form-data">

        <div class="image-upload  col-6 col-sm-3">
<label for="photo" class=" bg-light bordered"></label>
<img src="img/photoApp.jpeg" style="width:50%;" />
<img id="output" style="width:100px;height:100px;"/>
<input id="photo" type="file" name="image" accept="image/*" onchange="loadFile(event)"/>
</div>
<br>





<div class="form-group">
<label for="nom" >nom du produit</label>
<input  class="form-control"type="text" name="nom" id="name">
</div>


<div class="form-group">
<label for="description" >description</label>
<input  class="form-control"type="text" name="description" id="descr">
</div>

                                        <!------PRIX------->
                                        <div class="form-group">
  <label for="valeur" class="">le prix</label><span class="col-6 offset-md-2 text-center alert "><?= $mssgprix ?></span>
     <input type="text" name="valeur"class="form-control">
  </div>


<!------categorie------->
<div class="form-group">
  <label for="valeur" class="">category</label><span class="col-6 offset-md-2 text-center alert "><?= $mssgprix ?></span>
     <input type="text" name="cat"class="form-control" value="<?= $post['category'] ?? ''; ?>">
  </div>
  <input type="submit" value="envoyer" name="register" class="btn btn-info">

</form>
        <!--le formulaire de post--->
        
        
        
        
        
        
        
        
        </div>
    </div>
</div>

