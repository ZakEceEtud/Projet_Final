<?php
	$title = "Paiment";
	include("include/init.php");
	include("include/header.php");
?>

<body style="text-align: center;">
 <h2><span id="A">① - ② - ③</span></h2>
        <p><small> Panier  --  Livraison  --  Paiement</small></p>

        <h3 style="text-decoration: underline;">Veuillez sélectionner votre mode de paiement :</h3>
        <p>*L'ensemble des champs est obligatoire</p><br>

        <!--Création du cadre pour saisir les informations de livraison-->
        <div class="Cartes row">

        <!--Formulaire à remplir par l'acheteur-->
        <form>
          <table>

            <!--Type de carte-->
            <!--Case du choix du type de carte-->
            <div>
                <input type="checkbox" required> <img src="MC.jpg" style="height: 30px; width: 40px">
                <input type="checkbox" required> <img src="AE.jpg" style="height: 30px; width: 40px">
                <input type="checkbox" required> <img src="CB.jpg" style="height: 30px; width: 40px">
            </div>

            <!--Champs du Nom et prénom-->
            <tr>
              <td><label>Nom et prénom du détenteur :</label></td>
              <td><input type="text" name="Nom" placeholder="Nom" required></td>
            </tr>

            <!--Champs du numéro de carte-->
            <tr>
              <td><label>Numéro de carte : </label></td>
              <td><input type="number" name="Number" placeholder="Number" required></td>
            </tr>

            <!--Champs de la date d'expiration'-->
            <tr>
              <td><label>Date d'expiration : </label></td>
              <td><input type="number" name="Number" placeholder="Number" required></td>
            </tr>

            <!--Champs du cryptogramme-->
            <tr>
              <td><label>Cryptogramme : </label></td>
              <td><input type="number" name="Number" placeholder="Number" required></td>
            </tr>


          </table>
        </form>

      </div>
    
    <!--Bouton de validation de l'adresse-->
      <br><br>
      <button class="btn"><a href="account.php">Valider mes coordonnées</a></button>

</body>

<?php
	include("include/footer.php");
 ?>