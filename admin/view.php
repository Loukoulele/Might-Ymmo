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

<body>
  <style><?php include 'admin.css'; ?></style>
  <?php
  include 'calldb.php';
  include 'side_menu/side_menu.php';
  ?>

  <div class="row justify-content-center">
    <div class="col-md-6 padding">
      <div class="card shadow detail">
      <h3 class="text-logo text-center">Appartement</h3>
      <img src="<?php echo'../images/' . $appartement['image']; ?>" class="rounded mx-auto d-block" alt="..." width="500" height="400">
          <div class="card-body">
            <p><?php echo ' ' . $appartement['id']; ?></p>
            <p><?php echo ' ' . $appartement['description']; ?></p>
            <p><?php echo ' ' . $appartement['mcarre']; ?></p>
            <p><?php echo ' ' . $appartement['nbr_piece']; ?></p>
            <p><?php echo ' ' . $appartement['ville']; ?></p>
            <p><?php echo ' ' . $appartement['adresse']; ?></p>
            <p><?php echo ' ' . $appartement['etage']; ?></p>
            <p><?php echo ' ' . $appartement['date_dispo']; ?></p>
          </div>
    </div>
</body>
