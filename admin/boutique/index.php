<?php
$ROOT = '../../';
include_once($ROOT . 'classes/User.php');
include_once($ROOT . 'classes/Shop.php');
include_once($ROOT . 'layout/back/header.php');
include_once($ROOT . 'repository/ProductRepository.php');
include_once($ROOT . 'repository/AddressRepository.php');
include_once($ROOT . 'repository/ShopRepository.php');
$user = $_SESSION['user'];
$config = new Config();
$db = $config->dbConnect();
$shopRepository = new ShopRepository();
$productRepository = new ProductRepository();
$addressRepository = new AddressRepository();
$addresses = $addressRepository->findBy(['shop_id'=>$user->getShop()]);
$products = $productRepository->findBy(['shop_id'=>$user->getShop()]);
$shop = $shopRepository->findOneBy(['id'=>$user->getShop()]);
?>
<h4>Ma boutique</h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="dash-card">
                <div class="dash-body pt-1 pb-1 p-md-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                                <div class="logo-content" style="background: url('<?php echo $ROOT ?>img/uploads/<?php echo $shop ? $shop->getImage() : 'logo.png'; ?>')">
                                </div>
                                <h4 class="mt-3 text-center"><?php echo $shop ? $shop->getNom() : 'Aucun nom'; ?></h4>
                                <?php if ($shop) {
                                ?>
                                    <a href="<?php echo $ROOT ?>admin/boutique/modifier.php?id=<?php echo $shop->getId(); ?>" class="btn-runb-primary">Modifier</a>
                                <?php
                                } else { ?>
                                    <a href="creation.php" class="btn-runb-primary">Créer ma boutique</a>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="col-md-6 offset-md-2">
                                <a href="<?php echo $ROOT ?>admin/adresses">
                                    <h4 class="text-dark">Adresses</h4>
                                </a>
                                <div class="border-bottom"></div>
                                <?php if ($shop && $addresses) { ?>
                                    <ul class="addresses">
                                        <?php foreach ($addresses as $address) { ?>
                                            <li><i class="fa fa-map-marker-alt"></i> <?php echo $address->getAddress();  ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <p>Aucune adresse</p>
                                <?php } ?>

                                <h4 class="text-dark mt-3">Contact</h4>
                                <div class="border-bottom"></div>
                                <?php if ($shop) { ?>
                                    <ul class="contact-info">
                                        <li><i class="fa fa-envelope"></i> <?php echo $shop->getEmail(); ?></li>
                                        <li><i class="fa fa-phone"></i> <?php echo $shop->getTel(); ?></li>
                                    </ul>
                                <?php } else { ?>
                                    <p>Aucune information</p>
                                <?php } ?>
                            </div>
                            <?php if ($shop) { ?>
                            <div class="col-md-12 mt-5">
                                <h4 class='text-dark'>Description</h4>
                                <div class="border-bottom"></div>
                                <p><?php echo $shop->getDesc(); ?></p>
                            </div>
                            <?php } else { ?>
                                    <p class="mt-5">Aucune description</p>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="dash-card">
                <div class="dash-header">
                    <a href="<?php echo $ROOT ?>admin/produits">
                        <h5 class=text-dark>Mes produits</h5>
                    </a>
                </div>
                <div class="dash-body">
                    <div class="container">
                        <?php if ($shop) { ?>
                            <div class="row">
                                <?php foreach ($products as $product) { ?>
                                    <div class="col-md-3">
                                        <div class="dash-card">
                                            <div class="dash-body">
                                                <div class="product-container">
                                                    <img src="<?php echo $ROOT ?>img/uploads/<?php echo $product->getImage(); ?>" class="img-fluid" alt="Image produit">
                                                    <div class="product-content">
                                                        <h5><?php echo $product->getNom(); ?></h5>
                                                        <span><?php echo $product->getPrix(); ?> €</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <p class="text-center">Aucun produit</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once($ROOT . 'layout/back/footer.php'); ?>