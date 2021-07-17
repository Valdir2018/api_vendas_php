<?php


namespace App\Models\Database;

require '../Config.php';

class Connection {
    private $connection = null;

    private function openConnection() 
    {
        try {
            if ($this->connection == null) {
                $this->connection = new \PDO(DBDRIVER.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS );
            }
        } catch(Exception $error) {
           print $error->getMessage();
        }
        return $this->connection;
    }

    public function getConn() {
        return $this->openConnection();
    }
}