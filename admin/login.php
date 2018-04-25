
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mightymmo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
   integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="login.css">

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
    session_start()
    ?>

	<div class="container">
		<img src="imgs/logo.png">
		<form class="form-group" action="login.php" method="POST">
			<div class="input-group">
				<div class="input-group-text"><i class="fa fa-user fa-lg" aria-hiden="true"></i></div>
				<input class="form-control" type="username" name="username" placeholder="username"/>
		  	</div>
		  	<div class="input-group">
		  		<div class="input-group-text"><i class="fa fa-lock fa-lg" aria-hiden="true"></i></div>
		    	  <input class="form-control" type="password" name="password" placeholder="password"/>
		  	</div>
		  		<button class="btn btn-primary">Sign in</button>
		</form>
	</div>

    <?php
    require_once '../Database.php';
  ?>
  <?php
  if (isset($_POST) AND !empty($_POST))
  {
    if (!empty(htmlspecialchars($_POST['username'])) AND !empty(htmlspecialchars($_POST['password'])))
    {
      $req = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
      $req->execute([
        'username' => $_POST['username'],
        'password' => $_POST['password']

      ]);

      $user = $req->fetchObject(); // exe ma req


      if ($user)
      {
                $_SESSION['admin'] = $_POST['username'];
                header('location:in_appart.php');
      }
      else
      {
        $error = "Identifiants incorrect";
      }
    }
    else
    {
      $error = 'Veuillez remplir tous les champs !';
    }
  }
  if (isset($error))
  {
    echo '<div class="alert">'.$error.'</div>';
  }
 ?>
</body>
