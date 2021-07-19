<?php


namespace App\Email;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Email\Classes\Config;

class SendMail extends PHPMailer {
   
   public function __construct() 
   {
   	  parent::__construct();
   	  parent::IsSMTP();
   	  parent::IsHTML(true);
   	  $this->CharSet = 'UTF-8';
   	  $this->SMTPDebug = 0;
   	  $this->Port = Config::EMAIL_PORTA; 
   	  $this->Host = Config::EMAIL_HOST; 
	   
      $this->SMTPAuth = Config::EMAIL_SMTPAUTH; 
      $this->FromName    = Config::EMAIL_NOME;
      $this->From        = Config::EMAIL_USER;
      $this->Username    = Config::EMAIL_USER;
      $this->Password    = Config::EMAIL_SENHA;
       
   }
    public function userSendMail($assunto, $msg, $destinatarios = array()) 
    {
        $this->Subject      = $assunto;
        $this->Body         = $msg;

	    foreach($destinatarios as $email){
	    	  $this->AddAddress($email, $email); 
	    }
        if (parent::Send()):
            $this->ClearAllRecipients();

        else:
            echo "<h4>Mailer Error: " . $this->ErrorInfo . "</h4>";
      endif;
    }    
}

