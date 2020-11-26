<?php
$ROOT = '../../';
include_once($ROOT . 'classes/User.php');
include_once($ROOT . 'classes/Shop.php');
include_once($ROOT . 'layout/back/header.php');
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = new Config();
    $db = $config->dbConnect();
    $shop = new Shop();
    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];
        $shop->setImage($image);
        $target_dir = $ROOT . "img/uploads/";
        $target_file = basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo 'tmp';
        }

        if (file_exists($target_dir . $target_file)) {
            $uploadOk = 0;
            echo 'exists';
        }

        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
            echo "size";
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
            echo "type";
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
    } else {
        $shop->setImage('');
    }

    $shopName = $_POST['nom'];

    $tel =  $_POST['tel'];

    $email = $_POST['email'];
    $shop->setId(NULL);
    $shop->setNom($shopName);
    $shop->setEmail($email);
    $shop->setTel($tel);
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

    $sql = $db->prepare("INSERT INTO shop (id, nom,tel,image,email) VALUES (:id, :nom, :tel, :image,:email)");
    $sql->execute(dismount($shop));
    $shop->setId($db->lastInsertId());
    $user->setShop($shop);
    $userUpdate = $db->prepare("UPDATE user SET shop_id=:shopid WHERE id=:id");
    $userUpdate->bindValue(':shopid',$db->lastInsertId());
    $userUpdate->bindValue(':id',$user->getId());
    $userUpdate->execute();
    header('Location: ./');
}

?>

<h4>Ma boutique <small>Création</small></h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="dash-card">
                <div class="dash-body">
                    <div class="container">
                        <form class="row" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                                <div class="logo-content" style="background: url('<?php echo $ROOT ?>img/uploads/logo.png')">
                                    <input type="file" name="image" id="imageSelect" class="d-none">
                                    <div class="image-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                <div class="form-group mt-2 w-100">
                                    <input type="text" class="form-control w-100" required placeholder="Nom de la boutique" name="nom">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                <h4 class="text-dark">Informations sur la boutique <small>Contact</small></h4>
                                <div class="border-bottom"></div>
                                <div class="form-group mt-3">
                                    <label for="">Numéro de téléphone</label>
                                    <input type="text" name="tel" placeholder="Numéro de téléphone" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Adresse Email</label>
                                    <input type="text" name="email" placeholder="Adresse Email" class="form-control">
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