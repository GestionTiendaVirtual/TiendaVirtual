<?php

include_once '../../Data/DesiredProductData.php';
/**
 * Description of DesiredProductBusiness
 *
 * @author mm
 */
class DesiredProductBusiness {
   
    public $desiredData;
    
    public function DesiredProductBusiness(){
        $this->desiredData = new DesiredProductData();
    }
    
    public function insertDesiredProduct($idProduct, $idUser, $date){
        return $this->desiredData->insertDesiredProduct($idProduct, $idUser, $date);
    }
    
    public function getDesiredProducts($idUser){
        return $this->desiredData->getDesiredProducts($idUser);
    }
    public function updateDesiredProduct($idProduct, $idUser){
        return $this->desiredData->updateDesiredProduct($idProduct, $idUser);
    }
    
}
