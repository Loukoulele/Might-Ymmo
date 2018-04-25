<?php
  require 'db_contact.php';

  $nom = $email = $mess = "";

  if(!empty($_POST))
  {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mess = $_POST['mess'];
    $isSucces = true;

    if(empty($nom))
    {
      $nomError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($email))
    {
      $emailError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if(empty($mess))
    {
      $messError = 'Ce champs ne peut pas être vide';
      $isSuccess = false;
    }

    if ($isSucces)
    {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO message (nom, mess, email) values(?, ?, ?)");
      $statement->execute(array($nom, $mess, $email));
      Database::disconnect();
      header("Location: index.php");
    }

  }

  ?>


<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our fans!</em></p>

  <div class="row">
    <!-- <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
    </div> -->
    <form class="form" role="form" action="contact_message.php" method="post" enctype="multipart/form-data">
    <div class="col">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="nom" name="nom" placeholder="nom" type="text" required value="<?php echo $nom; ?>">
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required value="<?php echo $email; ?>">
        </div>
      </div>
      <textarea class="form-control" id="mess" name="mess" placeholder="mess" rows="5" value="<?php echo $mess; ?>"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </form>
  </div>
