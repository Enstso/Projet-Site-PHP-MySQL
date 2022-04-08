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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" type="text/css" />
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
  <!-- Fin de la barre de navigation -->
  
  <!-- Header -->
  <header>
    <div class="Position">
    <a href="pagepourajouter.php?id "> <button class="button">Ajouter un produit</button> </a>

     <a href="pageaspirateurad.php"><button class="button">Nos derniers articles</button> </a>
    </div>
  
  <!-- Section principale -->
  <section class="main">
    
    <!-- Toutes les cartes -->
    <h1>Nous allons créer 3 000 CDI en France en 2022</h1>
    <div class="cards">
      
      
        
        <img src="https://images-eu.ssl-images-amazon.com/images/G/08/EUBluefield/Build_Trust/Ratatouille_Focus/Workplace/Top_employer/Marwen_758x608._SY608_CB646570389_.jpg">
        
      </div>

      <a href="https://www.amazon.fr/gp/redirect.html?location=https://www.aboutamazon.fr/travailler-chez-amazon/amazon-annonce-la-creation-de-trois-mille-emplois-en-cdi-en-france&token=C6C55D3C5A4AFBFA641848DB8209A84097B11E3F&source=standards&pf_rd_r=W8VB8PJHYMHP9QGF2YAS&pf_rd_p=25440e22-3746-4bee-8d7b-7de449f67854&pd_rd_r=3eb381e6-ecdf-4bb8-ab25-720ab1f62324&pd_rd_w=gr33g&pd_rd_wg=QXew4&ref_=pd_gw_unk">En savoir plus</a> 
      <div class="indé">
      <h1>Nous soutenons les auteurs indépendants</h1>
      <div class="card">
        <img src="https://images-eu.ssl-images-amazon.com/images/G/08/EUBluefield/Build_Trust/Ratatouille_Focus/PlumesFranco/758x608_._SY608_CB645972955_.jpg">
      </div>
      <a href="https://www.amazon.fr/b?node=14734726031&pf_rd_r=W8VB8PJHYMHP9QGF2YAS&pf_rd_p=271568a6-3c32-4ce7-bc30-883d6ffe1dbd&pd_rd_r=3eb381e6-ecdf-4bb8-ab25-720ab1f62324&pd_rd_w=RXgU2&pd_rd_wg=QXew4&ref_=pd_gw_unk">En savoir plus</a>
</div>
</div>
    <!-- Fin de toutes les cartes -->
    
    
  </section>
<!--Avant pied de page en Bleu(Seulement index)-->
<h1 class="Titre">Pour mieux nous connaittre</h1>
</header>
<footer class="Avant-footer">

  
<div class="bas-onglets">
  <p><a href="https://www.amazon.fr/gp/redirect.html?location=https%3A%2F%2Famazon.fr%2Fp%2Ffeature%2Fk6wxgxw88w7z78q%3Fref_%3Dfooter_cs_nav_bn_ab&source=nav_linktree&token=46F384329066BC949A5AC1169AE8B6C51D5ADE86">À propos d'Amazon</a></p>
    <p><a href="https://www.amazon.fr/gp/browse.html?node=202589011&ref_=footer_gw_m_b_careers">Carrières</a></p>
    <p><a href="https://durabilite.aboutamazon.fr/?utm_source=gateway&utm_medium=footer&ref_=susty_footer">Durabilité</a></p>
    <p><a href="https://www.amazon.science/">Amazon Science</a></p>
  
</div>
</footer>
<!--Fin pied de page en Bleu (Seulement index)-->
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
