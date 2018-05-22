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
  <style><?php include 'admin.css'; ?></style>
  <?php
  include 'calldbmess.php';
  include 'side_menu/side_menu.php';
  ?>

  <div class="row justify-content-end">
    <div class="col-4">
      <div class="card shadow detail">
      <h3 class="text-logo text-center">Message</h3>
          <div class="card-body">
            <p><?php echo ' ' . $message['id']; ?></p>
            <label><p><?php echo ' ' . $message['mess']; ?></p></label>
            <p><?php echo ' ' . $message['nom']; ?></p>
            <p><?php echo ' ' . $message['tel']; ?></p>
            <p><?php echo ' ' . $message['email']; ?></p>
          </div>
    </div>
  </div>
        <div class="col-5">
          <div class="card shadow">
          </div>
        </div>
      </div>
</body>
