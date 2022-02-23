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
            include '../includes/sidebar.php';
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <?php
                    include '../includes/topbarr.php';
                ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modifier un utilisateur</h1>
                    </div>
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?=$utilisateur["id"]?>">
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" name="nom" class="form-control" id="nom" value="<?=$utilisateur["nom"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" value="<?=$utilisateur["prenom"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Pseudo :</label>
                            <input type="text" name="pseudo" class="form-control" id="pseudo" value="<?=$utilisateur["pseudo"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Mail :</label>
                            <input type="email" name="mail" class="form-control" id="mail" value="<?=$utilisateur["mail"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="mot_de_passe" class="form-label">Mot de passe :</label>
                            <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" value="<?=$utilisateur["mot_de_passe"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="num_telephone" class="form-label">Numéro de téléphone :</label>
                            <input type="text" name="num_telephone" class="form-control" id="num_telephone" value="<?=$utilisateur["num_telephone"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar :</label>
                            <input type="file" name="avatar" class="form-control" id="avatar" value="<?=$utilisateur["avatar"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse :</label>
                            <input type="text" name="adresse" class="form-control" id="adresse" value="<?=$utilisateur["adresse"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville :</label>
                            <input type="text" name="ville" class="form-control" id="ville" value="<?=$utilisateur["ville"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code postal :</label>
                            <input type="text" name="code_postal" class="form-control" id="code_postal" value="<?=$utilisateur["code_postal"]?>">
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" class="btn btn-primary" value="Modifer" name="btn_modifier_utilisateur">
                            <input type="submit" class="btn btn-primary" value="Supprimer" name="btn_supprimer_utilisateur">
                        </div>
                    </form>
                </div>
                
            <?php
                include '../includes/footer.php';
            ?>

            </div>
     
        <script src="<?=URL_ADMIN?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=URL_ADMIN?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=URL_ADMIN?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=URL_ADMIN?>js/sb-admin-2.min.js"></script>
    <script src="<?=URL_ADMIN?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?=URL_ADMIN?>js/demo/chart-area-demo.js"></script>
    <script src="<?=URL_ADMIN?>js/demo/chart-pie-demo.js"></script>
</body>
</html>