<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Canton
 *
 * @author Anthony
 */
class Canton {
    private $idCanton;
    private $nameCanton;
    private $idProvince;
    
    
    public function canton() {
      
    }
    function getIdCanton() {
        return $this->idCanton;
    }

    function setIdCanton($idCanton) {
        $this->idCanton = $idCanton;
    
    }
    
    function getIdProvince() {
        return $this->idProvince;
    }

    function setIdProvince($idProvince) {
        $this->idProvince = $idProvince;
    
    }
    
    function getNameCanton() {
        return $this->nameCanton;
    }

    function setNameCanton($nameCanton) {
        $this->nameCanton = $nameCanton;
    }
}


