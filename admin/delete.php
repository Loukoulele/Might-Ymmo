<?php

session_start();
require_once '../Database.php';

if(!isset($_SESSION['admin']))
{
  header('location:login.php');
}

 ?>
<?php
  require 'database.php';

  if (!empty($_GET['id']))
  {
    # code...
    $id = checkInput($_GET['id']);
  }

  if (!empty($_POST))
  {
    # code...
    $id         = checkInput($_POST['id']);
    $db         = Database::connect();
    $statement  = $db->prepare("DELETE FROM appartement where id = ?");
    $statement  ->execute(array($id));
    Database::disconnect();
    header("Location: in_appart.php");
  }

  function checkInput($data)
  {
    $data       = trim($data);
    $data       = stripslashes($data);
    $data       = htmlspecialchars($data);
    return $data;
  }

  ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGIS SA</title>

    <!-- Bootstrap core CSS -->
    <link href="../appart/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet">
    <script src ="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <link rel="icon" href="img/logo.jpg" />
    <link href="footer/footer.php" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <h1 class="text-logo text-center">Supprimer un Appartement :</h1>
    <br/><br/>
    <div class="container admin">
      <div class="row">
       <form class="form" role="form" action="delete.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id;?>" />
         <p class="alert alert-warning">Êtes vous sur de vouloir supprimer ?</p>
         <div class="form-actions">
           <button type="submit" class="btn btn-warning">Oui</button>
           <a class="btn btn-primary" href="in_appart.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
         </div>
       </form>
     </div>
   </div>


    <!-- Bootstrap core JavaScript -->
    <script src="../appart/vendor/jquery/jquery.min.js"></script>
    <script src="../appart/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
