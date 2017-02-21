<?php

include_once '../../Data/RecoverPasswordData.php';
/**
 * Description of RecoverPasswordClientBusiness
 *
 * @author mm
 */
class RecoverPasswordClientBusiness {
    
    public $recoverData;
    
    public function RecoverPasswordClientBusiness(){
        $this->recoverData = new RecoverPasswordData();
    }
    
    public function recoverPassword($email){
        return $this->recoverData->recoverPasswordClient($email);
    }
    
    
    
}
