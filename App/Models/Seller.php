<?php



namespace App\Models;
use App\Models\Database\Connection;
use \PDO;


class Seller 
{
    private $conn;
    private $newArrayDataUser;

    public function __construct() 
    {
        $connect = new Connection;
        $this->conn = $connect->getConn();
    }

    public function addSeler(array $data) : array
    {
        $result = $this->getFromSeller($data['email']);
        
        if (!$result) {
             $query = $this->conn->prepare(" INSERT INTO vendedores (nome, email) VALUES (:nome, :email) ");
             $query->execute( array(':nome' => $data['nome'], ':email' => $data['email']) );

            $lastInsertId = $this->conn->lastInsertId();

            $this->newArrayDataUser = [
                'status' => 'OK', 
                'id' => $lastInsertId,
                'nome' => $data['nome'],
                'email' => $data['email']
            ];

            if (empty($lastInsertId)) {
                return [];
            }
        } else {

            return  $this->newArrayDataUser = [
                'status' => 'error',
                'error' => 'vendedor ja esta cadastrado',
                'code'=> 400
            ];
        }

        return $this->newArrayDataUser;
    }

    public function getAllSellers() : array
    {
        $query = $this->conn->prepare(" SELECT * FROM vendedores ");
        $query->execute();
        $allResults = $query->fetchAll(PDO::FETCH_ASSOC);

        if (empty($allResults)) {
            return [];
        }

        return $allResults;
    }


    public function getSeleFromId($selerId) : array
    {

        $query = $this->conn->prepare(" SELECT id, email 
                                          FROM vendedores WHERE id = :currentid ");

        $query->execute([':currentid' => $selerId]);

        $allResults = $query->fetch(PDO::FETCH_ASSOC);
        return $allResults;
    }

    private function getFromSeller(string $email) 
    {
        $query = $this->conn->prepare(" SELECT email FROM vendedores WHERE email = :email ");
        $query->execute( [':email' => $email ] );
        $result = $query->rowCount();

        return ($result >= 1 ) ? true : false;
    }

}