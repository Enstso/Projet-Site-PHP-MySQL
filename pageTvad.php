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
  
  
  
                  
      
        <a href='indexad.php'><img src='Images/Amazon-Symbole.png' alt='logo' class='logo'></a>"

        
        
        
                
    
              
          
        
        
            
                  
                    
     
  <div class="onglets">
    
      <p><a href="pageaspirateurad.php">Aspirateur</a></p>
      <p><a href="pagerefrigerateurad.php">Réfrigérateur</a></p>
      <p><a href="pageTvad.php">Télévision</a></p>
       <p>Bonjour ! <?php echo $_SESSION['user']; ?></p>
    <p><a href="pagepanierad.php"title="Panier"><i class="fas fa-shopping-cart" ></i></a></p>
    <p class="croix"><a href="deconnexion.php" title="Déconnexion">X</a></p>
  </div>
</nav>
  <!-- Fin de la barre de navigation -->
  
  <!-- Header -->
   <header>
       <!-- Section principale -->

     <h1 class="Titre-main">Télévision</h1>
     <?php 
include "pdo.php";

$req="SELECT * FROM Produit where num_catalog = 3";	//On crée une variable $requete (le nom importe peu) contenant une requête sql
	$stmt  = $connexion->prepare($req);
  $stmt->execute();
  $resultat = $stmt ->fetchAll(PDO::FETCH_ASSOC);
	
 // echo"<pre>";
  //print_r($resultat);
?>
  
 <?php foreach($resultat as $ligne) :?>
  <section class="main">
    
    <!-- Toutes les cartes -->
    
    <div class="cards">
      
      <div class="card">
      <?php
	echo  '<img src="images/'.$ligne['image'].'"/>'  ;
      ?>
      
        <div class="Titre-card">
       <h4><?=$ligne['nom_article']?></h4>
       <h4><?=(float)$ligne['prix_article']."€"?></h4>
        </div>
        <div class="petite-description">
        <p><?=$ligne['description']?></p> 
        </div>
      </div>
      <a href="pagesuppressionv1.php?sup=<?php echo $ligne['num_article']; ?>"><button class="button">Supprimer un produit</button> </a>
      <form action="pagepanierad.php"method="POST"> 
      <button class="button">Ajouter au panier</button> </a>
      </form> 
     </div>
    <!-- Fin de toutes les cartes -->
    
    
  </section>
  <?php endforeach; ?>

  <!-- Fin de la section principale -->


</header>
<!-- Fin du header -->
  

  <!-- Pied de page -->
  <footer class="fin">
    <p>&copy; Contact du site</p>
    <div class="social-media">
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
      <p><i class="fab fa-instagram"></i></p>
    </div>
  </footer>
  <!-- Fin du pied de page -->
</body>
</html>

<!--
	co-producteurs:
	Zunaid : mzunaid2003@gmail.com
	Samie : samie17030@gmail.com
	Léo : tranleo95820@gmail.com
 -->
