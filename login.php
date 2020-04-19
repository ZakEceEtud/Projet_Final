<?php

  $title = "Connexion";
  include("include/init.php");

  if(isConnect()){
    header("Location: account.php");
    die();
  }

  if(!empty($_POST)){
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
    $result = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo' AND mdp = '$mdp'");
    $utilisateur = mysqli_fetch_array($result);

    if($utilisateur != null){
      // Connect l'utilisateur
      $_SESSION["id"] = $utilisateur["id"];
      $_SESSION["role"] = $_POST["role"];
      header("Location: account.php");
      die();
    }
  }


  include("include/header.php");
 ?>

 <form method="POST">
     <header class="FA">
     <!--Mise en place de la supersposition avec l'image COL1-->
       <script type="text/javascript">
       $(document).ready(function(){
         $('.FA').height($(window).height());
         });
       </script>
       <div class="overlay"></div>  <!--Superposition sur le fond d'écran-->


     <!--Création d'un espace pour le texte à superposer-->
     <div class="Texte_Superpose well" style="top: 35%">
       <h1>Identification :</h1>
       <p>Si vous possédez déjà un compte identifiez vous ci-dessous.<br>
          Si c'est votre première connexion afin de créer un compte,<a href="Formulaire_Inscription.php" title="Créer un compte" target="_blank"> cliquez ici</a></p>

       <!-- Création du formulaire d'accès en fonction du statut : Admin/Acheteur/Vendeur-->
       <div class="Acces" style="padding-left: 18%;">
       <table>

         <!-- Champ statue -->
         <tr>
           <td>Role</td>
           <td>
           <select name="role">
             <option>Choisir un statut</option>
             <?php foreach ($ROLE as $key => $value) : ?>
               <option value="<?= $key ?>"><?= $value ?></option>
             <?php endforeach; ?>
           </select>
           </td>
         </tr>

       <!--Partie Pseudo-->
       <tr>
         <td><label>Pseudo :</label></td>
         <td><input type="text" name="pseudo" placeholder="Pseudo" style="color: black" required></td>
       </tr>

       <!--Partie MDP-->
       <tr>
          <td>Mot de passe:</td>
          <td><input type="password" name="mdp" placeholder="Mot de passe" style="color: black; margin-top: 10px" required></td>
       </tr>

           <!--Bouton soumission-->
           <br><br>
           <tr colspan="2">
             <div class="button">
             <td><input type="submit" name="Connnexion" value="Connexion" style="color: black; margin-top: 10px"></td>
             </div>
           </tr>
         </div>
       </div>

       </table>
     </header>
 </form>



 <?php
    include("include/footer.php");
?>
