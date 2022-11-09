<?php require_once("inc/classes/database.class.php");
      require_once("inc/classes/book.class.php");
      require_once("inc/classes/serie.class.php");



      if(!empty($_POST) && (isset($_POST['add']) || isset($_POST['edit']))){
        $new = new Serie($_POST);
        
            $new->save();
        
        header('Location:add_series.php');
        
        var_dump($new);
        
    }elseif(!empty($_POST) && isset($_POST['supp'])){
        
        
        $new = new Serie($_POST['id']);
        $new->delete();
        
        header('Location:add_series.php');
        
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

<div class="container border w-75">

    <h1 class="text-center">Ajouter une série</h1>

            <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">

            <p><input type="text" name="title" placeholder="Titre de la série" required></p>

            <p><input type="text" name="origin" placeholder="Pays d'origine" required></p>
            <p><input type="text" name="city" placeholder="Ville"></p>
            <p><button type="submit" name="add">Ajouter</button></p>

            </form>
</div>
<div class="container border w-75">
<h1 class="text-center">Editer une série</h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Origine</th>
            <th>ID</th>
            <th>Meta-Dates</th>
            <th>Editer</th>
            <th></th>

        </tr>
    </thead>
    <tbody>

    <?php foreach($t as $v): ?>
        <tr>
            <td><?= $v-> getTitle(); ?></td>
            <td><?= $v-> getOrigin(); ?></td>
            <td><?= $v-> getId();?></td>
            <td><?= $v-> getId(); ?><br>
                <?= $v-> getCreated(); ?><br>
                <?= $v-> getUpdated(); ?>
        </td>
        

    <td>
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                <button type="sumbit" name="supp">Supprimer</button>
               
                <a href="<?= $_SERVER['PHP_SELF']?>?edit=<?= $v->getId(); ?>">Editer</a>
                <input type="hidden" name="id"value="<?= $v->getId();?>">
        </form>
    </td>
    <td><a href="add_books.php"><button>Ajouter Episode</button></a></td>

        </tr>
    </tbody>
<?php endforeach;?>
</table>

<?php  
if(!empty($_GET['edit'])){
    $o= new Serie($_GET['edit']);

    ?>

<form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">

    <input type="hidden" name="id" value="<?= $o->getId(); ?>">

<p><input type="text" name="title" value="<?= $o->getTitle(); ?>" required></p>
<p><input type="text" name="origin" value="<?= $o->getOrigin(); ?>" required></p>
<p><button type="submit" name="edit">Modifier</button></p>

</form>
<?php } ?>

</div>


    <?php include("inc/footer.php");?>    
</body>
</html>