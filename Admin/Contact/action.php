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
include '../config/bdd.php';


if(isset($_POST['btn_add_contact'])){
    $nom = htmlentities($_POST['nom']);
    $mail = htmlentities($_POST['mail']);
    $objet = htmlentities($_POST['objet']);
    $mess=htmlentities($_POST['mess']);

    $sql = "INSERT INTO contact VALUES(NULL,:nom,:mail,:objet,:mess, NOW())";
    $requete = $bdd->prepare($sql);
    $contacts = array(
        ':nom' =>$nom,
        ':mail' =>$mail,
        ':objet' =>$objet,
        ':mess' =>$mess
    );

    if(!$requete->execute($contacts)){
        header("location: add.php");
        die;
    }else{
        header("location:index.php");
        die;
    }
}

// Update

if(isset($_POST["btn_modifier_contact"])){
    $id=intval($_POST["id"]);
    $nom = htmlentities($_POST['nom']);
    $mail = htmlentities($_POST['mail']);
    $objet = htmlentities($_POST['objet']);
    $message=htmlentities($_POST['message']);
    $date=htmlentities($_POST["date"]);

    $sql= "UPDATE contact SET nom=:nom, mail=:mail, objet=:objet, message=:message, date=:date
     WHERE id=:id LIMIT 1";
    $requete= $bdd->prepare($sql);
    $contacts= array(
        ":id"=>$id,
        ":nom"=>$nom,
        ":mail"=>$mail,
        ":objet"=>$objet,
        ":message"=>$message,
        ":date"=>$date
    );

    if(!$requete->execute($contacts)){
        header("location:update.php?id=");
        die;
    }else{
        header("location: index.php");
        die;
    }

}

// DELETE

if(isset($_GET["id"])){
    $id=intval($_GET["id"]);
    if($id > 0){
        $sql= "DELETE FROM contact WHERE id=:id";
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



    // // Logique des formulaires + requete en bdd
    
    // // on utilise le fichier bdd.php pour avoir accés a PDO
    // include 'bdd.php';
    // // ACTION POUR LE FORMULAIRE D'AJOUT
    // if (isset($_POST['btn_add_contact'])){
    //     // alors je viens du form add.php
    //     // var_dump($_POST);
    //     // *** PROTECTION DES DONNEES ENVOYEES PAR L'UTILISATEUR ***
    //     $nom = htmlentities($_POST['nom']);
    //     $mail = htmlentities($_POST['mail']);
    //     $objet = htmlentities($_POST['objet']);
    //     $message = htmlentities($_POST['message']);

    //     // *** TRAITEMENT DE DONNEES + GESTION DES ERREURS ***
    //       // ....

    //     // *** AJOUT EN BDD *** 
    //     // 1) CREATION REQUETE
    //     $sql = "INSERT INTO contact VALUES (NULL, :nom, :mail, :objet, :mess, NOW())";
    //     // var_dump($sql);
    //     // 2) ENVOIE LA REQUETE A LA BDD
    //     // utilisation du query = seulement si pas de données utilisateur
    //     // $requete = $bdd->query($sql);
    //     // utilisation du prepare = si données utilisateur
    //     $requete = $bdd->prepare($sql);
    //     $data = array(
    //         ':nom' => $nom, 
    //         ':mail' => $mail, 
    //         ':objet' => $objet, 
    //         ':mess' => $message
    //     );
        
    //     // 3) RECUPERE LES INFOS / VERIFIE QUE l'ACTION EST BIEN EFFECTUER
    //     if (!$requete->execute($data)){
    //         // erreur
    //         header('location:add.php');
    //         die;
    //     }else{
    //         // c'est ok
    //         header('location:index.php');
    //         die;
    //     }
    // }
