<?php

include_once '../../Data/SpecificationproductData.php';

/**
 * Description of SpecificationproductBusiness
 *
 * @author mm
 */
class SpecificationproductBusiness {

    public $specificationData;

    public function SpecificationproductBusiness() {
        $this->specificationData = new SpecificationproductData();
    }

    public function getSpecificationProduct($idProduct) {
        return $this->specificationData->getSpecificationProduct($idProduct);
    }

    public function updateSpecificationProduct($specification) {
        return $this->specificationData->updateSpecificationProduct($specification);
    }

    public function insertSpecificationProduct($specification, $idProduct) {
        return $this->specificationData->insertSpecificationProduct($specification, $idProduct);
    }
    
    public function deleteSpecificationProduct($idSpecification){
        return $this->specificationData->deleteSpecificationProduct($idSpecification);
    }

}
