<?php
$ROOT = './';
include_once($ROOT . 'layout/front/header.php');
include_once($ROOT . 'repository/ShopRepository.php');
include_once($ROOT . 'repository/AddressRepository.php');
include_once($ROOT . 'repository/ProductRepository.php');
include_once($ROOT . 'classes/Shop.php');
include_once($ROOT . 'classes/Address.php');
include_once($ROOT . 'classes/Product.php');
$addressRepository = new AddressRepository();
$shopRepository = new ShopRepository();
$productRepository = new ProductRepository();
$shop = $shopRepository->findOneBy(['id'=>$_GET['id']]);
$addresses = $addressRepository->findBy(['shop_id'=>$_GET['id']]);
$products = $productRepository->findBy(['shop_id'=>$_GET['id']]);
?>
<section class="hero">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-4 offset-lg-1">
        <img src="img/uploads/<?php echo $shop->getImage() ?>" class='img-fluid wow pulse' alt="Image">
      </div>
      <div class="col-md-6 col-lg-4 offset-lg-1 d-flex flex-column justify-content-center">
        <div class="text-center text-md-left shop-infos wow pulse">
          <h1><?php echo $shop->getNom();?></h1>
          <h4>Informations</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <h4>Adresses</h4>
          <ul class="shop-addresses">
              <?php
              if(count($addresses)>1){
                foreach($addresses as $address) {?>
                    <li><?php echo $address->getAddress() ?></li>
                    <?php }
              }else {?>
                    <li>Aucune Adresse</li>
              <?php } ?>
              
          </ul>
          <h4>Contact</h4>
          <?php if($shop->getEmail()  || $shop->getTel()) {?>
            <p><?php echo $shop->getEmail();?></p>
          <p><?php echo $shop->getTel();?></p>
            <?php } else {?>
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
      <?php foreach ($products as $product) { ?>
        <div class="col-6 col-md-3 mb-2 wow bounceIn">
          <a href="<?php echo $ROOT.'produit.php?id='.$product->getId() ?>">
          <div class="runb-card">
            <div class="runb-card-header">
            <img src="<?php echo $ROOT . '/img/uploads/' . $product->getImage() ?>" class="img-fluid w-100 mb-5" alt="Image">
            </div>
            <div class="runb-card-body">
              <div class="shop-detail">
                <h4><?php echo $product->getNom() ?></h4>
                <span class="price"><?php echo $product->getPrix() ?> €</span>
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