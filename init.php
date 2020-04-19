<?php
session_start();

// Connexion à la BDD
$bdd = mysqli_connect('localhost', 'root', '', 'enchere');

// Variables utiles :

// Variables alternatives coordonnant les données de la table aux données utilisées pour le statut
$ROLE = array(
  0 => "Acheteur",
  1 => "Vendeur",
);

// Variables alternatives coordonnant les données de la table aux données utilisées pour les types de vente
$TYPE = array(
  0 => "Encheres",
  1 => "Négociation",
  2 => "Achat Immédiat"
);

// Variables alternatives coordonnant les données de la table aux données utilisées pour les catégories de vente
$CAT = array(
  0 => "Ferraille et Trésor",
  1 => "Bon pour le musée",
  2 => "Accessoires VIP",
);


// Si un utilisateur est connecté
if(isConnect()){
  // Récupération l'ID de l'utilisateur
  $currentUser = getUser($_SESSION["id"]);
  // Récupération du statut de l'utilisateur
  $currentUser["role"] = $_SESSION["role"];
}

// Définition de la fonction de récupération de l'ID
function getUser($id)
{
  global $bdd;
  // Requête
  $result = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = '$id'");
  $utilisateur = mysqli_fetch_array($result);
  return $utilisateur;
}

// Définition de la fonction de test (connecté ou non)
function isConnect()
{
  // Si la case est non vide => connecté
  if(isset($_SESSION["id"]) && isset($_SESSION["role"])){
    return true;
  }
  // Si la case est vide => non connecté
  return false;
}

?>

