<?php
session_start();

$bdd = mysqli_connect('localhost', 'root', '', 'enchere');

// VAR DE Config
$ROLE = array(
  0 => "Acheteur",
  1 => "Vendeur",
);

$TYPE = array(
  0 => "Encheres",
  1 => "Négociation",
  2 => "Achat Immédiat"
);

$CAT = array(
  0 => "Ferraille et Trésor",
  1 => "Bon pour le musée",
  2 => "Accessoires VIP",
);



if(isConnect()){
  $currentUser = getUser($_SESSION["id"]);
  $currentUser["role"] = $_SESSION["role"];
}


function getUser($id){
  global $bdd;
  $result = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = '$id'");
  $utilisateur = mysqli_fetch_array($result);
  return $utilisateur;
}

function isConnect(){
  if(isset($_SESSION["id"]) && isset($_SESSION["role"])){
    return true;
  }
  return false;
}

?>
