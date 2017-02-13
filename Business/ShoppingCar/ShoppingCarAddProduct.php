<?php
session_start();
include_once '../../Domain/Product.php';

if(isset($_SESSION['carrito'])){
    
    $idProduct = $_POST['idProduct'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $serie = $_POST['serie'];
    $price = $_POST['price'];
    
    $information = $idProduct .';'.$name.';'.$brand.';'.$model.';'.$serie.';'.$price;
  
    array_push($_SESSION['carrito'], $information);
    
}