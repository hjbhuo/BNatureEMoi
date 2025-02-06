<?php
include "inc/functions.php";

$categories= getAllCategories($conn);

if(isset ($_GET['id'])){
   $produit= getProduitBYID($conn,$_GET['id']);
}
include "inc/header.php";

?>

      <div class="row col-12 mt-4">

      <div class="card col-8 offset-2 flex-row d-flex" >
  <img src="images/nos_plantes/<?php echo $produit['image']; ?>" class="card-img-top w-50" alt="...">
  <div class="card-body d-flex flex-column">
    <h5 class="card-title"><?php echo $produit['nom']   ?></h5>
    <p class="card-text"><?php echo $produit['description']   ?></p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo $produit['prix'] ?>DT</li>
        
    </ul>
    <div class="">
      <form action="actions/commander.php" method="POST">
        <input type="hidden" name="produit" value="<?php echo $produit['id'] ?>" >
        <input type="number" class="form-control col-2 w-100" name="qte" value="1">
        <button type="submit" class="btn btn-primary mt-2">Ajouter au panier</button>
      </form>

    </div>
  </div>
  </div>

       
<?php
   include "inc/footer.php"
?> 