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

$sql= "SELECT * FROM categorie";
$requete= $bdd->query($sql);
$categories= $requete->fetchAll(PDO::FETCH_ASSOC);
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
                        <h1 class="h3 mb-0 text-gray-800">Créer un livre</h1>
</div>
<?php 
                        // if (isset($_SESSION['error_illustration']) && $_SESSION['error_illustration'] == true){
                        //     alert('danger', 'L\'illustration n\'est pas correctement déplacer ou n\'est pas valide');
                        //     unset($_SESSION['error_illustration']);
                        // }
                        // if (isset($_SESSION['error_add_livre']) && $_SESSION['error_add_livre'] == true){
                        //     alert('danger', 'Le livre n\'a pas été ajouté correctement');
                        //     unset($_SESSION['error_add_livre']);
                        // }
                    ?>
      
                </div>
            </div>

    <form action="action.php" method="POST"  enctype="multipart/form-data">
    <div class="mb-3">
  <label for="num_ISBN" class="form-label">NUMERO ISBN</label>
  <input type="text" class="form-control" id="numeros" name="num_ISBN">
</div>

<div class="mb-3">
<label for="titre" class="form-label">Titre</label>
  <input type="text" class="form-control" id="title" name="titre">
</div>

<div class="mb-3">
<label for="illustration" class="form-label">Illustration</label>
  <input type="file" class="form-control" id="illustration" name="illustration">
</div>

<div class="mb-3">
<label for="synopsis" class="form-label">SYNOPSIS</label>
  <textarea class="form-control" rows="10" col="30" id="" name="synopsis"></textarea>
</div>

<div class="mb-3">
<label for="prix" class="form-label">PRIX</label>
  <input type="text" class="form-control" id="price" name="prix">
</div>

<div class="mb-3">
<label for="nb_pages" class="form-label">NOMBRE DE PAGES</label>
  <input type="text" class="form-control" id="" name="nb_pages">
</div>

<div class="mb-3">
<label for="date_achat" class="form-label">DATE D'ACHAT</label>
  <input type="date" class="form-control" id="date_achat" name="date_achat">
</div>

<div class="mb-3">
                            <label for="cat" class="form-label">Catégories</label>
                            <select class="mt-1 select-cat" name="categorie[]" multiple id="cat">
                                <?php  foreach($categories as $categorie) : ?>
                                    <option value="<?= $categorie['id'] ?>"><?= $categorie['libelle'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="text-center">
<input type="submit" name="btn_add_livre" class="btn btn-primary">
                                </div>
  
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
                        <span aria-hidden="true">×</span>
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
</form>
    
    <script src="<?=URL_ADMIN?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=URL_ADMIN?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=URL_ADMIN?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=URL_ADMIN?>js/sb-admin-2.min.js"></script>
    <script src="<?=URL_ADMIN?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?=URL_ADMIN?>js/demo/chart-area-demo.js"></script>
    <script src="<?=URL_ADMIN?>js/demo/chart-pie-demo.js"></script>
</body>
</html>