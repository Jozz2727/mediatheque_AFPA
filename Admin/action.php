<?php
 include "config/config.php";
 include "config/bdd.php";

 if(isset($_POST["btn_connect"])){
     $mail= htmlentities($_POST["mail"]);
     $mot_de_passe= htmlentities($_POST["mot_de_passe"]);

     $sql= " SELECT * FROM utilisateur WHERE mail=?";
     $requete= $bdd->prepare($sql);
     $requete->execute([$mail]);
     $utilisateur= $requete->fetch(PDO::FETCH_ASSOC);
     
     if(!$utilisateur){
         $_SESSION["connect"]= false;
          header("location:login.php");
          die;
     }
// var_dump(password_verify($mot_de_passe, $utilisateur["mot_de_passe"]));
// var_dump(password_hash("azerty", PASSWORD_DEFAULT));
//   die; (dans le cas ou il y a un pb avec le hash du mot de passe).

     if(!password_verify($mot_de_passe, $utilisateur["mot_de_passe"])){
         $_SESSION["connect"]=false;
         header("location:login.php");
         die;
     }

     unset($utilisateur["mot_de_passe"]);
     $_SESSION["utilisateur"]=$utilisateur;
     $_SESSION["date_connect"]=new DateTime();
    //  $_SESSION["utilisateur"]["roles"] = checkRoles($utilisateur["id"], $bdd);
     checkRoles($utilisateur["id"], $bdd);
     $_SESSION["connect"]=true;
     header("location:index.php");
     die;
    

 }

if(isset($_GET["connect"])&& $_GET["connect"]=="false"){
    $_SESSION=[];
    header("location:http://localhost/mediatheque/index.php");
    die;
}