<?php

include_once '../../Data/SendInformationModificationData.php';

/**
 * Description of NotifyCustomersBusiness
 *
 * @author mm
 */
class NotifyCustomersBusiness {
    
    public $sendInformation;
    
    
    public function NotifyCustomersBusiness(){
        $this->sendInformation = new SendInformationModificationData();
    }
    
    public function sendEmailClient(){
        $this->sendEmailClient();
    }
    
}
