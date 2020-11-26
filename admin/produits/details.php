<?php
$ROOT = '../../';
include_once($ROOT . 'layout/back/header.php');
include_once($ROOT . 'repository/ProductRepository.php');
$user = $_SESSION['user'];
$productRepository = new ProductRepository();
$product = $productRepository->find($_GET['id']);
?>
<h4>Détails du produit</h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="dash-card">
                <table class="table">
                    <tr>
                        <th>Nom du produit</th>
                    </tr>
                    <tr>
                        <td><?php echo $product->getNom(); ?></td>
                    </tr>
                    <tr>
                        <th>Prix</th>
                    </tr>
                    <tr>
                        <td><?php echo $product->getPrix(); ?> €</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td><?php echo $product->getDetails(); ?></td>
                    </tr>
                    <tr>
                        <th>Image</th>
                    </tr>
                    <tr>
                        <td>
                        <img src="<?php echo  $ROOT.'img/uploads/'.$product->getImage(); ?>" width="50" alt="Miniature">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="modifier.php?id=<?php echo $product->getId(); ?>" class="btn btn-warning text-light"><i class="fa fa-edit"></i></a>
                            <a href="./" class="btn btn-primary text-light"><i class="fa fa-arrow-left"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php

include_once($ROOT . 'layout/back/footer.php') ?>