<?php

include_once 'Data.php';
require_once '../../phpmailer/PHPMailerAutoload.php';

//require './Resources/PHPMailer/PHPMailerAutoload.php';
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
            
//            $mail = new PHPMailer();
//            $mail->IsSMTP();
//            $mail->SMTPAuth = true;
//            $mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
//            $mail->Username = "teamdevelopingtcu@gmail.com"; // Correo completo a utilizar
//            $mail->Password = "teamtcu123"; // Contraseña
//            $mail->Port = 25; // Puerto a utilizar
//            $mail->From = "teamdevelopingtcu@gmail.com"; // Desde donde enviamos (Para mostrar)
//            $mail->FromName = "MGA Soluciones";
//            $mail->AddAddress($email); // Esta es la dirección a donde enviamos
////            $mail->AddCC("cuenta@dominio.com"); // Copia
////            $mail->AddBCC("cuenta@dominio.com"); // Copia oculta
//            $mail->IsHTML(true); // El correo se envía como HTML
//            $mail->Subject = "Recuperar contraseña"; // Este es el titulo del email.
//            $body = "Se solicitó la recuperarción de la contraseña<br />";
//            $body .= "Esta es su contraseña temporal<strong>1245678</strong>";
//            $mail->Body = $body; // Mensaje a enviar 
////            $mail->AddAttachment("imagenes/imagen.jpg", "imagen.jpg");
//            $exito = $mail->Send(); // Envía el correo.
     
//            $mail = new PHPMailer();
//            $mail->isSMTP();
//            $mail->Host = 'smtp.gmail.com';
//            $mail->Port = 587;
//            $mail->SMTPSecure = 'tls';
//            $mail->SMTPAuth = true;
//            $mail->Username = "teamdevelopingtcu@gmail.com";
//            $mail->Password = "teamtcu123";            
//            $mail->setFrom('teamdevelopingtcu@gmail.com', 'MGA Soluciones');
//            $mail->addAddress('michael.melendezm@gmail.com', 'MGA Store');
//            $mail->Subject = 'Welcome to YARR Blog!';
//            $message = "Hello, this is a email message from MGA soluciones";
//            $mail->msgHTML($message);
//            $exito = $mail->send();

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
