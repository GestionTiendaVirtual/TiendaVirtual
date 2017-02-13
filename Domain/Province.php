<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Province
 *
 * @author Anthony
 */
class Province {
    private $idProvince;
    private $nameProvince;
    
    
    public function province() {
      
    }

    
    function getIdProvince() {
        return $this->idProvince;
    }

    function setIdProvince($idProvince) {
        $this->idProvince = $idProvince;
    
    }
    
    function getName() {
        return $this->nameProvince;
    }

    function setNameProvince($nameProvince) {
        $this->nameProvince = $nameProvince;
    }

}



