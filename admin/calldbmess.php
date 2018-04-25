<?php

  require 'Database.php'; // Différence entre require et include : require obligatoire sinon echec

  if(!empty($_GET['id']))
  {
    $id = checkInput($_GET['id']);
  }

  $db = Database::connect();
  $statement = $db->prepare('SELECT * FROM message WHERE id = ?');
  $statement->execute(array($id));
  $message = $statement->fetch();
  Database::disconnect();



  function checkInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>
