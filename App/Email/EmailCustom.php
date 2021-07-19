<?php



namespace App\Email;

use App\Email\SendMail;

class EmailCustom {
	public static function contentMail(array $sales) 
	{
           if ($sales) 
           {
                $destino = str_replace("_", ".", $sales[0]['email']);
                $destinatario =  array($destino, 'valdirpiresba@gmail.com');
                $assunto = "RELATORIO DIÁRIO DE VENDAS";
                $mensagem = " Olá {$sales[0]['nome']}, veja seu relatório diário de compras. <br/> <br/> \n\n\n".PHP_EOL;
                
                $mensagem .= " <table >
                <thead
                    <tr>
                        <th scope='col'>Nome</th>
                        <th scope='col'>E-mail</th>
                        <th scope='col'>Comissão</th>
                        <th scope='col'>V. Venda</th>
                        <th scope='col'>Data Venda</th>
                      
                    </tr>
                </thead> ";

                $mensagem .= "<tbody>";

                   foreach($sales as $sale ) {
                        $mensagem .= "<tr>";
                         $mensagem .= "<td scope='col'>" .$sale['nome']. "</td>";
                         $mensagem .= "<td scope='col'>" .$sale['email']. "</td>";
                         $mensagem .= "<td scope='col'>R$" .$sale['comissao']. "</td>";
                         $mensagem .= "<td scope='col'>R$" .$sale['valor_venda']. "</td>";
                         $mensagem .= "<td scope='col'>". $sale['data_venda']. "</td>";
                     $mensagem .= " </tr> ";
                   }

                $mensagem .= "</tbody>";
                $mensagem .= "</table>";
                        
                $mail = new SendMail();
                $mail->userSendMail($assunto, $mensagem, $destinatario);

                if($mail) {
                   print '<div>E-mail enviado com sucesso !</div>';
                }
            }
	}
}


