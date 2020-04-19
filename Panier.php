<?php
	$title = "Panier";
	include("include/init.php");

	if(!isset($_SESSION["cart"])){
		$_SESSION["cart"] = [];
	}

	// Delete article to panier
	if(isset($_GET["add"]) && !empty($_GET["add"])){
		// Req de l'objet complet à l'aide de la requete
		$id = $_GET["add"];
		$req = mysqli_query($bdd,
			"SELECT objets.*, utilisateurs.pseudo
			FROM objets, utilisateurs
			WHERE utilisateurs.id = objets.id_vendeur AND objets.id = '$id'"
		);

		 $object = mysqli_fetch_array($req);
		 $_SESSION["cart"][$object["id"]] = $object;
		 header("Location: panier.php");
		 die();
	}

	// Add article to panier
	if(isset($_GET["delete"]) && !empty($_GET["delete"])){
		unset($_SESSION["cart"][$_GET["delete"]]);
		header("Location: panier.php");
		die();
	}

	$total = 0;
	foreach ($_SESSION["cart"] as $key => $data){
		$total += $data["prix"];
	}

	include("include/header.php");
?>


      <div style="text-align: center;">
        <h2><span id="A">①</span> - ② - ③</h2>
        <p><small> Panier  --  Livraison  --  Paiement</small></p>


        <div class="row">


        <div class="Articles col-sm-7">
          <h2 class="active"><strong>Mon panier</strong></h2>
          <div class="row well">
						<table class="table">
		            <thead>
		                <tr>
		                    <th>Photo</th>
		                    <th>Nom</th>
		                    <th>Description</th>
		                    <th>Prix</th>
		                    <th>Vendeur</th>
		                    <th>Action</th>
		                </tr>
		            </thead>
		            <tbody>
									<?php foreach ($_SESSION["cart"] as $key => $data): ?>
		                <tr>
		                  <td>IMG</td><!-- TD = changement dee colonne-->
		                  <td><?= $data["nom"] ?></td>
		                  <td><?= $data["description"] ?></td>
		                  <td><?= $data["prix"] ?></td>
		                  <td><?= $data["date"] ?></td>
		                  <td><a href="account.php?id=<?= $data["id_vendeur"] ?>"><?= $data["pseudo"] ?></a></td>
		                  <td><a href="panier.php?delete=<?= $data["id"] ?>">Supprimer</a></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
          </div>
        </div>

        <div class="Total col-sm-4">

          <h2><strong>Total de la commande</strong></h2>

          <div class="row well">

            <h4>Nombre d'articles : <?= count($_SESSION["cart"]) ?></h4><br>
            <h4> Prix total : <?= $total ?> €</h4><br>

            <!--Bouton de validation du panier-->
            <button class="btn"><a href="Paiement_HTML.html">Valider mon panier</a></button>
          </div>

        </div>

        </div>

      </div>

<?php
	include("include/footer.php");
 ?>
