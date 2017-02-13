<?php

include_once '../CanceledSales/CanceledSalesBusiness.php';
include_once '../../Domain/CanceledSales.php';

session_start();


if(isset($_SESSION['carrito'])){
    
    $idProduct = $_POST['idProduct'];
    
    for ($i = 0; $i < sizeof($_SESSION['carrito']); $i++){
        
        $product = $_SESSION['carrito'][$i];
        $infoProduct = split(";",$product);
        if($infoProduct[0] == $idProduct){
            unset($_SESSION['carrito'][$i]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            break;
        }
        
    }


    /* Se registra la eliminacion en la tabla de compras caceladas */    
    $instCanceledSales = new CanceledSalesBusiness();
    $canceledSale = new CanceledSales($_SESSION['idUser'],$idProduct);
    $result = $instCanceledSales->insertCanceledSaleBusiness($canceledSale);

}