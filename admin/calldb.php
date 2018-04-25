<?php

  require 'Database.php'; // Différence entre require et include : require obligatoire sinon echec

  if(!empty($_GET['id']))
  {
    $id = checkInput($_GET['id']);
  }

  $db = Database::connect();
  $statement = $db->prepare('SELECT appartement.id, appartement.ville, appartement.adresse, appartement.description,appartement.image, appartement.etage, appartement.mcarre, appartement.loyer, appartement.nbr_piece,appartement.date_dispo, immeuble.code_ref AS immeuble
                          FROM appartement LEFT JOIN immeuble ON appartement.id = immeuble.code_ref WHERE appartement.id = ?');
  $statement->execute(array($id));
  $appartement = $statement->fetch();
  Database::disconnect();



  function checkInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>
