<?php
    $dsn = 'mysql:dbname=mediatheque_2;host=localhost';
    $utilisateur = 'root';
    $mdp = '';

    try {
        $bdd = new PDO($dsn, $utilisateur, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }catch (PDOException $e){
        die('Erreur avec la base de données.');
    }


