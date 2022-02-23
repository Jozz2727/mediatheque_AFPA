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


//Ajouter un livre//
if(isset($_POST["btn_add_livre"])){

    $num_ISBN = htmlentities($_POST["num_ISBN"]);
    $titre = htmlentities($_POST["titre"]);
    $illustration = htmlentities($_FILES["illustration"]["name"]);
    $synopsis=htmlentities($_POST["synopsis"]);
    $prix = intval($_POST["prix"]);
    $nb_pages = intval($_POST["nb_pages"]);
    $date_achat = htmlentities($_POST["date_achat"]);
    $disponibilite = 0;

    $sql= "INSERT INTO livres VALUES(NULL,:num_ISBN, :titre, :illustration, :synopsis, :prix, :nb_pages, :date_achat,
     :disponibilite)";
    $requete = $bdd->prepare($sql);
    $data = array(
        ":num_ISBN" => $num_ISBN,
        ":titre" => $titre,
        ":illustration" => $illustration,
        ":synopsis" => $synopsis,
        ":prix" => $prix,
        ":nb_pages" => $nb_pages,
        ":date_achat" => $date_achat,
        ":disponibilite" =>$disponibilite
    );

    if(!$requete->execute($data)){
        header("location:add.php");
        die;
    }else{
        header("location:index.php");
        die;
    }


// Modifier un livre 
if(isset($_POST["btn_modifier_livre"])){
    $id=intval($_POST["id"]);
    if($id <= 0){
        header("location: index.php");
        die;
    }
    $num_ISBN = htmlentities($_POST["num_ISBN"]);
    $titre = htmlentities($_POST["titre"]);
    $illustration = htmlentities($_FILES["illustration"]["name"]);
    $synopsis=htmlentities($_POST["synopsis"]);
    $prix = doubleval($_POST["prix"]);
    $nb_pages = htmlentities($_POST["nb_pages"]);
    $date_achat = date_create($_POST["date_achat"]);
    $date_achat = $date_achat->format('Y-m-d');
    $categories=$_POST["categorie"];
    $disponibilite = 0;

    // $sql= 'UPDATE livres SET  num_ISBN= :num_ISBN, titre =:titre, illustration =:illustration, synopsis =:synopsis,
    // prix =:prix, nb_pages =:nb_pages, date_achat =:date_achat, disponibilite=:disponibilite WHERE id=:id LIMIT 1';
    // $requete = $bdd->prepare($sql);
    // $livres = array(
    //   ":id"=>$id,
    //   ":num_ISBN"=>$num_ISBN,
    //   ":titre"=>$titre,
    //   ":illustration"=>$illustration,
    //   ":synopsis"=>$synopsis,
    //   ":prix"=>$prix,
    //   ":nb_pages"=>$nb_pages,
    //   ":date_achat"=>$date_achat,
    //   ":disponibilite"=>$disponibilite
    // );
    
    // if(!$requete->execute($livres)){
    //     header("location:update.php?id=");
    //     die;
    // }else{
    //     header("location:index.php");
    //     die;

    if(!empty($_FILES["illustration"]["name"])){
        $illustration= $_FILES["illustration"]["name"];
        $sql= "SELECT illustration FROM livres WHERE id=?";
        $requete= $bdd->prepare($sql);
        $requete->execute([$id]);
        $hold_illustration = $requete->fetch(PDO::FECTH_ASSOC);
        $hold_illustration = $hold_illustration["illustration"];
        $chemin_hold_illustration = PATH_ADMIN . "image/illustration/" . $hold_illustration;

        if(!is_file($chemin_hold_illustration)){
            header("location:update.php?id=" .$id );
            die;
        }else{
            if(!unlink($chemin_hold_illustration)){
                header("location:update.php?id=" . $id);
                die;
            }

        }
    }
}

// Modifier un avatar


// DELETE

if(isset($_GET["id"])){
    $id=intval($_GET["id"]);
    if($id > 0){
        $sql= "DELETE FROM livres WHERE id=:id";
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


