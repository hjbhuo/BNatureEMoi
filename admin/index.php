<?php 
session_start();
if(!isset($_SESSION['nom'])){
  header('location:connexion.php');

}

include "template/header.php";
include "template/navigation.php";
?>

<div class="bg-dark text-center p-5 mt-4">

    <p class="text-white">
        Tous les droits réservés 2024
    </p>

</div>



<?php
include "template/footer.php";
?>