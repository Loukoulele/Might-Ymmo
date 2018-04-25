<?php
session_start();

if (isset($_POST['action'])) {
  session_destroy();
  header('Location: ../index.php');
}

?>
