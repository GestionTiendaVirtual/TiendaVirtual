<?php

include_once './Data/Email.php';
class DailyEmail{
    
    public function loadProductBusiness(){
       $emai=new Email();
       $emai->loadProduct();
    }
    public function sendEmailBusi(){
        $emai=new Email();
        $emai->sendEmail();
    }
}
