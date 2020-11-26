<?php
$ROOT = './';
include_once($ROOT . 'layout/front/header.php');
include_once($ROOT . 'repository/ShopRepository.php');
include_once($ROOT . 'classes/Shop.php');
$shopRepository = new ShopRepository();
$shops = $shopRepository->findBy(['is_online'=>1]);
?>
<section class="hero">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-4 offset-lg-1">
        <img src="img/uploads/burger.png" class='img-fluid wow fadeInDown' data-wow-duration="2s" alt="Image">
      </div>
      <div class="col-md-6 col-lg-4 offset-lg-1 d-flex flex-column justify-content-center">
        <div class="text-center text-md-left wow fadeInDown" data-wow-duration="2s">
          <h1>Big Mac</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <span class="price">6,99 €</span>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="main-products p-0 p-md5">
  <h1 class="text-center mt-3 wow fadeIn" data-wow-duration="2s">Boutiques en vedette</h1>
  <div class="title-divider wow fadeIn" data-wow-duration="2s"></div>
  <div class="container mt-5">
    <div class="row">
      <?php foreach ($shops as $shop) { ?>
        <div class="col-md-4 mb-2 wow bounceIn">
          <div class="runb-card">
            <div class="runb-card-body">
              <a href="<?php echo $ROOT.'boutique.php?id='.$shop->getId() ?>" class="text-center">
              <img src="<?php echo $ROOT . '/img/uploads/' . $shop->getImage() ?>" class="img-fluid w-75 mb-5" alt="Logo ">
              </a>
              <div class="shop-detail">
                <a href="<?php echo $ROOT.'boutique.php?id='.$shop->getId() ?>">
                <h4><?php echo $shop->getNom() ?></h4>
                </a>
                <ul class="rate">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php
include_once($ROOT . 'layout/front/footer.php')
?>