<?php
$ROOT = '../../';
include_once($ROOT . 'layout/back/header.php');
include_once($ROOT . 'repository/ProductRepository.php');
$productRepository = new ProductRepository();
$user = $_SESSION['user'];
$products = $productRepository->findBy(['shop_id'=>$user->getShop()]);
?>

<h4>Mes produits</h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="dash-card">
                <div class="dash-header">
                    <h5><?php echo $user->getShop() ? '<small>Produits</small>': '<small>Aucun produit</small>'?></h5>
                    <?php echo $user->getShop() ? '<a href="nouveau.php" class="btn btn-primary mt-1"><i class="fa fa-plus"></i></a>': ''?>
                </div>
                <div class="dash-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Miniature</th>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th class='text-right'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) { ?>
                                    <tr>
                                        <td><img src="<?php echo $ROOT ?>img/uploads/<?php echo $product->getImage()?>" width="50" alt="Miniature"></td>
                                        <td><?php echo $product->getNom()?></td>
                                        <td><?php echo $product->getPrix()?> €</td>
                                        <td class="text-right">
                                            <a href="details.php?id=<?php echo $product->getId()?>" class="btn btn-info text-light"><i class="fa fa-arrow-right"></i></a>
                                            <a href="modifier.php?id=<?php echo $product->getId()?>" class="btn btn-warning text-light"><i class="fa fa-edit"></i></a>
                                            <a href="supprimer.php?id=<?php echo $product->getId();?>" class="btn btn-danger text-light"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include_once($ROOT . 'layout/back/footer.php') ?>