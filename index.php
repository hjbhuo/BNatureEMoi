<?php
    include 'inc/functions.php';
    $categories = getAllCategories($conn);
    include 'inc/header.php';
    $produits = getAllProducts($conn);

?>
    
    <section class="services" id="services">
        <div class="service-item">
            <i class="fas fa-store delivery-icon"></i>
            <p class="service-details">Nos magasins à votre service</p>
        </div>
        <div class="service-item">
            <i class="fas fa-people-carry delivery-icon"></i>
            <p class="service-details">Retrait en magasin sans contact</p>
        </div>
        <div class="service-item">
            <i class="fas fa-truck delivery-icon"></i>
            <p class="service-details">Livraison à domicile sans contact</p>
        </div>
    </section> 

    <section class="bests-items" id="bests-items">
        <h2 class="section-title">
            Nos categories
        </h2>
        <div class="best-plants">
            <?php
                foreach($categories as $category) {
             ?>
             <a href="category.php?id=<?php echo $category['id']; ?>" class="plant-box no-grid" style="background-image: url(images/nos_meilleures_ventes/<?php echo $category['image'] ?>); color:black;" >
                <div class="plant-details">
                    <p class="plant-name"><?php echo $category['nom'] ?></p>
                </div>
            </a>
            <?php
                }
            ?>
            
        </div>
    </section> 

    <section class="all-plants" id="all-plants">
        <h2 class="section-title">
            Nos plantes
        </h2>
        <div class="plant-grid">
            <?php 
             $max = 3;
            foreach($produits as $produit) {
                if($max == 0) {
                    break;
                }
                $max--;
            ?>
            <a href="produit.php?id=<?php echo $produit['id']; ?>" class="plant-grid<?php echo $produit['id']; ?> plant-box">
                <div class="plant-details">
                    <p class="plant-name"><?php echo $produit['nom']; ?></p>
                    <p class="plant-price"><?php echo $produit['prix']; ?></p>
                </div>
            </a>
            <?php
            }
            ?>
        </div>
    </section> 
    
<?php
    include 'inc/footer.php';
?>