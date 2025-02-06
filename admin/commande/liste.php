<?php

session_start();

include "../../inc/functions.php";


$paniers = getAllPanier($conn);


include "../template/header.php";

?>

  <div class="container-fluid">
    <div class="row">


      <?php

      include "../template/navigation.php";

      ?>



      <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> <!-- Début de la section main -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Liste des paniers</h1>
        </div>

        
        <div> <!-- Début de la section du tableau -->

          <?php

          if (isset($_GET['delete']) && $_GET['delete'] == "ok") {

            print '<div class="alert alert-success">
            Commande supprimee avec success
              </div>';
          }
          ?>

          <?php

          if (isset($_GET['valider']) && $_GET['valider'] == "ok") {

            print '<div class="alert alert-success">
            Commande Validee avec success
              </div>';
          }
          ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Client</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($paniers as $index => $panier) {
                $visiteur = getVisiteurById($conn, $panier['visiteur']);
                print '<tr>
                <th scope="row">' . $panier['id'] . '</th>
                <td>' . $visiteur['nom']. ' '. $visiteur['prenom'] .'</td>
                <td>' . $panier['total'] . '</td>
                ';
                print '
                <td>
                <a data-bs-toggle="modal" data-bs-target="#afficherModel'.$panier['id'].'" class="btn btn-warning">Détails</a>
                <a href="supprimer.php?id=' . $panier['id'] . '" class="text-danger ">
                  <i data-lucide="trash" stroke-width="1" width="20" height="20"></i>
                </a>
                </td>
                </tr>';
              }
              ?>
            </tbody>
          </table>

        </div> <!-- Fin de la section du tableau -->
      </div> <!-- Fin de la section main -->

    </div> <!-- Fin de la row -->
  </div> <!-- Fin du container-fluid -->



  <!-- Modal Traitement du Panier -->
  <?php 
  foreach ($paniers as $index => $panier) { ?>
  <div class="modal fade" id="traiterModel<?php echo $panier['id']; ?>" tabindex="-1" aria-labelledby="traiterModel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Traitement du Panier </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body
        ">
          <form action="traiter.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $panier['id']; ?>">
            <div class="form-group
            ">
              <label for="etat">Etat</label>
              <select name="etat" id="etat" class="form-control">
                <option value="En livraison">En livraison</option>
                <option value="livraison terminer">livraison Terminer</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Sauvgarder</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>





  <?php



  foreach ($paniers as $index => $panier) { 
    $commandes = getCommandePerPanier($conn, $panier['id']);
    ?>

    <!-- Modal Affichage du commande -->
    <div class="modal fade" id="afficherModel<?php echo $panier['id']; ?>" tabindex="-1" aria-labelledby="afficherModel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">List des Commandes </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Produit</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($commandes as $index => $comm) {
                  $produit = getProduitById($conn, $comm['produit']);
                  print '<tr>
                  <th scope="row">' . $comm['id'] . '</th>
                  <td>'
                    . '<img src="../../images/nos_plantes/' . $produit['image'] . '" class="img-thumbnail" style="width: 50px; margin-right: 10px">'
                   . $produit['nom'] .
                    '</td>
                  <td>' . $comm['quantite'] . '</td>
                  <td>' . $comm['total'] . '</td>
                  </tr>';
                }
                ?>
              </tbody>
            </table>
            </div>

          </form>
        </div>
      </div>
    </div>




  <?php
  }

  include "../template/footer.php";
  ?>