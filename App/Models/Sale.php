<?php



namespace App\Models;
use App\Models\Database\Connection;
use App\Models\Seller;
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
              INSERT INTO vendas (vendedor_id,  comissao, valor_venda )
                     VALUES (:vendedor_id, :comissao, :valorvenda) ");
        $seler = new Seller;
        $data = $seler->getSeleFromId($dataset['id']);

        $query->execute(
            array(
                ':vendedor_id' => $data['id'], 
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

    public function getSalesFromIdSeler( array $data ) : array
    {

        $query = $this->conn->prepare(" SELECT T1.id, 
              T1.valor_venda, T1.comissao, T2.email, T2.nome, 
                DATE_FORMAT(T1.data_venda,'%d/%m/%Y') as data_venda
                FROM vendas AS T1 
                    INNER JOIN vendedores AS T2 ON T2.id = T1.vendedor_id 
                WHERE T1.vendedor_id = :id ");

        $query->execute([':id' => $data['id'] ]);
        $allResults = $query->fetchAll(PDO::FETCH_ASSOC);

        if (empty($allResults)) {
            return [];
        }

        return $allResults;
    }


    public function deleteOnSale( $sale ) 
    {

        $query = $this->conn->prepare(" DELETE  FROM vendedores WHERE id = {$sale} ");
        $query->execute();
      
        $count = $query->rowCount();
        return $count;
    }

}