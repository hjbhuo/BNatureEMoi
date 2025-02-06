<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NatureEmoi - Ventes de plantes en ligne</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>

</head>
<body>
    <section class="top-page">
        <header class="header">
            <img src="images/logo.png" alt="Logo du site">
            <nav class="nav">
                <li><a href="index.php">Accueil</a></li>
                <?php 
                    foreach($categories as $category) {
                        echo '<li><a href="category.php?id='.$category['id'].'">'.$category['nom'].'</a></li>';
                    }
                ?>
            </nav>
            <div class="user">
                <?php
                    if(isset($_SESSION['nom'])) {
                ?>
                <a class="login" href="logout.php">deconnexion</a>
                <?php
                    } else {
                ?>
                <a class="login" href="connexion.php">Connexion</a>
                <a class="register" href="register.php">Inscription</a>
                <?php
                    }
                ?>
            </div>
        </header>
        <div class="landing-page">
            <h1 class="big-title">Nature Emoi, meilleur que le chocolat.</h1>
        </div>
        
    </section>