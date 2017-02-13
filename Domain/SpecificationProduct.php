<?php


/**
 * Description of SpecificationProduct
 *
 * @author Michael Meléndez Mesén
 */
class SpecificationProduct {
    
    private $idSpecification;
    private $nameSpecification;
    private $valueSpecification;
    
    
    public function SpecificationProduct($nameSpecification, $valueSpecification){
        $this->nameSpecification = $nameSpecification;
        $this->valueSpecification = $valueSpecification;
    }
    public function getIdSpecification() {
        return $this->idSpecification;
    }

    public function setIdSpecification($idSpecification) {
        $this->idSpecification = $idSpecification;
    }
    
    public function getNameSpecification() {
        return $this->nameSpecification;
    }

    public function setNameSpecification($nameSpecification) {
        $this->nameSpecification = $nameSpecification;
    }
    
    public function getValueSpecification(){
        return $this->valueSpecification;
    }
    public function setValueSpecification($valueSpecification){
        $this->valueSpecification = $valueSpecification;
    }
    
    
    
    
}
