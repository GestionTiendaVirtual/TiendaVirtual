<?php
include_once './RecoverPasswordClientBusiness.php';


if($_POST['txtEmail']){
    
    $email = $_POST['txtEmail'];
    $recoverPassword = new RecoverPasswordClientBusiness();
    $result = $recoverPassword->recoverPassword($email);
    
    if($result){
        header('location: ../../index.php?successEmail=success');
    }else{
        header('location: ../../index.php?error=errorData');
    }
    
    
}
