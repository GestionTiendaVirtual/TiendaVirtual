<?php

/**
 * Description of typeAccount
 *
 * @author Gustavo
 */
class TypeAccount {
    public $idTypeAccount;
    public $nameTypeAccount;
    
    public function TypeAccount($idTypeAccount, $nameTypeAccount){
        $this->idTypeAccount = $idTypeAccount;
        $this->nameTypeAccount = $nameTypeAccount;
    }
}