<?php
$ROOT = './';
include_once($ROOT . 'layout/front/header.php');
include_once($ROOT . 'repository/ProductRepository.php');
include_once($ROOT . 'classes/Product.php');
$productRepository = new ProductRepository();
$product = $productRepository->findOneBy(['id'=>$_GET['id']]);
?>
<section class="hero">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-4 offset-lg-1">
        <div id="product-block" class="wow fadeIn">
        <img src="<?php echo $product->getImage() ? "img/uploads/".$product->getImage(): 'img/defaultProduct.jpg' ?>" class='img-fluid' alt="Image">
        </div>
      </div>
      <div class="col-md-6 col-lg-4 offset-lg-1 d-flex flex-column justify-content-center">
        <div class="text-center text-md-left shop-infos wow fadeIn">
          <h1><?php echo $product->getNom();?></h1>
          <h4>Description</h4>
          <p><?php echo $product->getDetails();?></p>
          <span class="price"><?php echo $product->getPrix();?> €</span>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include_once($ROOT . 'layout/front/footer.php')
?>