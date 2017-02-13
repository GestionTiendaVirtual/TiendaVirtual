<?php

class star{


public $idCalification;
public $idProduct;
public $idUser;
public $calification;

public function star( $idProduct, $idUser, $calification) {   
    $this->idProduct = $idProduct;
    $this->idUser = $idUser;
    $this->calification = $calification;
}

public function getIdCalification() {
    return $this->idCalification;
}

public function getIdProduct() {
    return $this->idProduct;
}

public function getIdUser() {
    return $this->idUser;
}

public function getCalification() {
    return $this->calification;
}

public function setIdCalification($idCalification) {
    $this->idCalification = $idCalification;
}

public function setIdProduct($idProduct) {
    $this->idProduct = $idProduct;
}

public function setIdUser($idUser) {
    $this->idUser = $idUser;
}

public function setCalification($calification) {
    $this->calification = $calification;
}






}