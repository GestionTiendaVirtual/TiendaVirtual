<?php

include_once './Data/Email.php';
class DailyEmail{
    public function sendEmailBusi(){
        $emai=new Email();
        $emai->sendEmail();
    }
}
