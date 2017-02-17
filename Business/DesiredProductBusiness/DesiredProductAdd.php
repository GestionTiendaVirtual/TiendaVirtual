<?php
include_once '../../Business/DesiredProductBusiness/DesiredProductBusiness.php';
session_start();


if(isset($_SESSION['carrito'])){
    
    $idProduct = $_POST['idProduct'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $serie = $_POST['serie'];
    $price = $_POST['price'];
    $date = date('Y-m-d');
    $information = $idProduct .';'.$name.';'.$brand.';'.$model.';'.$serie.';'.$price;
  
    array_push($_SESSION['desired'], $information);
    
    $desiredBusiness = new DesiredProductBusiness();
    $result = $desiredBusiness->insertDesiredProduct($idProduct,$_SESSION['idUser'], $date);
    
}