<?php

class sexualPreferences {

    private $idSexPreferences;
    private $nameSexPreferences;
 
    public function sexualPreferences($idSexPreferences, $nameSexPreferences) {
        $this->idSexPreferences = $idSexPreferences;
        $this->nameSexPreferences = $nameSexPreferences;
    }

    
    public function getIdSexPreferences() {
        return $this->idSexPreferences;
    }

    public function getNameSexPreferences() {
        return $this->nameSexPreferences;
    }

    public function setIdSexPreferences($idSexPreferences) {
        $this->idSexPreferences = $idSexPreferences;
    }

    public function setNameSexPreferences($nameSexPreferences) {
        $this->nameSexPreferences = $nameSexPreferences;
    }





}
