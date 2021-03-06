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


$sql="SELECT * FROM editeur";
$requete =$bdd->query($sql);
$editeurs= $requete->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="<?= URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">
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
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Liste des éditeurs</h1>
</div>
    
<a href="<?=URL_ADMIN?>editeurs/add.php" name="btn-ajouter_editeur"class="btn btn-success">Ajouter un éditeur</a>
    
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Dénomination</th>
        <th scope="col">Siret</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
        <th scope="col">Code Postal</th>
        <th scope="col">Mail</th>
        <th scope="col">Téléphone</th>
        </tr>
    </thead>
    <tbody>
      
    <?php foreach ($editeurs as $editeur) : ?>
        <tr>
            <!-- AFFICHAGE DES CHAMPS -->
            <th scope="row"><?= $editeur['id'] ?></th>
            <td><?= $editeur['denomination'] ?></td>
            <td><?= $editeur['siret'] ?></td>
            <td><?= $editeur['adresse'] ?></td>
            <td><?= $editeur['ville'] ?></td>
            <td><?= $editeur['code_postal'] ?></td>
            <td><?= $editeur['mail'] ?></td>
            <td><?= $editeur['numero_tel'] ?></td>
        </tr>
        <td><a href="<?= URL_ADMIN ?>editeurs/update.php?id=<?= $editeur['id'] ?>" class= "btn btn-warning">Modifier</a></td>
        <td><a href="<?= URL_ADMIN ?>editeurs/action.php?id=<?= $editeur['id'] ?>" class= "btn btn-danger">Supprimer</a></td>

    <?php endforeach; ?>
    </tbody>
    </table>
   
    </div>
    </div>
    
    
   <div>
    <?php
               include PATH_ADMIN .'/includes/footer.php';
               ?>
               </div>


                     
    <script src="<?= URL_ADMIN?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= URL_ADMIN?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL_ADMIN?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= URL_ADMIN?>js/sb-admin-2.min.js"></script>
    <script src="<?= URL_ADMIN?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= URL_ADMIN?>js/demo/chart-area-demo.js"></script>
    <script src="<?= URL_ADMIN?> js/demo/chart-pie-demo.js"></script>
    
   </body>
   </html>
               
<!-- End of Main Content -->
