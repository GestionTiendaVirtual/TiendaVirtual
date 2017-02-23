<?php
include_once '../../Data/ModificationsProductData.php';

/**
 * Description of ModificationsProductBusiness
 *
 * @author mm
 */
class ModificationsProductBusiness {
    
    public $modificationData;
    
    public function ModificationsProductBusiness(){
        $this->modificationData = new ModificationsProductData();
    }
    
    public function setBasicAttributes($productModification){
        return $this->modificationData->setBasicAttributes($productModification);
    }
    
    public function setAttributeSpecification($idProduct){
        return $this->modificationData->setAttributeSpecification($idProduct);
    }
    public function setAttributeColor($idProduct){
        return $this->modificationData->setAttributeColor($idProduct);
    }
    public function setAttributeImage($idProduct){
        return $this->modificationData->setAttributeImages($idProduct);
    }
    
}
