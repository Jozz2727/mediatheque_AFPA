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

 if(isset($_POST["btn_add_editeur"])){
     $denomination = htmlentities($_POST["denomination"]);
     $siret = htmlentities($_POST["siret"]);
     $adresse = htmlentities($_POST["adresse"]);
     $ville = htmlentities($_POST["ville"]);
     $code_postal = htmlentities($_POST["code_postal"]);
     $mail = htmlentities($_POST["mail"]);
     $numero_tel = htmlentities($_POST["numero_tel"]);

     $sql = "INSERT INTO editeur VALUES(NULL,:denomination,:siret,:adresse,:ville,:code_postal,:mail,
     :numero_tel)";
     $requete = $bdd->prepare($sql);
     $editeurs = array(
         ":denomination"=>$denomination,
         ":siret"=>$siret,
         ":adresse"=>$adresse,
         ":ville"=>$ville,
         ":code_postal"=>$code_postal,
         ":mail"=>$mail,
         ":numero_tel"=>$numero_tel
     );
         if(!$requete->execute($editeurs)){
            //  var_dump($requete->errorInfo());
            //  var_dump($requete->debugDumpParams());
             header("location:add.php?id=");
             die;
         }else{
             header("location:index.php");
             die;
         }
        }

        // Modifier

        if(isset($_POST['btn_modifier_editeur'])){
     $id=intval($_POST['id']);
     $denomination = htmlentities($_POST["denomination"]);
     $siret = htmlentities($_POST["siret"]);
     $adresse = htmlentities($_POST["adresse"]);
     $ville = htmlentities($_POST["ville"]);
     $code_postal = htmlentities($_POST["code_postal"]);
     $mail = htmlentities($_POST["mail"]);
     $numero_tel = htmlentities($_POST["numero_tel"]);

     $sql= "UPDATE editeur SET denomination=:denomination, siret=:siret, adresse=:adresse, ville=:ville,
     code_postal=:code_postal, mail=:mail, numero_tel=:numero_tel WHERE id=:id LIMIT 1 ";

     $requete= $bdd->prepare($sql);
     $editeurs= array(
         ":id"=>$id,
         ":denomination"=>$denomination,
         ":siret"=>$siret,
         ":adresse"=>$adresse,
         ":ville"=>$ville,
         "code_postal"=>$code_postal,
         ":mail"=>$mail,
         ":numero_tel"=>$numero_tel
     );

     if(!$requete->execute($editeurs)){
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
        $sql= "DELETE FROM editeur WHERE id=:id";
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





















