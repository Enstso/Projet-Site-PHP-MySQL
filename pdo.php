<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
//Crée une instance PDO qui représente une connexion à la base
$dsn = 'mysql:dbname=site;host=localhost';
$user = 'root';
$password = 'siojjr';
try{
$connexion = new PDO($dsn, $user, $password);
//émet une exception PDOException si la tentative de connexion à la base de données échoue

} catch (PDOException $e) {
    echo 'Connexion échouée: ' . $e->getMessage();
}
?>