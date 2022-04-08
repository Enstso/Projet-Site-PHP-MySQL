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
    <form name="formsup" class="formulaire">
<?php
include "pdo.php";
if(isset($_GET['sup']))
{
    $sup=$_GET['sup'];
    $req="DELETE from Produit where num_article='$sup' ";
    $stmt  = $connexion->prepare($req);
  $stmt->execute();
  $resultat = $stmt ->fetchAll(PDO::FETCH_ASSOC);
}

if($resultat)
{
    echo"La suppression a échouée";
}
else{
    
    echo "La suppression a été correctement effectuée";
}
    ?>
    </form>
</body>
</html>
   
<!--
	co-producteurs:
	Zunaid : mzunaid2003@gmail.com
	Samie : samie17030@gmail.com
	Léo : tranleo95820@gmail.com
 -->
