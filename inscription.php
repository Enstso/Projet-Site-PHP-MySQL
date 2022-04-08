<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="login.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>
        <div class="login-form">
            <?php 
                if(isset($_GET['err_inscription']))
                {
                    $err = ($_GET['err_inscription']);

                    switch($err)
                    {
                        case 'succes':
                        ?>
                            <div class="alert alert-success">
                                <strong>SUCCES:</strong> Inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'motdepasse':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Mot de passe différent.
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Email non valide.
                            </div>
                        <?php
                        break;

                        case 'email_taille':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Email trop long.
                            </div>
                        <?php 
                        break;

                        case 'identifiant_taille':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Identifiant trop long.
                            </div>
                        <?php 
                        case 'existant':
                        ?>
                            <div class="alert alert-danger">
                                <strong>ERREUR:</strong> Le compte existe déjà.
                            </div>
                        <?php 

                    }
                }
            ?>
            
            <form action="inscription.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="identifiant" class="form-control" placeholder="Identifiant" required="required">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="mdp_verification" class="form-control" placeholder="Re-tapez le mot de passe" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
            <?php 
                        require_once 'bddconnexion.php'; // On inclu la connexion à la bdd

                        // Si les variables existent et qu'elles ne sont pas vides soit !empty ou isset
                        if(!empty($_POST['identifiant']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp_verification']))
                        {

                            $identifiant = $_POST['identifiant'];
                            $email = $_POST['email'];
                            $motdepasse = $_POST['mdp'];
                            $motdepasse_verif = $_POST['mdp_verification'];

                            // On vérifie si l'utilisateur existe
                            $check = $bdd->prepare('SELECT identifiant, email, mot_de_passe FROM utilisateur WHERE email = "'.$email.'"');
                            $check->execute(array($email)); // met dans un tableau
                            $data = $check->fetch(); // récupérèe ligne par ligne les informations
                            $row = $check->rowCount(); // retourne le nombre de ligne qui existe et regarde si les informations existe dans la table

                            
                            // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
                            if($row == 0)
                            { 
                                if(strlen($identifiant) <= 100)
                                { // On verifie que la longueur du pseudo <= 100
                                    if(strlen($email) <= 100)
                                    { // On verifie que la longueur du mail <= 100
                                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                        { // Si l'email est de la bonne forme
                                            if($motdepasse === $motdepasse_verif)
                                            { // si les deux mdp saisis sont bon

                                                // On insère dans la base de données
                                                $insert = $bdd->prepare('INSERT INTO utilisateur(identifiant, email, mot_de_passe) VALUES(:identifiant, :email, :mot_de_passe)');
                                                $insert->execute(array(
                                                    'identifiant' => $identifiant,
                                                    'email' => $email,
                                                    'mot_de_passe' => $motdepasse,
                                                ));
                                                // On redirige avec le message de succès
                                                header('Location:inscription.php?err_inscription=succes');
                                                die();
                                            }else{ header('Location: inscription.php?err_inscription=motdepasse'); die();}
                                        }else{ header('Location: inscription.php?err_inscription=email'); die();}
                                    }else{ header('Location: inscription.php?err_inscription=email_taille'); die();}
                                }else{ header('Location: inscription.php?err_inscription=identifiant_taille'); die();}
                            }else{ header('Location: inscription.php?err_inscription=existant'); die();}
                        }
            ?>

        </div>
        </body>
</html>
