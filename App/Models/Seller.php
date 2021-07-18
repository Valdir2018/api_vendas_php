<?php



namespace App\Models;
use App\Models\Database\Connection;
use \PDO;


class Seller {
    private  $conn;

    public function __construct() {
        $connect = new Connection;
        $this->conn = $connect->getConn();
    }

    public function save(array $data) 
    {
        $query = $this->conn->prepare("INSERT INTO vendedores (nome, email) VALUES (:nome, :email) ");
        $query->execute(
            array(':nome' => $data['nome'], ':email' => $data['email'])
        );

        $lastInsertId = $this->conn->lastInsertId();

        $newArrayDataUser = array(
            'id' => $lastInsertId,
            'nome' => $data['nome'],
            'email' => $data['email']
        );

        if (empty($lastInsertId)) {
            return [];
        }

        return $newArrayDataUser;
    }

}