<?php

include_once './RecoverPasswordClientBusiness.php';


if (isset($_POST['txtEmail'])) {

    $email = $_POST['txtEmail'];
    if (strlen($email) > 3) {
        $recoverPassword = new RecoverPasswordClientBusiness();
        $result = $recoverPassword->recoverPassword($email);

        if ($result) {
            header('location:../../index.php?successEmail=success');
        } else {
            header('location:../../index.php?errorData=errorData');
        }
    } else {
        header('location:../../index.php?errorData=errorData');
    }
}
