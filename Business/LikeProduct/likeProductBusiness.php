<?php

include_once '../../Data/LikeProductData.php';
/**
 * Description of likeProductData
 *
 * @author mm
 */
class likeProductBusiness {
    public $likeProductDate;
    
    public function likeProductBusiness(){
        $this->likeProductDate = new likeProductData();        
    }
      
    public function insertLikeProduct($idProduct, $idUser){
        return $this->likeProductDate->insertLikeProduct($idProduct, $idUser);
    }
     public function updateLikeProduct($idProduct, $idUser){
        return $this->likeProductDate->updateLikeProduct($idProduct, $idUser);
    }
    
    public function getLikeProduct($idProduct, $idUser){
        return $this->likeProductDate->getProductLiked($idProduct, $idUser);
    }
}
