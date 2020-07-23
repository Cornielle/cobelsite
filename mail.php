<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $text = $_POST["message"];
        $phone = $_POST["phone"];
        $subject = $_POST["subject"];

        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.cobeltec.com';
        $mail->SMTPDebug = 0;                        // Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'bcornielle@cobeltec.com';                     // SMTP username
        $mail->Password   = '@Blakbleu.1';                               // SMTP password
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
     
        //Recipients
        $mail->setFrom('bcornielle@cobeltec.com', 'Mailer');
        $mail->addAddress('fmateob@cobeltec.com', 'Freddy Mateo');
        $mail->addAddress('bcornielle@cobeltec.com', 'Brian Cornielle');  

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Solicitud de servicio - ' .$name. ' - ' .$subject;
        $mail->Body    = '<table style="width:100%">
                <tr>
                    <td> Nombre:'.$name.'</td>
                </tr>
                <tr><td>Correo: '.$email.'</td></tr>
                <tr><td>Telefono: '.$phone.'</td>
                <tr><td>Descripcion de Solicitud: '.$text.'</td></tr>
            </table>';
        $mail->send();
        echo 'Tu solicitud ha sido enviada satisfactoriamente';
        } catch (Exception $e) {
            echo "Hubo un error al enviar el mensaje, favor verificar los campos nuevamente";
        }
?>
