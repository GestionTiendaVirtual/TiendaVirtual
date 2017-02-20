<?php
include_once "../../Data/Ranking.php";
class RankingBusiness extends Ranking {
    public function showBusiness($idproduct){
        return $this->show($idproduct);
    }
    public function markBusiness($idProduct){
        return $this->mark($idProduct);
    }
    public function calificationBusiness($idProduct,$value){
        return $this->calification($idProduct, $value);
        
    }
}
