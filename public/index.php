<?php 
    require_once '../vendor/autoload.php';
$router = new AltoRouter();

require './config/route.php';

$match = $router->match();


if (is_array($match) ) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
        $params = $match['params'];
        ob_start();
         require "../templates/{$match['target']}.php";
         $pageContent = ob_get_clean()
;    }
    require '../elements/layout.php';
} else {
    echo 'error 404';
}

// require '../elements/footer.php';



