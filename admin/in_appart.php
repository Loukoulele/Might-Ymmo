<?php

session_start();
require_once '../Database.php';

if(!isset($_SESSION['admin']))
{
  header('location:login.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mightymmo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
      <link rel="stylesheet" type="text/css" href="admin.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
     integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <link rel="icon" href="imgs/favicon.png" />

  </head>
  <body>
    <?php
    include 'side_menu/side_menu.php';
    ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-auto">
      <div class="card shadow">
        <div class="header text-center">
          <H4>Liste d'appartements </h4>
        </div>
        <div class="ontent table-full-width table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                 <th scope="col">Id</th>
                 <th scope="col">Ville</th>
                 <th scope="col">m²</th>
                 <th scope="col">Loyer</th>
                 <th scope="col">Pièce(s)</th>
                 <th scope="col">Adresse</th>
                 <th scope="col">Etage</th>
                 <th scope="col" style="max-width:5em !important">Description</th>
                 <th scope="col">Disponibilité</th>
                 <th><a class="add" href="insert.php"><i class="fas fa-plus"></i></a></th>
               </tr>
             </thead>
         <tbody>
                <tr>
                 <?php
                 require 'Database.php';
                 $db = Database::connect();
                 $statement = $db->query('SELECT appartement.id, appartement.ville, appartement.adresse, appartement.description, appartement.etage,
                   appartement.mcarre, appartement.loyer, appartement.nbr_piece, appartement.date_dispo, immeuble.code_ref AS immeuble
                   FROM appartement LEFT JOIN immeuble ON appartement.id = immeuble.code_ref');

                 while($appartement = $statement->fetch())
                 {
                   echo '<tr>';
                     echo'<td>' . $appartement['id'] . '</td>';
                     echo'<td>' . $appartement['ville'] . '</td>';
                     echo'<td>' . $appartement['mcarre'] . '</td>';
                     echo'<td>' . $appartement['loyer'] . '</td>';
                     echo'<td>' . $appartement['nbr_piece'] . '</td>';
                     echo'<td>' . $appartement['adresse'] . '</td>';
                     echo'<td>' . $appartement['etage'] . '</td>';
                     echo'<td>' . $appartement['description'] . '</td>';
                     echo'<td>' . $appartement['date_dispo'] . '</td>';

                     echo'<td>';
                       echo '<a class="btn btn-primary" href="view.php?id=' . $appartement['id'] . '"><i class="fas fa-eye fa-lg"></i></a>';
                       echo '<a class="btn btn-primary" href="update.php?id=' .$appartement['id'] . '"><i class="fas fa-pencil-alt fa-lg"></i></a>';
                       echo '<a class="btn btn-danger" href="delete.php?id=' .$appartement['id'] . '"><i class="far fa-trash-alt fa-lg"></i></a>';
                     echo'</td>';
                   echo'</tr>';
                 }

                 $_SESSION['id'] = $appartement['id'];
                  ?>
               </tr>
             </tbody>
           </table>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div>

  </body>
</html>
