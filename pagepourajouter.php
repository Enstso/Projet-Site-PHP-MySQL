<?php 
    session_start();
    require_once 'bddconnexion.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="site.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
</head>
<body>

  <!-- Barre de navigation -->
  <nav>
  <a href='indexad.php'><img src='Images/Amazon-Symbole.png' alt='logo' class='logo'></a>"  <div class="onglets">
    <p><a href="pageaspirateurad.php">Aspirateur</a></p>
      <p><a href="pagerefrigerateurad.php">Réfrigérateur</a></p>
      <p><a href="pageTvad.php">Télévision</a></p>
       <p>Bonjour ! <?php echo $_SESSION['user']; ?></p>
    <p><a href="pagepanierad.php"title="Panier"><i class="fas fa-shopping-cart" ></i></a></p>
    <p class="croix"><a href="deconnexion.php" title="Déconnexion">X</a></p>
  </div>
</nav>
<header>
       <!-- Section principale -->

     <h1 class="Titre-main">Ajouter un produit</h1>
<section class="main">

<form action='pagepourajouter.php' method='post'>

<p><table>

<?php
include "pdo.php";

	


/*À COMPLETER */ //Doit afficher le codeType pièce saisi dans le formulaire précédent 



?>
<tr>
<td align='center'> Nom de l'article: </td>
<td><input type='text' name='nom_article' size='20' maxlength='255'>
</td>
</tr>
<tr><td align='center'> Numéro du catalogogue: </td>
<td><input type='text' name='num_catalog' size='20' maxlength='255'>
</td>
</tr>

<tr><td align='center'> Description: </td>
<td><input type='text' name='description' size='70' maxlength='500'>
</td>
</tr>

<tr><td align='center'> Prix du produit: </td>
<td><input type='text' name='prix_article' size='70' maxlength='255'>
</td>
</tr>
<tr><td align='center'> Image du produit: </td>
<td><input type="file" name='image' size='100' maxlength='255'>
</td>
</tr>
</table>
<input type='submit' value='Enregistrez le nouveau produit'>
</form>

<?php 
include "pdo.php";
/* À COMPLETER */ 
   
	
if (isset($_POST['nom_article'],$_POST['num_catalog'],$_POST['description'],$_POST['prix_article'],$_POST['image']))
{
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
}
?>
<a href="indexad.php">Revenir sur la page d'acceuil</a>
</section>
</header>
</body>
</html>

<!--
	co-producteurs:
	Zunaid : mzunaid2003@gmail.com
	Samie : samie17030@gmail.com
	Léo : tranleo95820@gmail.com
 -->
