<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="login.css">
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form">
             <?php 
                if(isset($_GET['err_connexion']))
                {
                    $err = $_GET['err_connexion'];

                    switch($err)
                    {// pour les alert notifications https://www.w3schools.com/bootstrap4/bootstrap_alerts.asp | https://www.bootstrapcdn.com/ css
                        case 'motdepasse':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Mot de passe incorrect.
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Email incorrect.
                            </div>
                        <?php
                        break;

                        case 'inexistant':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Pas de compte existant sur ce mail.
                            </div>
                        <?php
                        break;
                    }
                }
            ?> 
            
            <form action="index.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"><a href="inscription.php">Vous n'avez pas de compte ? Inscrivez-vous ici</a></p>
        </div>
        <?php 
            if(isset($_POST['email']) && isset($_POST['mdp']))
            {

                session_start(); // Démarrage de la session
                require_once 'bddconnexion.php'; // On inclut la connexion à la base de données

                if(!empty($_POST['email']) && !empty($_POST['mdp'])) // Si il existe les champs email, password et qu'il sont pas vident
                {
                    $email = $_POST['email']; 
                    $motdepasse = $_POST['mdp'];

                    
                    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
                    $check = $bdd->prepare('SELECT identifiant, email, mot_de_passe, id, Status FROM utilisateur WHERE email = "'.$email.'"');
                    $check->execute(array($email)); // met dans un tableau
                    $data = $check->fetch(); // récupérèe ligne par ligne les informations
                    $row = $check->rowCount(); // retourne le nombre de ligne qui existe et regarde si les informations existe dans la table
                    
                    

                    // Si > à 0 alors l'utilisateur existe
                    if($row > 0)
                    {
                        // Si le mail est bon niveau format
                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            // Si le mot de passe est le bon, le password_verify ne  marche que si on hash le mdp
                            if($data['mot_de_passe'] === $motdepasse)
                            {
                              
                                $_SESSION['user'] = $data['identifiant'];
                                if($data['Status'] === 'admin')
                                {
                                    header('Location: indexad.php');
                                }else { header('Location: indexbase.php'); die(); }
                            }else{ header('Location: index.php?err_connexion=motdepasse'); die(); }
                        }else{ header('Location: index.php?err_connexion=email'); die(); }
                    }else{ header('Location: index.php?err_connexion=inexistant'); die(); }
                }else{ header('Location: index.php'); die();} // si le formulaire est envoyé sans aucune données
            }
        ?>
        
        </body>

</html>
<!--
	co-producteurs:
	Zunaid : mzunaid2003@gmail.com
	Samie : samie17030@gmail.com
	Léo : tranleo95820@gmail.com
 -->
