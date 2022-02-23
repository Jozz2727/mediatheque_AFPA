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


$sql="SELECT * FROM categorie";
$requete =$bdd->query($sql);
$categories= $requete->FetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>
    <link href="<?php echo URL_ADMIN?><?= URL_ADMIN?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
    <?php
    include PATH_ADMIN .'/includes/sidebar.php';
    ?>
    
        <div id="content-wrapper" class="d-flex flex-column">
    
            <div id="content">
                <?php
                include PATH_ADMIN .'/includes/topbarr.php';
                ?>
             <div class="container-fluid">

<h1 class="h3 mb-0 text-gray-800">Liste des catégorie</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div>
<a href="<?=URL_ADMIN?>categorie/add.php" name="btn-ajouter"class="btn btn-success">Ajouter une catégorie</a>
</div>
    
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Catégories</th>
        <th scope="col">Mangas</th>
        <th scope="col">Enfants</th>
        <th scope="col">Aventure</th>
        <th scope="col">Horreur</th>
        <th scope="col">Roman</th>
        <th scope="col">Informatique</th>
        <th scope="col">Action/th>
        <th scope="col">Cuisine</th>
        <th scope="col">Science-Fiction</th>
        <th scope="col">Société</th>
        </tr>
    </thead>
    <tbody>
      
    <?php foreach ($categories as $categorie) : ?>
        <tr>
            <!-- AFFICHAGE DES CHAMPS -->
            <th scope="row"><?= $categorie['id'] ?></th>
            <td><?= $categorie['libelle'] ?></td>
            </tr>
            <td><a href="<?= URL_ADMIN ?>categorie/update.php?id=<?= $categorie['id'] ?>" class= "btn btn-warning">Modifier</a></td>
            <td><a href="<?= URL_ADMIN ?>categorie/index.php?id=<?= $categorie['id'] ?>" class= "btn btn-danger">Supprimer</a></td>
       
    <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    </div>
</div>

<?php
               include PATH_ADMIN .'/includes/footer.php';
               ?>
</div>

