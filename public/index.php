<?php

require '../config/Autoloader.php';

App\Autoloader::register();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}
else{
    $p = 'home';
}


ob_start();
if($p === 'home'){
    require '../views/front/index.php';
}

$content = ob_get_clean();

require '../views/front/templates/frontend.php';
