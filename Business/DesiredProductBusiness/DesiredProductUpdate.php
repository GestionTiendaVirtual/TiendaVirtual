<?php

include_once './DesiredProductBusiness.php';
session_start();

if(isset($_SESSION['desired'])){
    
    
    $desiredBusiness = new DesiredProductBusiness();
    
    $idProduct = $_POST['idProduct'];
  
    
    for ($i = 0; $i < sizeof($_SESSION['desired']); $i++){
        
        $product = $_SESSION['desired'][$i];
        $infoProduct = split(";",$product);
        if($infoProduct[0] == $idProduct){
            unset($_SESSION['desired'][$i]);
            $_SESSION['desired'] = array_values($_SESSION['desired']);
            $result = $desiredBusiness->updateDesiredProduct($idProduct,$_SESSION['idUser']);
            break;
        }
        
    }
 
       
}