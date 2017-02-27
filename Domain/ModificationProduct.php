<?php


/**
 * Description of ModificationProduct
 *
 * @author mm
 */
class ModificationProduct {
    
    private $idProduct;
    private $nameProduct;
    private $priceProduct;
    private $descriptionProduct;
    private $characteristicsProduct;
    private $colorProduct;
    private $specificationProduct;
    private $imagesProduct;
    
    
    public function ModificationProduct(){
        
    }
    
    
    public function setIdProduct($idProduct){
        $this->idProduct = $idProduct;
    }
    public function getIdProduct(){
        return $this->idProduct;
    }
    
    public function setNameProduct($nameProduct){
        $this->nameProduct = $nameProduct;
    }
    
    public function getNameProduct(){
        return $this->nameProduct;
    }
    
    public function setPriceProduct($priceProduct){
        $this->priceProduct = $priceProduct;
    }
    
    public function getPriceProduct(){
        return $this->priceProduct;
    }
    
    public function setDescriptionProduct($descriptionProduct){
        $this->descriptionProduct = $descriptionProduct;
    }
    public function getDescriptionProduct(){
        return $this->descriptionProduct;
    }
    
    public function setCharacteristicsProduct($characteristics){
        $this->characteristicsProduct = $characteristics;
    }
    
    public function getCharacteristicsProduct(){
        return $this->characteristicsProduct;               
    }
    public function setColorProduct($color){
        $this->colorProduct = $color;
    }
    
    public function getColorProduct(){
        return $this->colorProduct;
    }
    public function setSpecificationProduct($specification){
        $this->specificationProduct = $specification;
    }
    public function getSpecificarionProduct(){
        return $this->specificationProduct;
    }
    public function setImagesProduct($image){
        $this->imagesProduct = $image;
    }
    
    public function getImagesProduct(){
        return $this->imagesProduct;
    }
        
    
}
