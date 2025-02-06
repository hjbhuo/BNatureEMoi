
<?php 

session_start();

include "../inc/functions.php";

if(isset($_POST['btnEdit'])){

if(EditAdmin($conn,$_POST)){

  $_SESSION['nom'] = $_POST['nom'];
  $_SESSION['email'] = $_POST['email'];


}


}

include "template/header.php";
?>

<div class="container-fluid">
  <div class="row">
   
   <?php
   
   include "template/navigation.php";

?>




    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>

        <div>
          <?php
          echo $_SESSION['nom'];
          ?>
        </div>
      </div>

        <div class="container">

                         <h1> Nom : <span class="text-primary"> <?php echo $_SESSION['nom']; ?> </span>   </h1> 
                        <h1> Email :  <span class="text-primary"><?php echo $_SESSION['email']; ?> </span></h1>
                        <a data-bs-toggle="modal" data-bs-target="#profileEdit" class="btn btn-primary"> Modifier </a>
                        
        </div>


    </main>
  </div>
</div>

<!-- Modal Modifier -->
<div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier profile </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
          
        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id_admin">

        <div class="form-group"><input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" class="form-control" placeholder=" Tapper votre nom ...">
      </div>

 <!-- Ajout d'un espace -->
 <div class="mb-3"></div>

        <div class="form-group"><input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" placeholder=" Tapper votre email ..." >
      </div>

 <!-- Ajout d'un espace -->
 <div class="mb-3"></div>

        <div class="form-group"><input type="password" name="mp"  class="form-control" placeholder=" Tapper votre mot de passe ...">
      </div>
        

          
          <!-- Ajout d'un espace -->
          <div class="mb-3"></div>
          
          <!-- Fermeture du formulaire -->
          
          <div class="modal-footer">
        <button type="submit" name="btnEdit" class="btn btn-primary">Modifier</button>
      </div>
        
        </form>
      </div>
      </div>
    </div>
  </div>
</div>




<?php 

include "template/footer.php";

?>