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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>exos_BDD</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    
    <form action="action.php" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
  <label for="nom" class="form-label">Nom :</label>
  <input type="text" class="form-control" nom="nom" id="nom">
</div>

<div class="mb-3">
  <label for="mail" class="form-label">E-MAIL ::</label>
  <input type="mail" class="form-control" id="mail" name="mail">
</div>

<div class="mb-3">
  <label for="objet" class="form-label">Object:</label>
  <input type="text" class="form-control" id="objet" name="objet">
</div>

<div class="mb-3">
  <label for="message" class="form-label">Message :</label>
  <textarea class="form-control" id="message" name="message" rows="3">Message : </textarea>
</div>

<div class="mb-3">
  <label for="date" class="form-label">Date:</label>
  <input type="date" class="form-control" id="date" name="date">
</div>


<input type="submit" name="btn_add_contact" class="form-control btn-primary">
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
