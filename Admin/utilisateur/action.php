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

if(isset($_POST["btn_add_utilisateur"])){
    $nom= htmlentities($_POST["nom"]);
    $prenom= htmlentities($_POST["prenom"]);
    $pseudo= htmlentities($_POST["pseudo"]);
    $mail= htmlentities($_POST["mail"]);
    $mot_de_passe= password_hash($_POST["mot_de_passe"],PASSWORD_DEFAULT);
    $num_telephone= htmlentities($_POST["num_telephone"]);
    $avatar= htmlentities($_FILES["avatar"]["name"]);
    $adresse= htmlentities($_POST["adresse"]);
    $ville= htmlentities($_POST["ville"]);
    $code_postal= htmlentities($_POST["code_postal"]);
    $dossier_temporaire= $_FILES["avatar"]["tmp_name"];
    $dossier_destination=  PATH_ADMIN . "image/avatars" . $avatar;
    if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){
        die('erreur dans le deplacement du fichier');
     }

    $sql= "INSERT INTO utilisateur VALUES(NULL, :nom, :prenom, :pseudo, :mail, :mot_de_passe, :num_telephone, 
    :avatar, :adresse, :ville, :code_postal)";

    $requete= $bdd->prepare($sql);
    $utilisateurs= array(
        ":nom"=>$nom,
        ":prenom"=>$prenom,
        ":pseudo"=>$pseudo,
        ":mail"=>$mail,
        ":mot_de_passe"=>$mot_de_passe,
        ":num_telephone"=>$num_telephone,
        ":avatar"=>$avatar,
        ":adresse"=>$adresse,
        ":ville"=>$ville,
        ":code_postal"=>$code_postal
    );

    if(!$requete->execute($utilisateurs)){
        header("location:add.php");
        die;
    }else{
        header("location:index.php");
        die;
    }

}

if(isset($_GET["id"])){
    $id=intval($_GET["id"]);
    if($id <= 0){
        header("location:index.php");

    } 
}

// Modifier

if(isset($_POST["btn_modifier_utilisateur"])){
    $nom= htmlentities($_POST["nom"]);
    $prenom= htmlentities($_POST["prenom"]);
    $pseudo= htmlentities($_POST["pseudo"]);
    $mail= htmlentities($_POST["mail"]);
    $mot_de_passe= password_hash($_POST["mot_de_passe"],PASSWORD_DEFAULT);
    $num_telephone= htmlentities($_POST["num_telephone"]);
    $avatar= htmlentities($_FILE["avatar"]["name"]);
    $adresse= htmlentities($_POST["adresse"]);
    $ville= htmlentities($_POST["ville"]);
    $code_postal= htmlentities($_POST["code_postal"]);
    $dossier_temporaire= $_FILE["avatar"]["tmp_name"];
    $dossier_destination=  PATH_ADMIN . "image/avatars" . $avatar;

    $sql= "UPDATE utilisateur SET name=:name, prenom=:prenom, pseudo=:pseudo, mail=:mail, 
    mot_de_passe=:mot_de_passe, num_telephone=:num_telephone, avatar=:avatar, adresse=:adresse, ville=:ville,
    code_postal=:code_postal WHERE id=:id LIMIT 1";

    $requete= $bdd->prepare($sql);
    $data= array(
        ":id"=>$id,
        ":nom"=>$nom,
        ":prenom"=>$prenom,
        ":pseudo"=>$pseudo,
        ":mail"=>$mail,
        ":mot_de_passe"=>$mot_de_passe,
        ":num_telephone"=>$num_telephone,
        ":avatar"=>$avatar,
        ":adresse"=>$adresse,
        ":ville"=>$ville,
        ":code_postal"=>$code_postal
    );

    if(!$requete->execute($data)){
        header("location:update.php");
        die;
    }else{
        header("location:index.php");
        die;
    }

}

// Gérer les avatars

$sql= "SELECT avatar FROM utilisateur WHERE id=?";
$requete= $bdd->prepare($sql);
$requete->execute([$id]);
$hold_avatar = $requete->fecth(PDO::FETCH_ASSOC);
$hold_avatar= $hold_avatar["avatar"];

$dossier_avatar = PATH_ADMIN . 'imgage/avatars/' . $hold_avatar;

if(!isFile($dossier_avatar)){
    header("location:index.php");
    die;
}

if(!unlink($dossier_avatar)){
    header("location:index.php");
    die;
}

$sql= "DELETE FROM utilisateur WHERE id=? ";
$requete= $bdd->prepare($sql);
$requete->execute([$id]);
$hold_avatar= $requete->fetch(PDO::FETCH_ASSOC);
$hold_avatar= $hold_avatar["avatar"];
$dossier_avatar= PATH_ADMIN . "image/avatars" .$hold_avatar;
if(!isFile($dossier_avatar)){
    header("location: index.php");
    die;
}
if(!unlink($dossier_avatar)){
    header('location:index.php');
    die;
}

// Delete
$sql= "DELETE FROM utilistauer WHERE id= ?":
$requete = $bdd->prepare($sql);
if(!$requete->execute([$id])){
    header("location:index.php");
    die;
}
?>