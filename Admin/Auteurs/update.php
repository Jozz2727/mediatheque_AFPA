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
    <link href="<?= URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php
    include PATH_ADMIN .'includes/sidebar.php';
    ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">         
                <?php
                include PATH_ADMIN .'includes/topbarr.php';
                ?>
  
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modifier un auteur</h1>
              </div>      
                </div>
            </div>
        

    <form action="action.php" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$auteur["id"]?>">
    <div class="mb-3">

  <label for="nom" class="form-label">NOM :</label>
  <input type="text" class="form-control" id="nom" name="nom" value="<?= $auteur["nom"]?>">
</div>

<div class="mb-3">
<label for="prenom" class="form-label">Prenom :</label>
  <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $auteur["prenom"]?>">
</div>

<div class="mb-3">
<label for="nom_de_plume" class="form-label">Nom De Plume</label>
  <input type="text" class="form-control" id="nom_de_plume" name="nom_de_plume" value="<?= $auteur["nom_de_plume"]?>">
</div>

<div class="mb-3">
<label for="adresse" class="form-label">Adresse :</label>
  <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $auteur["adresse"]?>">
</div>

<div class="mb-3">
<label for="ville" class="form-label">Ville :</label>
  <input type="text" class="form-control" id="price" name="ville" value="<?= $auteur["ville"]?>">
</div>

<div class="mb-3">
<label for="code_postal" class="form-label">Code Postal :</label>
  <input type="text" class="form-control" id="code_postal" name="code_postal" value="<?=$auteur["code_postal"]?>">
</div>

<div class="mb-3">
<label for="numero" class="form-label">Num??ro T??l??phone : </label>
  <input type="text" class="form-control" id="numero" name="numero" value="<?= $auteur["numero"]?>">
</div>

<div class="mb-3">
<label for="photo" class="form-label">Photo : </label>
  <input type="file" class="form-control" id="photo" name="photo" value="<?= $auteur["photo"]?>">
</div>

<input type="submit" name="btn_modifier_auteur" class="btn btn-primary" value="Modifier">
<input type="submit" name="btn_effacer_auteur" class="btn btn-warning" value="Supprimer">
</form>
  
               <?php
               include PATH_ADMIN .'includes/footer.php';
               ?>
               
        </div>
        
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo URL_ADMIN?>login.html">Logout</a>
                </div>
            </div>
        </div>
        
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