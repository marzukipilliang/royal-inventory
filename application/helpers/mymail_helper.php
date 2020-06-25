<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

function sendMail(){
	$CI =& get_instance();
	$CI->load->model('m_queued');
	
	//Load CRUD Library
	$CI->load->library('mycrud', array('tblname' => 'ms_config'));
	$rs = $CI->mycrud->getById('config_name', 'email_smtp');
	$cf = json_decode($rs->json_value);

	$eq = $CI->m_queued->getQueued();
	if ($eq){    


		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = $cf->host;                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = $cf->username;                     // SMTP username
			$mail->Password   = $cf->password;                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = $cf->port;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom($cf->username, 'Dashboard AC');
			$mail->addAddress($eq->to, $eq->to);     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo($cf->username, 'Information');
			
			if (!empty($eq->cc)) $mail->addCC($eq->cc);
			if (!empty($eq->bcc)) $mail->addBCC($eq->bcc);

			// Attachments
			if (!empty($eq->attachment)) $mail->addAttachment($eq->attachment); // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $eq->subject;
			$mail->Body    = $eq->body;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			$res = 'Message has been sent to '.$eq->to;
			$std = 2;

		} catch (Exception $e) {
			$res = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			$std = 3;
			
		}

		$obj = array(
			'date_updated' => date('Y-m-d H:i:s'),
			'status_data' => $std,
			'result' => $res
		);
		$CI->m_queued->updateQueued($eq->id, $obj);
	}
}