<?php
session_start();
include "inc/functions.php";

if (!isset($_SESSION['nom'])) {
    header('Location: connexion.php');
}
$categories= getAllCategories($conn);

if(isset ($_GET['id'])){
   $produit= getProduitBYID($conn,$_GET['id']);
}

if(isset ($_SESSION['panier'])){
    if(count ($_SESSION['panier'][3]) > 0){
        $commandes = $_SESSION['panier'][3];
    }
}

$panierTotal = 0;
if(isset($_SESSION['panier'])){
    $panierTotal = $_SESSION['panier'][1];
}


include "inc/header.php";

?>
<div class="container d-flex row justify-content-center mx-auto">
<div class="row col-7 mt-4">
    <h2>Panier utilisateur</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($commandes)){
            foreach($commandes as $index => $comm){
                $produit = getProduitById($conn, $comm[0]);
                print'<tr>
                <td>
                <img src="images/nos_plantes/'.$produit['image'].'" class="img-thumbnail" style="width: 80px; border-radius: 100%">
                '.$produit['nom'].'
                </td>
                <td>'.$produit['prix'].'</td>
                <td>'.$comm[1].'</td>
                <td>'.$comm[2].'</td>
                <td>
                <a href="actions/supprimer.php?id='.$index.'" class="btn btn-danger">Supprimer</a>
                </td>
                </tr>';
            }
            }
            ?>

        </tbody>
    </table>
</div>
<div class="row col-5 mt-4 d-flex flex-column">
    <h2>Valider la commande</h2>
    <div class="total">
        <h3>Total: <?php echo $panierTotal; ?> </h3>
    </div>
    <a href="actions/valider.php" class="btn btn-primary w-50">Valider</a>
</div>

</div>
<?php
   include "inc/footer.php";
?> 