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

  $immeubleError = $nbr_pieceError = $descriptionError = $villeError = $adresseError = $loyerError = $date_dispoError = $etageError = $mcarreError = $imageError =
  $immeuble = $nbr_piece = $description = $ville = $adresse = $loyer = $date_dispo = $etage = $mcarre = $image = "";

  if(!empty($_POST))
  {
    $immeuble             = checkInput($_POST['immeuble']);
    $nbr_piece            = checkInput($_POST['nbr_piece']);
    $description          = checkInput($_POST['description']);
    $ville                = checkInput($_POST['ville']);
    $adresse              = checkInput($_POST['adresse']);
    $loyer                = checkInput($_POST['loyer']);
    $date_dispo           = checkInput($_POST['date_dispo']);
    $etage                = checkInput($_POST['etage']);
    $mcarre               = checkInput($_POST['mcarre']);
    $image                = checkInput($_FILES['image']['name']);
    $imagePath            = '../images/' . basename($image);
    $imageExtension       = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSucces             = true;
    $isUploadSuccess      = false;

    if(empty($immeuble))
    {
      $immeubleError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($nbr_piece))
    {
      $nbr_pieceError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($description))
    {
      $descriptionError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($ville))
    {
      $villeError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($adresse))
    {
      $adresseError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($loyer))
    {
      $loyerError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($date_dispo))
    {
      $date_dispoError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($etage))
    {
      $etageError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($mcarre))
    {
      $mcarreError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($image))
    {
      $imageError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    else
    {
      # code...
      $isUploadSuccess = true;

      if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") // Verification des formats d'extension, grâce à la variable $imageExtension.
      {
        $imageError = "Les fichiers autorises sont : .jpg, .jpeg, .png, .gif";
        $isUploadSuccess = false;
      }

      if (file_exists($imagePath)) // Verification de l'image deja existante ou pas.
      {
        $imageError = "Le fichier existe deja";
        $isUploadSuccess = false;
      }

      if ($_FILES["image"]["size"] > 500000)
      {
        $imageError = "Le fichier ne doit pas depasser les 500KB";
        $isUploadSuccess = false;
      }

      if ($isUploadSuccess)
      {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))
        {
          $imageError = "Il y a eu un erreur de l'upload";
          $isUploadSuccess = false;
        }
      }
    }

    if ($isSucces && $isUploadSuccess)
    {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO appartement (immeuble,nbr_piece,description,ville,adresse,loyer,date_dispo,etage,mcarre,image) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $statement->execute(array($immeuble, $nbr_piece, $description, $ville, $adresse, $loyer, $date_dispo, $etage, $mcarre, $image));
      Database::disconnect();
      header("Location: in_appart.php");
    }

  }





  function checkInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
     integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo.jpg" />
  </head>

  <body>

    <h1 class="text-logo">Ajouter un Appartement :</h1>
    <div class="container admin">
      <div class="row">
       <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
         <div class="col-sm-6">
         <div class="form-group">
           <label for="immeuble">Immeuble : </label>
           <select class="form-control" id="immeuble" name="immeuble">
             <?php
                $db = Database::connect();
                foreach ($db->query('SELECT * FROM immeuble') as $row) // Boucle sur la selection dans la BD sur immeuble et le met sous form de rangé grâce au row
                {
                  # code...
                  echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                }
                Database::disconnect();
              ?>
           </select>
           <span class="help-inline"><?php echo $immeubleError; ?></span>
         </div>
         <div class="form-group">
           <label for="nbr_piece">Nombre de pièce(s) : </label>
           <input type="number" step="1" class="form-control" id="nbr_piece" name="nbr_piece" placeholder="Nombre de pièce(s)" value="<?php echo $nbr_piece; ?>">
           <span class="help-inline"><?php echo $nbr_pieceError; ?></span>
         </div>
         <div class="form-group">
           <label for="description">Description : </label>
           <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
           <span class="help-inline"><?php echo $descriptionError; ?></span>
         </div>
         <div class="form-group">
           <label for="ville">Ville : </label>
           <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" value="<?php echo $ville; ?>">
           <span class="help-inline"><?php echo $villeError; ?></span>
         </div>
         <div class="form-group">
           <label for="adresse">Adresse : </label>
           <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="<?php echo $adresse; ?>">
           <span class="help-inline"><?php echo $adresseError; ?></span>
         </div>
         <div class="form-group">
           <label for="loyer">Loyer : en CHF (Exemple : 1230.50)</label>
           <input type="number" step="0.01" class="form-control" id="loyer" name="loyer" placeholder="Loyer" value="<?php echo $loyer; ?>">
           <span class="help-inline"><?php echo $loyerError; ?></span>
         </div>
         <div class="form-group">
           <label for="date_dispo">Date disponibilité : </label>
           <input type="date" class="form-control" id="date_dispo" name="date_dispo" placeholder="Date Disponibilité" value="<?php echo $date_dispo; ?>">
           <span class="help-inline"><?php echo $date_dispoError; ?></span>
         </div>
         <div class="form-group">
           <label for="etage">Etage : </label>
           <input type="number" class="form-control" id="etage" name="etage" placeholder="Etage" value="<?php echo $etage; ?>">
           <span class="help-inline"><?php echo $etageError; ?></span>
         </div>
         <div class="form-group">
           <label for="mcarre">M²: </label>
           <input type="number" step="0.1" class="form-control" id="mcarre" name="mcarre" placeholder="M²" value="<?php echo $mcarre; ?>">
           <span class="help-inline"><?php echo $mcarreError; ?></span>
         </div>
         <div class="form-group">
           <label for="image">Sélectionner une image : </label>
           <input type="file" id="image" name="image" >
           <span class="help-inline"><?php echo $imageError; ?></span>
         </div>
         <div class="form-actions">
           <button type="submit" class="btn btn-succes"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
           <a class="btn btn-primary" href="in_appart.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
       </div>
       </form>
     </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="../appart/vendor/jquery/jquery.min.js"></script>
    <script src="../appart/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
