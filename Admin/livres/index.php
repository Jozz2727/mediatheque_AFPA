<?php 
include '../config/config.php';
if (!isConnect()){
    header("location:" . URL_ADMIN . "login.php"); 
    die; 
}

if (!isAdmin()){
    header("location:" . URL_ADMIN . "index.php");
    die;
}
    include  "../config/bdd.php";

    $sql= "SELECT livres.id AS id_livres, livres.num_ISBN AS num_ISBN_livres, livres.titre AS titre_livres,
    livres.illustration AS illustration_livres, categorie.libelle AS libelle_categorie, livres.synopsis AS synopsis_livres, livres.prix AS prix_livres,
    livres.nb_pages AS nb_pages_livres, livres.date_achat AS date_achat_livres, livres.disponibilite AS
    disponibilite_livres
    FROM categorie_livre
    INNER JOIN categorie ON categorie_livre.id_categorie= categorie.id
    INNER JOIN livres ON categorie_livre.id_livre = livres.id";
    $requete = $bdd->query($sql);
    $livres = $requete->FetchAll(PDO::FETCH_ASSOC);
?>
                       

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <link href="<?=URL_ADMIN?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="<?=URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">
    <?php
    include PATH_ADMIN .'includes/sidebar.php';
    ?>

    
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        
        <?php
            include PATH_ADMIN.'includes/topbarr.php';
        ?>

                <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Liste des livres</h1>
                    <?= count($livres)?> Livres répertoriés.
  
                    
            <a href="<?=URL_ADMIN?>livres/add.php" name="btn-ajouter"class="btn btn-success">Ajouter un livre</a>
         </div>
                        
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Catégories</th>
                            <th scope="col">Num_ISBN</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Illustration</th>
                            <th scope="col">Synopsis</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Nb_pages</th>
                            <th scope="col">Date_achat</th>
                            <th scope="col">Disponibilté</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($livres as $livre) : ?>
                            <tr>
                                <!-- AFFICHAGE DES CHAMPS -->
                                <th scope="row"><?= $livre['id_livres']?></th>
                                <th scope="row"><?= $livre['libelle_categorie']?></th>
                                <td><?= $livre['num_ISBN_livres']?></td>
                                <td><?= $livre['titre_livres']?></td>
                                <td><?= $livre['illustration_livres']?></td>
                                <td><?= substr($livre['synopsis_livres'],0, 110)?> [...]</td>
                                <td><?= $livre['prix_livres']?>€</td>
                                <td><?= $livre['nb_pages_livres']?></td>
                                <td><?= $livre['date_achat_livres']?></td>
                                <td><?= $livre['disponibilite_livres']?></td>
                                <!-- ce qui suit après le ?, après php dans l'adresse de la page ce qui va suivre ce sont des données après get donc visibles -->
                                <!-- après on vérifie sur la page update avec var_dump $_GET -->
                                <!-- pour que l'id soit dynamique et pas que l'id 1 après le ? : -->
                                <td><a href="<?= URL_ADMIN ?>livres/update.php?id=<?= $livre['id_livres'] ?>" class= "btn btn-warning">Modifier</a></td>
                                <td><a href="<?= URL_ADMIN ?>livres/action.php?id=<?= $livre['id_livres'] ?>" class= "btn btn-danger">Supprimer</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                     </div>
                       </div>
            
        <?php
            include PATH_ADMIN . 'includes/footer.php';
        ?>
          </div>
        
        </div>
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