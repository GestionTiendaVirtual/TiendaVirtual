<?php

include_once './likeProductBusiness.php';
session_start();

if(isset($_SESSION['idUser'])){
    
    $idProduct = $_POST['idProduct'];
    
    $likeBusiness = new likeProductBusiness();
    $result = $likeBusiness->updateLikeProduct($idProduct, $_SESSION['idUser']);
    
}