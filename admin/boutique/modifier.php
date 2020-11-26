<?php
$ROOT = '../../';
include_once($ROOT . 'layout/back/header.php');
if (isset($_GET['id'])) {
    include_once($ROOT . 'classes/Shop.php');

    $config = new Config();
    $db = $config->dbConnect();

    $query = "SELECT * FROM shop WHERE id=:id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    if ($stmt) {
        $stmt->setFetchMode(PDO::FETCH_CLASS, Shop::class);
        $shop = $stmt->fetch();
    } else {
        header('Location: ./');
    }
} else {
    header('Location: ./');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $oldImage = $shop->getImage();
    
    if (!empty($_FILES["image"]["name"]) && $oldImage != $_FILES["image"]["name"]) {
        $image = $_FILES["image"]["name"] ;
        $target_dir = $ROOT . "img/uploads/";
        $target_file = basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if (file_exists($target_dir.$target_file)) {
            $uploadOk = 0;
          }

          if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
          }  
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $image = $oldImage;
    }

    $shopName = !empty($_POST['nom']) ? $_POST['nom'] : $shop->getNom();

    $tel = !empty($_POST['tel']) ? $_POST['tel'] : $shop->getTel();

    $email = !empty($_POST['email']) ? $_POST['email'] : $shop->getEmail();
    $desc = !empty($_POST['desc_courte']) ? $_POST['desc_courte'] : $shop->getDesc();
    $shop->setNom($shopName);
    $shop->setEmail($email);
    $shop->setTel($tel);
    $shop->setImage($image);
    $shop->setDesc($desc);
    if(isset($_POST['isonline']) && $_POST['isonline'] === 'on'){
        $shop->setIs_online(1);
    }
    else{
        $shop->setIs_online(0);
    }


    function dismount($object)
    {
        $reflectionClass = new ReflectionClass(get_class($object));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }

    $sql = $db->prepare("UPDATE shop SET nom = :nom,  image = :image, tel = :tel, email = :email, desc_courte = :desc_courte, is_online=:is_online WHERE id=:id");
    $sql->execute(dismount($shop));
    header('Location: ./');
}
?>
<h4>Ma boutique <small>Modification</small></h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="dash-card">
                <div class="dash-body pt-1 pb-1 p-md-5">
                    <div class="container">
                        <form class="row" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                                <div class="logo-content" style="background: url('<?php echo $ROOT ?>img/uploads/<?php echo $shop->getImage(); ?>')">
                                    <input type="file" name="image" id="imageSelect" class="d-none" value="<?php echo $shop->getImage(); ?>">
                                    <div class="image-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                <div class="form-group mt-2 w-100">
                                    <input type="text" class="form-control w-100" placeholder="Nom de la boutique" required name="nom" value="<?php echo $shop->getNom(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                <h4 class="text-dark">Informations sur la boutique <small>Contact</small></h4>
                                <div class="border-bottom"></div>
                                <div class="form-group mt-3">
                                    <label for="">Numéro de téléphone</label>
                                    <input type="text" name="tel" placeholder="Numéro de téléphone" class="form-control" value="<?php echo $shop->getTel(); ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Adresse Email</label>
                                    <input type="text" name="email" placeholder="Adresse Email" class="form-control" value="<?php echo $shop->getEmail(); ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Description</label>
                                    <textarea name="desc_courte" rows="5" class="form-control"><?php echo $shop->getDesc(); ?></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <input id="is_online" type="checkbox" name="isonline" <?php echo $shop->getIs_online() == 1 ? 'checked' : '' ?>>
                                    <label for="is_online">Publier la boutique</label>
                                </div>
                                
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn-runb-primary">Valider les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var imageBtn = document.querySelector('.image-icon');
    var imageSelector = document.querySelector('#imageSelect');
    var logoContent = document.querySelector('.logo-content');
    imageBtn.addEventListener('click', () => {
        imageSelector.click();
    })
    imageSelector.onchange = e => {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = (e) => {
            logoContent.style.backgroundImage = 'url(' + e.target.result + ')'
        }
        reader.readAsDataURL(file);
    }
</script>
<?php include_once($ROOT . 'layout/back/footer.php'); ?>