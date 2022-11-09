<?php require_once("inc/classes/database.class.php");
      require_once("inc/classes/book.class.php");
      require_once("inc/classes/serie.class.php");



      if(!empty($_POST) && (isset($_POST['add']))){
        $new = new Serie($_POST);
        
            $new->save();
        
        header('Location:add_books.php');
        
        var_dump($new);
        
    }

    $t = Serie::all();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("inc/meta.php"); ?>
</head>
<body>
    <?php include("inc/navbar.php");?>

<h1 class="text-center mb-5">Tom pour la collection <?php ?></h1>


<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Numéro</th>
      <th scope="col">Titre</th>
      <th scope="col">Auteur</th>
      <th scope="col">Designer</th>
      <th scope="col">Année de sortie</th>
      <th scope="col">Editeur</th>
      <th scope="col">Nombre de pages</th>
      <th scope="col">Suppression</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td><a href=""><button>Supprimer</button></a><button>Editer</button></a></td>

    </tr>
   
  </tbody>
</table>
</div>



<div class="container">
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
        <label for="title">Titre</label>
        <p><input type="text" name="title" placeholder="Titre de la série" required></p>

        <label for="title">Numéro</label>
        <p><input type="number" name="title" placeholder="Numéro du tom" required></p>

        <label for="title">Auteur</label>

        <p><input type="text" name="scriptwritter" placeholder="Auteur" required></p>
        <label for="title">Editeur</label>

        <p><input type="text" name="editor" placeholder="Editeur" required></p>
        <label for="title">Dessinateur</label>

        <p><input type="text" name="illustrator" placeholder="Dessinateur"></p>
        <label for="title">Année de sortie</label>

        <p><input type="text" name="releaseyear" placeholder="Année de sortie"></p>
                
                <label for="title">Nombres de planches</label>

        <p><input type="number" name="strips" placeholder="Nombre de planches"></p>
                

        <p><input type="file" name="cover" value=""></p>

        <p><button type="submit" name="add">Ajouter</button></p>

        </form>
</div>
    <?php include("inc/footer.php");?>    
</body>
</html>