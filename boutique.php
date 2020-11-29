<?php
$ROOT = './';
include_once($ROOT . 'layout/front/header.php');
include_once($ROOT . 'repository/ShopRepository.php');
$shopRepository = new ShopRepository();
$shop = $shopRepository->findOneBy(['id' => $_GET['id']]);
?>
<section class="hero">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-4 offset-lg-1">
        <div id="product-block"  class="no-rotation wow fadeIn">
          <?php if ($shop->getImage()) { ?>
            <img src="img/uploads/<?= $shop->getImage() ?>" class='img-fluid wow pulse' alt="Image">
          <?php } else { ?>
            <img src="img/defaultshop.png" class='img-fluid wow pulse' alt="Image">
          <?php } ?>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 offset-lg-1 d-flex flex-column justify-content-center">
        <div class="text-center text-md-left shop-infos wow pulse">
          <h1><?= $shop->getNom(); ?></h1>
          <h4>Informations</h4>
          <p><?= $shop->getDesc(); ?> </p>
          <h4>Adresses</h4>
          <ul class="shop-addresses">
            <?php
            if (count($shop->getAddresses()) > 1) {
              foreach ($shop->getAddresses() as $address) { ?>
                <li><?= $address->getAddress() ?></li>
              <?php }
            } else { ?>
              <li>Aucune Adresse</li>
            <?php } ?>

          </ul>
          <h4>Contact</h4>
          <?php if ($shop->getEmail()  || $shop->getTel()) { ?>
            <p><?= $shop->getEmail(); ?></p>
            <p><?= $shop->getTel(); ?></p>
          <?php } else { ?>
            <p>Aucun contact</p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="main-products p-0 p-md5">
  <h1 class="text-center mt-3 wow fadeIn">Produits</h1>
  <div class="title-divider wow fadeIn"></div>
  <div class="container mt-5">
    <div class="row">
      <?php foreach ($shop->getProducts() as $product) { ?>
        <div class="col-6 col-md-3 mb-2 wow bounceIn">
          <a href="<?= $ROOT . 'produit.php?id=' . $product->getId() ?>">
            <div class="runb-card">
              <div class="runb-card-header">
                <img src="<?= $product->getImage() ? $ROOT . '/img/uploads/' . $product->getImage() : 'img/defaultProduct.jpg' ?>" class="img-fluid w-100 mb-5" alt="Image">
              </div>
              <div class="runb-card-body">
                <div class="shop-detail">
                  <h4><?= $product->getNom() ?></h4>
                  <span class="price"><?= $product->getPrix() ?> €</span>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php
include_once($ROOT . 'layout/front/footer.php')
?>