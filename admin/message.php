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
          <h4>Liste des messages</h4>
        </div>
        <div class="ontent table-full-width table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                 <th scope="col">ID</th>
                 <th scope="col">Message</th>
                 <th scope="col">Nom</th>
                 <th scope="col">Téléphone</th>
                 <th scope="col">Email</th>
                 <th><a class="add" href="insert.php"><i class="fas fa-plus"></i></a></th>
               </tr>
             </thead>
         <tbody>
                <tr>
                 <?php
                 require 'Database.php';
                 $db = Database::connect();
                 $statement = $db->query('SELECT * FROM message');

                 while($message = $statement->fetch())
                 {
                   echo '<tr>';
                     echo'<td>' . $message['id'] . '</td>';
                     echo'<td>' . $message['mess'] . '</td>';
                     echo'<td>' . $message['nom'] . '</td>';
                     echo'<td>' . $message['tel'] . '</td>';
                     echo'<td>' . $message['email'] . '</td>';

                     echo'<td>';
                       echo '<a class="btn btn-primary" href="view.php?id=' . $message['id_appart'] . '"><i class="fas fa-eye fa-lg"></i></a>';
                       echo '<a class="btn btn-danger" href="message_delete.php?id=' .$message['id'] . '"><i class="far fa-trash-alt fa-lg"></i></a>';
                     echo'</td>';
                   echo'</tr>';
                 }
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
