<?php



use App\Email\SendMail;

// require_once "SendMail.php";


class EmailCustom {
	public static function contentMail(array $client) 
	{
        if ($client) {

            $destino = str_replace("_", ".", $client['email']);
            $destinatario =  array($destino, 'valdirpiresba@gmail.com');

            print_r($destinatario);

            $assunto = "Nova Transferência Recebida ";
            $mensagem = "
                Olá {$client['titular']} ! <br/><br/> 
                Você recebeu uma {$client['tipo_transacao']} da conta {$client['conta_origem']} no valor de R$ {$client['balancevalue']},00 <br/><br/>  
                Acesse sua conta e confira suas <a href='http://192.168.1.6/mobile/login'>Acessar o app </a> \n\n\n".PHP_EOL; 
                
                $mail = new SendMail();
                $mail->userSendMail($assunto, $mensagem, $destinatario);

                if($mail) {
                   print '<div>E-mail enviado com sucesso !</div>';
                }

        }
	}
}
