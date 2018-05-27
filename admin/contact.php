<?php
  session_start();
?>

  <?php
    include 'calldb.php';

  $nom = $email = $mess = $nomError = $emailError = $messError = "";

  if(!empty($_POST))
  {
    $nom            = checkInput($_POST['nom']);
    $email          = checkInput($_POST['email']);
    $mess           = checkInput($_POST['mess']);
    $tel           = checkInput($_POST['tel']);
    $id_appart      = $_SESSION['id'];
    $isSucces       = true;

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

    if(empty($tel))
    {
      $telError = 'Ce champs ne peut pas être vide';
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
      $statement = $db->prepare("INSERT INTO message (mess, nom, tel, email, id_appart) values(?, ?, ?, ?, ?)");
      $statement->execute(array($mess, $nom, $tel, $email, $id_appart));
      Database::disconnect();
      header("Location: ../appart/appart.php");
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
<div id="contact" class="container">
    <h3 class="text-center">Contact</h3>
      <form class="form text-center" role="form" action="contact.php" method="post" enctype="multipart/form-data">
      <div class="col">
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="nom" name="nom" placeholder="nom" type="text" required value="<?php echo $nom; ?>">
            <span class="help-inline"><?php echo $nomError; ?></span>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required value="<?php echo $email; ?>">
            <span class="help-inline"><?php echo $emailError; ?></span>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="tel" name="tel" placeholder="tel" type="number" required value="<?php echo $tel; ?>">
            <span class="help-inline"><?php echo $telError; ?></span>
          </div>
        </div>
        <textarea class="form-control" id="mess" name="mess" placeholder="mess" rows="5" value="<?php echo $mess; ?>"></textarea>
        <span class="help-inline"><?php echo $messError; ?></span>
        <br>
        <div class="row">
          <div class="col-md-12 form-group">
            <button class="btn" type="submit">Send</button>

          </div>
        </div>
      </div>
    </form>
  </div>
