<?php
include "inc/functions.php";
$CurrentCategorie = getCategorieById($conn, $_GET['id']);
$produits = getProduitByCategorie($conn, $_GET['id']);

include "inc/header.php";
?>
<section class="all-plants" id="all-plants">
    <h2 class="section-title">
        <?php echo $CurrentCategorie['nom']; ?>
    </h2>
    <div class="plant-grid">
        <?php
        foreach ($produits as $produit) {
        ?>
            <a href="produit.php?id=<?php echo $produit['id']; ?>" class="plant-grid<?php echo $produit['id']; ?> plant-box">
                <div class="plant-details">
                    <p class="plant-name"><?php echo $produit['nom']; ?></p>
                    <p class="plant-price"><?php echo $produit['prix']; ?> DT</p>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</section>

<?php
include "inc/footer.php"
?>