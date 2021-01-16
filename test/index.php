<?php 

$url = explode("/",$_GET['url']);

require "Controller/" .$url[0]. ".php";
require "View/View.php";

$controller = new $url[0];

if(isset($url[1])){
    $controller->{$url[1]}();
}
?>
