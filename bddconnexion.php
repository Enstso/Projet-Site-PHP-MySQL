<?php 
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', 'siojjr');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
