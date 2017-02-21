<?php

include_once 'Data.php';
require_once '../../phpmailer/PHPMailerAutoload.php';

/**
 * Description of RecoverPasswordData
 *
 * @author mm
 */
class RecoverPasswordData extends Data {

    function recoverPasswordClient($email) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryEmail = mysqli_query($conn, "select emailclient from tbclient where emailclient = '" . $email . "'");
        $rowEmail = mysqli_fetch_array($queryEmail);
        mysqli_close($conn);
        $email = $rowEmail[0];
        if (strlen($email)) {
            
            if ($exito) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>
