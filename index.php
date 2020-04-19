<?php

  $title = "Vente";
  include("include/init.php");



  include("include/header.php");
 ?>


     <header class="COL_ECE">
     <!--Mise en place de la supersposition avec l'image COL1-->
       <script type="text/javascript">
       $(document).ready(function(){
         $('.COL_ECE').height($(window).height());
         });
       </script>
       <div class="overlay"></div>  <!--Superposition sur le fond d'écran-->
     </header>

     <!--Création d'un espace pour le texte à superposer-->
     <div class="Texte_Superpose well">
       <h1>Bienvenue sur notre site de vente !</h1>
       <h4>Vous aurez ici la possibilité de trouver l'objet de vos rêves parmis un grand nombre de propositions de ventes.<br>
           Collectionneur, comme amateur, petits et grands allez explorer notre site pour découvrir la perle rare !</h4><br>
           <button class="btn btn-outline-secondary btn-lg"><a href="login.php">Pour vous connecter c'est ici</a></button><br><br>
       <button class="btn btn-outline-secondary btn-lg"><a href="inscription.php">Pour vous créer un compte c'est par ici</a></button>
     </div>


 <?php
    include("include/footer.php");
?>
