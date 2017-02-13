<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of District
 *
 * @author Anthony
 */
class District {
    private $idDistrict;
    private $nameDistrict;
    private $idCanton;
    
    
    public function district() {
      
    }
    
    function getIdCanton() {
        return $this->idCanton;
    }

    function setIdCanton($idCanton) {
        $this->idCanton = $idCanton;
    
    }
    
    function getNameDistrict() {
        return $this->nameDistrict;
    }

    function setNameDistrict($nameDistrict) {
        $this->nameDistrict = $nameDistrict;
    
    }
    
    function getIdDistrict() {
        return $this->idDistrict;
    }

    function setIdDistrict($idDistrict) {
        $this->idDistrict = $idDistrict;
    }
}



    
    





