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

if(isset($_POST["btn_add_usager"])){
    $nom= htmlentities($_POST["nom"]);
    $prenom= htmlentities($_POST["prenom"]);
    $adresse= htmlentities($_POST["adresse"]);
    $ville= htmlentities($_POST["ville"]);
    $code_postal= htmlentities($_POST["code_postal"]);
    $mail= htmlentities($_POST["mail"]);

    $sql= " INSERT INTO usager VALUES(NULL, :nom,:prenom,:adresse,:ville,:code_postal,:mail)";
    $requete= $bdd->prepare($sql);
    $usagers = array(
        ":nom"=>$nom,
        ":prenom"=>$prenom,
        ":adresse"=>$adresse,
        ":ville"=>$ville,
        ":code_postal"=>$code_postal,
        ":mail"=>$mail
    );

    if(!$requete->execute($usagers)){
        header("Location:add.php");
        die;
    }else{
        header("Location:index.php");
        die;
    }
}

// UPDATE

if(isset($_POST["btn_modifier_usager"])){
    $id=intval($_POST["id"]);
    $nom= htmlentities($_POST["nom"]);
    $prenom= htmlentities($_POST["prenom"]);
    $adresse= htmlentities($_POST["adresse"]);
    $ville= htmlentities($_POST["ville"]);
    $code_postal= htmlentities($_POST["code_postal"]);
    $mail= htmlentities($_POST["mail"]);

    $sql= "UPDATE usager SET nom=:nom, prenom=:prenom, adresse=:adresse, ville=:ville,
     code_postal=:code_postal, mail=:mail WHERE id=:id LIMIT 1";
     $requete= $bdd->prepare($sql);
     $usagers= array(
         ":id"=>$id,
         ":nom"=>$nom,
         ":prenom"=>$prenom,
         ":adresse"=>$adresse,
         ":ville"=>$ville,
         ":code_postal"=>$code_postal,
         ":mail"=>$mail
     );
     
     if(!$requete->execute($usagers)){
      
         header("location:update.php?id=");
         die;
     }else{
         header("location:index.php");
         die;
     }
}

// DELETE

if(isset($_GET["id"])){
    $id=intval($_GET["id"]);
    if($id > 0){
        $sql= "DELETE FROM usager WHERE id=:id";
        $requete= $bdd->prepare($sql);

        if(!$requete->execute(array(":id"=>$id))){
            header("location:index.php");
            die;
        }else{
            header("location:index.php");
            die;
        }
    }
}

