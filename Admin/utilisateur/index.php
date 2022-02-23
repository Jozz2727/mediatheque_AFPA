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

$sql = "SELECT utilisateur.id AS id_utilisateur, utilisateur.nom AS nom_utilisateur,
 utilisateur.prenom AS prenom_utilisateur, role.libelle AS libelle_role, utilisateur.mail AS mail_utilisateur,
  utilisateur.pseudo AS pseudo_utilisateur,
   utilisateur.num_telephone AS num_telephone_utilisateur,
utilisateur.avatar AS avatar_utilisateur, utilisateur.adresse AS adresse_utilisateur, 
utilisateur.ville AS ville_utilisateur, utilisateur.code_postal AS code_postal_utilisateur
FROM role_utilisateur 
INNER JOIN role ON role_utilisateur.id_role = role.id
INNER JOIN utilisateur ON role_utilisateur.id_utilisateur = utilisateur.id
-- WHERE role_utilisateur.id_utilisateur =1";
$requete =$bdd->query($sql);
$utilisateurs= $requete->FetchAll(PDO::FETCH_ASSOC);

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

<h1 class="h3 mb-0 text-gray-800">Liste des utilisateurs</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div>
<a href="<?=URL_ADMIN?>utilisateur/add.php" name="btn-ajouter"class="btn btn-success">Ajouter un utilisateur</a>
</div>
    
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Role</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Mail</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Avatar</th>
        <th scope="col">Adresse</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>

        
        <th scope="col">Ville</th>
        <th scope="col">Code Postal</th>
        </tr>
    </thead>
    <tbody>
      
    <?php foreach ($utilisateurs as $utilisateur) : ?>
        <tr>
            <!-- AFFICHAGE DES CHAMPS -->
            <th scope="row"><?= $utilisateur['id_utilisateur'] ?></th>
            <td><?= $utilisateur['libelle_role'] ?></td>
            <td><?= $utilisateur['nom_utilisateur'] ?></td>
            <td><?= $utilisateur['prenom_utilisateur'] ?></td>
            <td><?= $utilisateur['pseudo_utilisateur'] ?></td>
            <td><?= $utilisateur['mail_utilisateur'] ?></td>
            <td><?= $utilisateur['num_telephone_utilisateur'] ?></td>
            <td><img width= "80px" src="<?= URL_ADMIN?>image/avatars/<?=$utilisateur['avatar_utilisateur']?>" alt=""></td>
            <td><?= $utilisateur['adresse_utilisateur'] ?></td>
            <td><?= $utilisateur['ville_utilisateur'] ?></td>
            <td><?= $utilisateur['code_postal_utilisateur'] ?></td>
            
            </tr>
            <td><a href="<?= URL_ADMIN ?>utilisateur/update.php?id=<?= $utilisateur['id_utilisateur'] ?>" class= "btn btn-warning">Modifier</a></td>
            <td><a href="<?= URL_ADMIN ?>utilisateur/index.php?id=<?= $utilisateur['id_utilisateur'] ?>" class= "btn btn-danger">Supprimer</a></td>
       
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
