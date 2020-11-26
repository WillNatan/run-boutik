<?php
$ROOT = '../../';
include_once($ROOT . 'layout/back/header.php');
include_once($ROOT . 'repository/AddressRepository.php');
$user = $_SESSION['user'];
$addressRepository = new AddressRepository();
$address = $addressRepository->find($_GET['id']);
?>
<h4>Détails adresse</h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="dash-card">
                <table class="table">
                    <tr>
                        <th>Adresse</th>
                    </tr>
                    <tr>
                        <td><?php echo $address->getAddress(); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="modifier.php?id=<?php echo $address->getId(); ?>" class="btn btn-warning text-light"><i class="fa fa-edit"></i></a>
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