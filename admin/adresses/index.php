<?php
$ROOT = '../../';
include_once($ROOT . 'layout/back/header.php');
include_once($ROOT . 'repository/AddressRepository.php');
$user = $_SESSION['user'];
$addressRepository = new AddressRepository();
$addresses = $addressRepository->findBy(['shop_id'=>$user->getShop()]);
?>
<h4>Adresses</h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="dash-card">
                <div class="dash-header">
                    <h5>Liste des adresses</h5>
                    <?php echo $user->getShop() ? '<a href="nouvelle-adresse.php" class="btn btn-primary mt-1"><i class="fa fa-plus"></i></a>': ''?>
                </div>
                <div class="dash-body">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Adresse</th>
                                    <th class='text-right'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($addresses as $address) { ?>
                                    <tr>
                                        <td><?php echo $address->getAddress(); ?></td>
                                        <td class='text-right'>
                                            <a href="details.php?id=<?php echo $address->getId();?>" class="btn btn-info text-light"><i class="fa fa-arrow-right"></i></a>
                                            <a href="modifier.php?id=<?php echo $address->getId();?>" class="btn btn-warning text-light"><i class="fa fa-edit"></i></a>
                                            <a href="supprimer.php?id=<?php echo $address->getId();?>" class="btn btn-danger text-light"><i class="fa fa-times"></i></a>
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