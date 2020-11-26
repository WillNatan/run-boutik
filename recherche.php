<?php
$ROOT = './';
include_once($ROOT . 'layout/front/header.php');
include_once($ROOT . 'repository/ShopRepository.php');
include_once($ROOT . 'classes/Shop.php');
$shopRepository = new ShopRepository();
$shops = $shopRepository->findBy(['is_online'=>1]);

if($_SERVER['REQUEST_METHOD'] === "GET"){
  if(isset($_GET['nomboutique']) && !empty($_GET['nomboutique'])){
    $nom = htmlspecialchars($_GET['nomboutique']);
  $shops = $shopRepository->search(['nom'=>$nom]);
  }
}

?>
<section class="head">
  <h4 class="text-center">Rechercher une boutique</h4>
</section>
<section class="hero search">
<div class="container">
      <div class="row">
        <div class="col-md-3 mb-2 mb-md-0">
          <div class="runb-card height-auto">
            <div class="runb-card-header">
              <h4 class="p-3">Recherche</h4>
            </div>
            <div class="runb-card-body">
              <form action="" method="GET">
                <div class="form-group">
                  <label for="">Nom de la boutique</label>
                  <input type="text" name="nomboutique" class="form-control" placeholder="Nom">
                </div>
                <div class="form-group">
                  <button class="btn-runb-primary btn-block">Rechercher</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row h-100">
            <?php foreach ($shops as $shop) { ?>
              <div class="col-md-4 mb-2 wow bounceIn">
                <div class="runb-card h-100">
                  <div class="runb-card-body">
                    <a href="<?php echo $ROOT . 'boutique.php?id=' . $shop->getId() ?>" class="text-center">
                      <img src="<?php echo $ROOT . '/img/uploads/' . $shop->getImage() ?>" class="img-fluid w-75 mb-5" alt="Logo ">
                    </a>
                    <div class="shop-detail">
                      <a href="<?php echo $ROOT . 'boutique.php?id=' . $shop->getId() ?>">
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
      </div>
    </div>
</section>
<?php
include_once($ROOT . 'layout/front/footer.php')
?>