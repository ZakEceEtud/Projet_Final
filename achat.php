<?php

// Insertion init et header (=barre nav)
  $title = "Achat";
  include("include/init.php");

// Direction page de connexion si non connecté
  if(!isConnect()){
    header("Location: login.php");
    die();
  }

// Récupération catégorie et type de vente
  if(isset($_GET["cat"]) && isset($_GET["type"]))
  {
    // Variables
    $show_menu = false;
    $cat = $_GET["cat"];
    $type = $_GET["type"];

    // Requête
    $req = mysqli_query($bdd,
      "SELECT objets.*, utilisateurs.pseudo
			 FROM objets, utilisateurs
			 WHERE utilisateurs.id = objets.id_vendeur
       AND cat = '$cat' AND type = '$type'"
    );
  } else {
    $show_menu = true;
  }

// Insertion header (=barre de navigation)
  include("include/header.php");
 ?>

  <?php if($show_menu) : ?>


      <!--Création d'un bloc de contenu-->
      <div class="container text-center" id="menu">
          <div class="row">

          <!--Première colonne de largeur 4/12-->
          <div class="Premiere col-sm-4 well">

              <div class="overlay"></div>  <!--Superposition sur le fond d'écran-->

            <!-- Cadre type de vente Enchères-->
            <h3><strong>Enchères :</strong></h3>
            <br>
            <h4>A vous d'encherir' !</h4>
            <br>
            <ul>
              <!-- Accès trois catégories FT/BM/VIP-->
              <?php foreach ($CAT as $key => $value): ?>
                <li><a href="achat.php?type=0&cat=<?= $key ?>" ><?= $value ?></a></li><br>
              <?php endforeach; ?>
            </ul>
          </div>
          <!--Fermeture de la 1ère colonne-->

          <!--Deuxième colonne de largeur 4/12-->
          <div class="Deuxieme col-sm-4 well">


              <div class="overlay"></div>  <!--Superposition sur le fond d'écran-->

              <!-- Cadre type de vente MO -->
              <h3><strong>Meilleure Offre :</strong></h3>
              <br>
              <h4>A vous de négocier !</h4>
              <br>
              <ul>
                <!-- Accès trois catégories FT/BM/VIP-->
                <?php foreach ($CAT as $key => $value): ?>
                  <li><a href="achat.php?type=1&cat=<?= $key ?>" ><?= $value ?></a></li><br>
                <?php endforeach; ?>
              </ul>
          </div>
          <!--Fermeture de la 2ème colonne-->

          <!--Ouverture colonne de droite-->
          <div class="Troisieme col-sm-4 well">


              <div class="overlay"></div>  <!--Superposition sur le fond d'écran-->

              <!-- Cadre type de vente MO -->
              <h3><strong>Achat Immédiat :</strong></h3>
              <br>
              <h4>Ne vous faites pas doubler !</h4>
              <br>
              <ul>
                <!-- Accès trois catégories FT/BM/VIP-->
                <?php foreach ($CAT as $key => $value): ?>
                  <li><a href="achat.php?type=2&cat=<?= $key ?>" ><?= $value ?></a></li><br>
                <?php endforeach; ?>
              </ul>
          </div>
          <!--Fermeture de la colonne de droite-->

        </div>
      </div>
        <!--Fermeture du bloc d'écriture-->




  <?php else : ?>

       <!--Création d'un bloc de contenu-->
       <div class="container">

         <!-- Changement catégorie et type de vente en fonction du lien suivi-->
         <h2>Bienvenu dans l'espace des <?= $TYPE[$type] ?> de <?= $CAT[$cat] ?>.</h2><br>
         <h4>Vous trouverez ici l'intégralité des bijoux et trésors en vente aux enchères. </h4><br>
         <br><br>



 <!--Création d'un pseudo tableau-->

       <table class="table">

           <thead><!-- En-tête-->
               <tr><!--Ligne 1-->
                   <th>Photo</th><!--1ère colonne-->
                   <th>Nom</th><!--2ème colonne-->
                   <th>Description</th><!--3ème colonne-->
                   <th>Prix</th>
                   <th>Publication de l'enchère</th>
                   <th>Vendeur</th>
                   <th>Action</th>
               </tr>
           </thead>

           <tbody>
             <!-- Remplissage des infos des objets en vente-->
               <?php while ($data = mysqli_fetch_array($req)): ?>
               <tr>
                 <td>IMG</td><!-- TD = changement dee colonne-->
                 <td><?= $data["nom"] ?></td>
                 <td><?= $data["description"] ?></td>
                 <td><?= $data["prix"] ?></td>
                 <td><?= $data["date"] ?></td>
                 <td><a href="account.php?id=<?= $data["id_vendeur"] ?>"><?= $data["pseudo"] ?></a></td>
                 <td>
                   <?php switch ($type) {
                     // Si vente Enchères :
                     case 0:
                       echo '<button class="btn"><a href="#">Enchérir</a></button>';
                       break;
                       // Si vente MO :
                     case 1:
                        echo '<button class="btn"><a href="#">Négocier</a></button>';
                        break;
                        // Si vente AI :
                     case 2:
                        echo '<button class="btn"><a href="panier.php?add=' . $data["id"] . '">Acheter</a></button>';
                        break;
                     }
                   ?>
                 </td>
               </tr>
             <?php endwhile; ?>

           </tbody>

         </table>

       </div>

    <?php endif; ?>

 <?php
 // Inclusion footer (bas de page)
    include("include/footer.php");
?>
