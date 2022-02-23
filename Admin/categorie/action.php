<?php
include "../config/config.php";

if (!isConnect()){
    header("location:" . URL_ADMIN . "login.php"); 
    die; 
}

if (!isAdmin()){
    header("location:" . URL_ADMIN . "index.php");
    die;
}
include "../config/bdd.php";

if(isset($_POST["btn_add_categorie"])){
    $libelle = htmlentities($_POST["libelle"]);

    $sql="INSERT INTO categorie VALUES(NULL, :libelle)";
    $requete= $bdd->prepare($sql);
    $categories = array(
        ":libelle"=>$libelle,
    );
    if(!$requete->execute($categories)){
        header("Looation:add.php");
        die;
    }else{
        header("Location:index.php");
        die;
    }
}

// UPDATE