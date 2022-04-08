<!DOCTYPE html>
<html>
<head>
<title>Document sans titre</title>
<meta charset="utf-8" />
</head>

<body>

<p>Le Produit suivant a été ajoutée au catalogue:</p>
<?php 
include "pdo.php";
/* À COMPLETER */ 
    $Nom_article = $_POST['nom_article'];
	$Num_cataloge = $_POST['num_catalog'];
	$description = $_POST['description'];
	$Prix = $_POST['prix_article'];
	$Image = $_POST['image'];
	

$req="INSERT INTO Produit (nom_article,num_catalog,description,prix_article,image)
VALUES('$Nom_article','$Num_cataloge','$description','$Prix','$Image')"; // requête affichant la liste des  types de pièces
  $stmt  = $connexion->prepare($req);
  $stmt->execute();
  $resultat = $stmt ->fetchAll(PDO::FETCH_ASSOC);

//doit insérer les données dans la bases et afficher les caractéristiques saisies

echo"<ul>";
	echo"<li>Nom de l'article: $Nom_article</li>";
	echo"<li>Numéro du catalogue: $Num_cataloge</li>";
	echo"<li>Description du produit: $description</li>";
	echo"<li>Prix du produit: $Prix</li>";
	echo"<li>Image du produit: $Image</li>";
	echo"</ul>";

?>
<a href="indexad.php">Revenir sur la page d'acceuil</a>
</body>
</html>
<!--
	co-producteurs:
	Zunaid : mzunaid2003@gmail.com
	Samie : samie17030@gmail.com
	Léo : tranleo95820@gmail.com
 -->
