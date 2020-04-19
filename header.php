<!DOCTYPE html>
<html>

<head>

  <!--Chargement des modules nécessaires-->
  <meta charset="utf-8" />
  <script type="text/javascript" src="fonction_champ_vide.js">  </script> <!--JavaScript-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  <!--Bootstrap-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  <!-- Jquery-->

  <!--Lien des différentes pages entre elles-->
  <link rel="stylesheet" type="text/css" href="style.css">
  <title><?= $title ?></title>

</head>

<body>

  <!--Création de la barre supérieur-->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">

        <!-- Création du bouton ECE Enchères-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">ECE Enchères</a>   <!--Bouton ECE Enchères-->
      </div>
      <!-- Fin du bouton ECE-->

        <!-- Ajout des boutons sur la barre de navigation-->
        <div class="collapse navbar-collapse" >
          <!--Création d'une liste pour ajouter x bouttons-->
          <ul class="nav navbar-nav">
            <?php if(isConnect()): ?>
              <?php if ($currentUser["role"] == 0): ?>
                <li class="<?php if($title == "Achat"){ echo 'active'; } ?>" ><a href="achat.php">Acheter</a></li>
              <?php else: ?>
                <li class="<?php if($title == "Vendre"){ echo 'active'; } ?>" ><a href="vente.php">Vendre</a></li>
              <?php endif; ?>

              <li class="<?php if($title == "Mon compte"){ echo 'active'; } ?>" ><a href="account.php">Mon compte</a></li>

                  <?php if($currentUser["admin"]) : ?>
                    <li><a href="admin.php">Espace admin</a></li>
                  <?php endif; ?>

              <li><a href="logout.php">Déconnexion</a></li>

            <?php endif; ?>
          </ul>
          <!--Fin des boutons sur la barre de recherche-->

        <!--Insertion du panier-->
        <form class="navbar-form navbar-right">
          <button class="btn btn-default" type="button">
            <a href="panier.php">Panier <img src="panier.jpg" style="height:20px; width: 20px;"></a>
          </button>
        </form>
        <!--Fin insertion du panier-->

        <!-- Création de la barre de recherche-->
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Rechercher un article">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
          </div>
        </form>
        <!--Fin de la barre de recherche-->
        </div>
      </div>
    </nav>
    <!--Fin de la barre supérieure-->
