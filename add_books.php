<?php require_once("inc/classes/database.class.php");
      require_once("inc/classes/book.class.php");
      require_once("inc/classes/serie.class.php");


      if(isset($_GET['id'])){
        $id = $_GET['id'];
      }
      $books = new Book($id);

      
     
      if(!empty($_POST) && (isset($_POST['add']) || isset($_POST['edit']))){
        $new = new Book($_POST);
        
            $new->save();
        
        header('Location:add_books.php?'.$books->getId());
        
        var_dump($new);
        
    }elseif(!empty($_POST) && isset($_POST['supp'])){
        
        
        $new = new Book($_POST['id']);
        $new->delete();
        
        header('Location:add_books.php');
        
    }
    
    
    
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <?php include("inc/meta.php"); ?>
</head>
<body>
    <?php include("inc/navbar.php");?>

<h1 class="text-center mb-5">Tom pour la collection <?= $books->getTitle(); ?></h1>


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
      <th scope="col"></th>

      <th scope="col">Modifier</th>

    </tr>
  </thead>
  <tbody>
    
    <tr>
      <th scope="row"><?= $books->getId();  ?></th>
      <td><?= $books->getNum() ?></td>
      <td><?= $books->getTitle() ?></td>
      <td><?= $books->getScriptwritter() ?></td>
      <td><?= $books->getIllustrator()?></td>
      <td><?= $books->getReleaseyear()?></td>
      <td><?= $books->getEditor() ?></td>
      <td><?= $books->getStrips() ?></td>
      <td><img class="w-25 m-auto"src="asset/images/<?= $books->getCover()?>"></td>

      <td><a href=""><button>Editer</button></a><button>Supprimer</button></a></td>

    </tr>
   
  </tbody>
</table>
</div>



<div class="container">
        <form action="add_books.php?<?php $books->getId() ?>" method="POST">
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
                
        <label for="cover">Cover</label>
        <p><input type="file" name="cover" value=""></p>

        <p><button type="submit" name="add">Ajouter</button></p>

        </form>
        <?php var_dump($_FILES['cover']); ?>
</div>
    <?php include("inc/footer.php");?> 
    

</body>
</html>