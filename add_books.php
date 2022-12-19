
<?php require_once("inc/classes/database.class.php");
      require_once("inc/classes/book.class.php");
      require_once("inc/classes/serie.class.php");


      if(isset($_GET['id'])){
        $serie_id = $_GET['id'];
      }
      
      $insertion = false;

      $serie = new Serie($serie_id);
      $serie_books = $serie->getTomes();

    //  var_dump($serie);

    //  $tableau = [];
    //  $db = new Database();
    //  $requete = $db->prepare("SELECT * FROM `series` WHERE title = 'Speederman'");
    //  $requete->execute();
    //  $tableau = $requete->fetch(PDO::FETCH_ASSOC);
     
    //   var_dump($tableau);
    //  $serie2 = new Serie($tableau);
    //  var_dump($serie2);

      
      if(!empty($_POST) && (isset($_POST['add']) || isset($_POST['edit'])))
      {

        $new_livre = new Book($_POST);
        $new_livre->setSerie_Id($serie_id);

        if($new_livre->getCover() != ''){
          $new_livre->setRep(true);
        }
        else{
          $new_livre->setRep(false);
        }
          
        $etat_insertion = $new_livre->save();

        $insertion = true;

      }
    elseif(!empty($_POST) && isset($_POST['supp']))
    {
        $new = new Book($_POST['id']);
        $new->delete();  
    }
    
    if(isset($_GET["id"])){
      if($insertion){
        if($etat_insertion){
          header('Location:add_books.php?id='.$serie_id.'&succes=vrai');  
        }else{
          header('Location:add_books.php?id='.$serie_id.'&succes=faux');  
        }
      }
  }
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <?php include("inc/meta.php"); ?>
</head>
<body>

    <?php include("inc/navbar.php");
    
    if(isset($_GET["id"]) && isset($_GET["succes"])){
      if($_GET["succes"] == "vrai"){
        echo "<p style='color:green;'>Bien joué, ton insertion s'est bien faite en base.</p>";
      }else{
        echo "<p style='color:red;'>Ah dommage, ton insertion a échouée.</p>";
      }
    }

?>

<div class="container">
<h1 class="text-center mb-5">Tom pour la collection <?= $serie->getTitle(); ?></h1>

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
  <?php 
    foreach($serie_books as $tome):
  ?>
      <tr>
        <th scope="row"><?= $tome["id"] ?></th>
        <td><?= $tome["num"] ?></td>
        <td><?= $tome["title"] ?></td>
        <td><?= $tome["scriptwriter"]  ?></td>
        <td><?= $tome["illustrator"] ?></td>
        <td><?=  $tome["releaseyear"] ?></td>
        <td><?=  $tome["editor"] ?></td>
        <td><?=  $tome["strips"] ?></td>
        <td><img class="w-25 m-auto"src="asset/images/<?= $tome["cover"]?>"></td>
        <td><a href=""><button>Editer</button></a><button>Supprimer</button></a></td>

      </tr>
  <?php endforeach; ?>

  </tbody>
</table>
</div>

<p class="text-center mt-5">Ajouter un épisode</p>

<div class="container">
        <form method="POST">
        <label for="title">Titre</label>
        <p><input type="text" name="title" placeholder="Titre de la série" required></p>

       <label for="num">Numéro</label>
        <p><input type="number" name="num" placeholder="Numéro du tom" required></p> 

        <label for="auteur">Auteur</label>
        <p><input id="auteur" type="text" name="scriptwriter" placeholder="Auteur" required></p>

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
        
</div>
    <?php include("inc/footer.php");?> 
</body>
</html>


