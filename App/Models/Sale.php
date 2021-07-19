<?php



namespace App\Models;
use App\Models\Database\Connection;
use \PDO;


class Sale 
{
    private  $conn;

    public function __construct() 
    {
        $connect = new Connection;
        $this->conn = $connect->getConn();
    }

    public function addSale( array $dataset ) : array
    {
        $query = $this->conn->prepare("
              INSERT INTO vendas (nome, email, comissao, valor_venda )
                     VALUES (:nome, :email, :comissao, :valorvenda) ");

        
        $data = $this->getSeleFromId($dataset['id']); 

        $query->execute(
            array(
                ':nome' => $data['nome'], 
                ':email' => $data['email'], 
                ':comissao' => $dataset['comissao'],
                ':valorvenda' => $dataset['valor_venda']) );

        $lastInsertId = $this->conn->lastInsertId();

        $newSale = 
            array(
                'id' => $lastInsertId,
                'nome' => $data['nome'],
                'email' => $data['email']
        );

        if (empty($lastInsertId)) {
            return [];
        }

        return $newSale;
    }


    private function getSeleFromId($selerId) : array
    {
        $query = $this->conn->prepare(" SELECT nome, email 
                                          FROM vendedores WHERE id = :currentid ");

        $query->execute([':currentid' => $selerId]);

        $allResults = $query->fetch(PDO::FETCH_ASSOC);
        return $allResults;
    }

}