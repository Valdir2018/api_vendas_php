<?php


/**
*
* classe responsável por inserir os dados do formulario no banco de dados
*
*
*/


class Save {

   private $dados;
   
   /**
   *
   * Recebe por parâmetro a conexao
   */

   public function insert($conexao, $data = array() ) {
   	  $this->dados = $data;

   	  if (!empty($this->dados)) {
          $query = $conexao->prepare(' INSERT INTO clientes 
          	(id, nome, telefone, especialidade, curriculo, foto ) VALUES (NULL, :nome, :telefone, :especialidade, :curriculo, :foto) ');

          $query->bindParam(':nome', $this->dados['name']);
          $query->bindParam(':telefone', $this->dados['phone']);
          $query->bindParam(':especialidade', $this->dados['subject']);
          $query->bindParam(':curriculo', $this->dados['arquivo']);
          $query->bindParam(':foto', $this->dados['photograph']);
          $query->execute();

   	  }
   }
}