<?php

include_once 'Data.php';
require_once '../../Resources/PHPMailer/PHPMailerAutoload.php';

/**
 * Description of RecoverPasswordData
 *
 * @author mm
 */
class RecoverPasswordData extends Data {

    function recoverPasswordClient($email) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryEmail = mysqli_query($conn, "select emailclient, nameclient, "
                . "passwordclient from tbclient where emailclient = '" . $email . "'");
        $row = mysqli_fetch_array($queryEmail);
        mysqli_close($conn);
        $email = $row['emailclient'];
        if (strlen($email)) {

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "mgasoluciones17@gmail.com";
            $mail->Password = "adminMGA";
            $mail->setFrom('mgasoluciones17@gmail.com', 'MGA Store');
            $mail->addAddress($email,$row['nameclient']);
            $mail->Subject = 'Solicitud recuperar contraseña';
            $message = "Su contraseña temporal es ".$row['passwordclient'];
            $mail->msgHTML($message);
            $success = $mail->send();

            if ($success) {
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
