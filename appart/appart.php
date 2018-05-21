<!DOCTYPE html>
<html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Mightymmo</title>
      <link href="../BoostrapComponent/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
       integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link href="appart.css" rel="stylesheet">

      <link rel="icon" href="img/favicon.png" />
    </head>

    <body>

    <?php
      include '../assets/header_appart.php';
     ?>
    <!-- Page Content -->
    <div class="container margin">
      <!-- Page Heading -->
      <h1 class="text-center">Secteur : Suisse Romande</br>
      </h1>
      <div class="row">
        <?php
        require '../admin/Database.php';
        $db = Database::connect();
        $statement = $db->query('SELECT id, ville, description, nbr_piece, image FROM appartement');

        while($appartement = $statement->fetch()) // Récupere la requete
        {
          echo'<div class="col-lg-4 col-sm-6 portfolio-item">';
            echo'<div class="card shadow">';
              echo'<a href="../admin/view.php?id=' . $appartement['id'] . '">';?> <img class="card-img-top" src="<?php echo'../images/' . $appartement['image']; ?>" alt=""></a>
              <?php
              echo'<div class="card-body">';
                echo'<h4 class="card-title">'. $appartement['ville'].'</h4>';
                  echo'<h5>Nombre de pièce : ' . $appartement['nbr_piece'].'</h5>';
                echo'<p class="card-text">' . $appartement['description'].'</p>';
              echo'</div>';
            echo'</div>';
          echo'</div>';
        }
        ?>

    </div>
  </div>
    <?php
      include '../assets/footer.php';
     ?>
  </body>
</html>
