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
              INSERT INTO vendas (nome, email, comissao, valor_venda )
                     VALUES (:nome, :email, :comissao, :valorvenda) ");
        $seler = new Seller;
        $data = $seler->getSeleFromId($dataset['id']);

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

    public function getAllSales() : array
    {
        $query = $this->conn->prepare(" SELECT * FROM vendas ORDER BY data_venda ASC ");
        $query->execute();
        $allResults = $query->fetchAll(PDO::FETCH_ASSOC);

        if (empty($allResults)) {
            return [];
        }

        return $allResults;
    }

}