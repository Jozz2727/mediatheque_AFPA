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


$sql="SELECT * FROM auteur";
$requete =$bdd->query($sql);
$auteurs= $requete->FetchAll(PDO::FETCH_ASSOC);
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

<h1 class="h3 mb-0 text-gray-800">Liste des auteurs</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div>
<a href="<?=URL_ADMIN?>Auteurs/add.php" name="btn-ajouter"class="btn btn-success">Ajouter un auteur</a>
</div>
    
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Nom De PLume</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
        <th scope="col">Code Postal</th>
        <th scope="col">Mail</th>
        <th scope="col">Numéro</th>
        <th scope="col">Photo</th>
        </tr>
    </thead>
    <tbody>
      
    <?php foreach ($auteurs as $auteur) : ?>
        <tr>
            <!-- AFFICHAGE DES CHAMPS -->
            <th scope="row"><?= $auteur['id'] ?></th>
            <td><?= $auteur['nom'] ?></td>
            <td><?= $auteur['prenom'] ?></td>
            <td><?= $auteur['nom_de_plume'] ?></td>
            <td><?= $auteur['adresse'] ?></td>
            <td><?= $auteur['ville'] ?></td>
            <td><?= $auteur['code_postal'] ?></td>
            <td><?= $auteur['mail'] ?></td>
            <td><?= $auteur['numero'] ?></td>
            <td><?= $auteur['photo'] ?></td>
            <!-- ce qui suit après le ?, après php dans l'adresse de la page ce qui va suivre ce sont des données après get donc visibles -->
            <!-- après on vérifie sur la page update avec var_dump $_GET -->
            <!-- pour que l'id soit dynamique et pas que l'id 1 après le ? : -->
            </tr>
            <td><a href="<?= URL_ADMIN ?>Auteurs/update.php?id=<?= $auteur['id'] ?>" class= "btn btn-warning">Modifier</a></td>
            <td><a href="<?= URL_ADMIN ?>Auteurs/index.php?id=<?= $auteur['id'] ?>" class= "btn btn-danger">Supprimer</a></td>
       
    <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php
               include PATH_ADMIN .'/includes/footer.php';
               ?>
</div>
<!-- End of Main Content -->
