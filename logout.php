<?php
// Si quelqu un est connecte
  session_start();
// On enelve ses caractéristiques
  unset($_SESSION["id"]);
  unset($_SESSION["role"]);
// On le redirige sur la page index
  header("Location: index.php");

 ?>
