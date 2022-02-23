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



$sql="SELECT * FROM usager";
$requete =$bdd->query($sql);
$usagers= $requete->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="<?= URL_ADMIN?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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

<h1 class="h3 mb-0 text-gray-800">Liste des usagers</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div>
<a href="<?=URL_ADMIN?>usager/add.php" name="btn-ajouter"class="btn btn-success">Ajouter un usager</a>
</div>
    
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
        <th scope="col">Code Postal</th>
        <th scope="col">Mail</th>
        </tr>
    </thead>
    <tbody>
      
    <?php foreach ($usagers as $usager) : ?>
        <tr>
            <!-- AFFICHAGE DES CHAMPS -->
            <th scope="row"><?=$usager['id'] ?></th>
            <td><?=$usager['nom'] ?></td>
            <td><?=$usager['prenom'] ?></td>
            <td><?=$usager['adresse'] ?></td>
            <td><?=$usager['ville'] ?></td>
            <td><?=$usager['code_postal'] ?></td>
            <td><?=$usager['mail'] ?></td>
            </tr>
            <td><a href="<?= URL_ADMIN ?>usager/update.php?id=<?= $usager['id'] ?>" class= "btn btn-warning">Modifier</a></td>
            <td><a href="<?= URL_ADMIN ?>usager/index.php?id=<?= $usager['id'] ?>" class= "btn btn-danger">Supprimer</a></td>
            
         
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

