<?php
include "../config/config.php";
if (!isConnect()){
    header("location:" . URL_ADMIN . "login.php"); 
    die; 
}

if (!isAdmin()){
    header("location:" . URL_ADMINADMIN . "index.php");
    die;
}

include "../config/bdd.php";

?>