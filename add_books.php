<?php require_once("inc/classes/database.class.php");
      require_once("inc/classes/book.class.php");
      require_once("inc/classes/serie.class.php");



      if(!empty($_POST) && (isset($_POST['add']))){
        $new = new Serie($_POST);
        
            $new->save();
        
        header('Location:add_series.php');
        
        var_dump($new);
        
    }/*elseif(!empty($_POST) && isset($_POST['supp'])){
        
        
        $new = new Theater($_POST['id']);
        $new->delete();
        
        header('Location:resultclassvg.php');
        
    }*/

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

   


    <?php include("inc/footer.php");?>    
</body>
</html>