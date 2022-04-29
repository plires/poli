<?php
//incluimos la clase PHPMailer
require_once( __DIR__ . '/../vendor/autoload.php' );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

  class App 
  {

    function sendmail($setFromEmail, $setFromName, $addReplyToEmail, $addReplyToName, $addAddressEmail, $addAddressName, $subject, $template){

      //Create a new PHPMailer instance
      $mail = new PHPMailer;
      
      if (ENVIRONMENT === 'local') {

        $mail->isSendmail();

      } else {

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        // $mail->SMTPDebug = 4;
        $mail->isSMTP();
        $mail->Host       = SMTP;
        $mail->SMTPAuth   = true; 
        $mail->Username   = USERNAME; 
        $mail->Password   = PASSWORD; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
        $mail->Port       = EMAIL_PORT;
        $mail->CharSet    = EMAIL_CHARSET;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

      }

      //Establecer desde donde será enviado el correo electronico
      $mail->setFrom($setFromEmail, $setFromName);
      //Establecer una direccion de correo electronico alternativa para responder
      $mail->addReplyTo($addReplyToEmail, $addReplyToName);
      //Establecer a quien será enviado el correo electronico
      $mail->addAddress($addAddressEmail, $addAddressName);
      //Establecer el asunto del mensaje
      $mail->Subject = $subject;
      //convertir HTML dentro del cuerpo del mensaje
      $mail->msgHTML($template);
        //send the message, check for errors
      if (!$mail->send()) {
        return false;
      } else {
        return true;
      }

    }

    function prepareEmailFormContacto($post) {

      $template_user = file_get_contents( __DIR__ . '/../includes/emails/contacts/contacts-to-user.php');
      $template_client = file_get_contents( __DIR__ . '/../includes/emails/contacts/contacts-to-client.php');
      
      //configuro las variables a remplazar en el template
      $vars = array(
        '{instagram}',
        '{name_client}',
        '{email_client}',
        '{origin}',
        '{name_user}',
        '{last_name_user}',
        '{email_user}',
        '{phone_user}',
        '{comments_user}',
        '{date}',
        '{base}'
      );

      $values = array( 
        RRSS_INSTAGRAM,
        NAME_CLIENT,
        EMAIL_CLIENT,
        $post['origin'],
        $post['name'],
        $post['last_name'],
        $post['email'],
        $post['phone'],
        $post['comments'],
        date('d-m-Y'),
        BASE 
      );

      //Remplazamos las variables por las marcas en los templates
      $template_user = str_replace($vars, $values, $template_user);
      $template_client = str_replace($vars, $values, $template_client);

      // Enviar mail al usuario
      $send = $this->sendmail(
        EMAIL_CLIENT, // Remitente 
        NAME_CLIENT, // Nombre Remitente 
        EMAIL_CLIENT, // Responder a:
        NAME_CLIENT, // Remitente al nombre: 
        $post['email'], // Destinatario 
        $post['name'], // Nombre del destinatario
        'Successful Send!', // Asunto 
        $template_user // Template usuario
      );

      // Enviar mail al Cliente
      $send = $this->sendmail(
        $post['email'], // Remitente 
        $post['email'], // Nombre Remitente 
        $post['email'], // Responder a:
        $post['email'], // Remitente al nombre: 
        EMAIL_CLIENT, // Destinatario 
        NAME_CLIENT, // Nombre del destinatario
        'Nueva consulta desde el ' . $post['origin'], // Asunto 
        $template_client // Template usuario
      );

      return $send;

    }
   
  }

?>