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

 if(isset($_POST["btn_add_auteur"])){
     $nom = htmlentities($_POST["nom"]);
     $prenom = htmlentities($_POST["prenom"]);
     $nom_de_plume = htmlentities($_POST["nom_de_plume"]);
     $adresse = htmlentities($_POST["adresse"]);
     $ville = htmlentities($_POST["ville"]);
     $code_postal = htmlentities($_POST["code_postal"]);
     $mail = htmlentities($_POST["mail"]);
     $numero = htmlentities($_POST["numero"]);
     $photo = htmlentities($_FILES["photo"]["name"]);

     $sql = "INSERT INTO auteur VALUES(NULL,:nom,:prenom,:nom_de_plume,:adresse,:ville,:code_postal,:mail,
     :numero,:photo)";
     $requete = $bdd->prepare($sql);
     $auteurs = array(
         ":nom"=>$nom,
         ":prenom"=>$prenom,
         ":nom_de_plume"=>$nom_de_plume,
         "adresse"=>$adresse,
         ":ville"=>$ville,
         ":code_postal"=>$code_postal,
         ":mail"=>$mail,
         ":numero"=>$numero,
         ":photo"=>$photo
     );
         if(!$requete->execute($auteurs)){
            //  var_dump($requete->errorInfo());
            //  var_dump($requete->debugDumpParams());
             header("location:add.php");
             die;
         }else{
             header("location:index.php");
             die;
         }
        }


        // Modifier un auteur

        if(isset($_POST["btn_modifier_auteur"])){
            $id= intval($_POST["id"]);
            $nom = htmlentities($_POST["nom"]);
            $prenom = htmlentities($_POST["prenom"]);
            $nom_de_plume = htmlentities($_POST["nom_de_plume"]);
            $adresse = htmlentities($_POST["adresse"]);
            $ville = htmlentities($_POST["ville"]);
            $code_postal = htmlentities($_POST["code_postal"]);
            $mail = htmlentities($_POST["mail"]);
            $numero = htmlentities($_POST["numero"]);
            $photo = htmlentities($_FILES["photo"]["name"]);

            $sql= "UPDATE auteur SET nom=:nom, prenom=:prenom, nom_de_plume=:nom_de_plume, adresse=:adresse,
            ville=:ville, code_postal=:code_postal, mail=:mail, numero=:numero, photo=:photo WHERE id=:id LIMIT 1";
            $requete =$bdd->prepare($sql);
            $auteurs = array(
                ":id"=>$id,
                ":nom"=>$nom,
                ":prenom"=>$prenom,
                ":nom_de_plume"=>$nom_de_plume,
                ":adresse"=>$adresse,
                ":ville"=>$ville,
                ":code_postal"=>$code_postal,
                ":mail"=>$mail,
                ":numero"=>$numero,
                ":photo"=>$photo
            );
            
            if(!$requete->execute($auteurs)){
                header("Location:update.php?id=");
                die;
            }else{
                header("Location:index.php");
                die;
            }
        }

        // DELETE

if(isset($_GET["id"])){
    $id=intval($_GET["id"]);
    if($id > 0){
        $sql= "DELETE FROM auteur WHERE id=:id";
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



