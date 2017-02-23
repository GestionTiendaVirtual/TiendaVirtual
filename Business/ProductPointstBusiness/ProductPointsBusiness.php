<?php

include_once '../../Data/ProductPointsData.php';

/**
 * Description of ProductPointsBusiness
 *
 * @author mm
 */
class ProductPointsBusiness {
    
    public $productPoints;
    
    public function ProductPointsBusiness(){
        $this->productPoints = new ProductPointsData();
    }
    
    public function setProductPoints($idProduct){
        return $this->productPoints->setProductPoints($idProduct);
    }
}
