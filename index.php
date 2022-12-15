<?php require_once("inc/classes/database.class.php");
      require_once("inc/classes/book.class.php");
      require_once("inc/classes/serie.class.php");

        $co = new Database;

        $query=$co->prepare('SELECT s.title, s.id, b.cover FROM books b INNER JOIN series s ON s.id=b.serie_id');
        $query->execute();
        $series = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // $r = $co->prepare("SELECT * FROM `books` WHERE id = 1");
        // $r->execute();
        // $result=$r->fetch(PDO::FETCH_ASSOC);

        // $livre= new Book($result);
        // print $livre->getTitle();

        // var_dump($livre);

        // $objet->setId($row['id']);

     
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
<?php include("inc/meta.php"); ?>
    <title>Accueil</title>
</head>
<body>
<?php include("inc/navbar.php");?>


<h3 class="text-center mt-2"></h3>
<?php foreach($series as $serie):?>
    <div class="container">
        <?php //var_dump($serie['cover'].'.jpg') ?>
               <a href="#"><img src="asset/images/<?= $serie['cover'];?>" class="card-img w-25" alt="..."></a>
           
                </div>
    </div>

<?php endforeach;?>
<?php include("inc/footer.php"); ?>
</body>
</html>