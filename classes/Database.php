<?php

class Database {
    private $host = DB_HOST;
    private $name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASSWORD;

    public $conn;

    
    public function getConnection(){
        $this->conn = null;
        try {
           $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->username, $this->password);
           $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $exception) {

            echo "Connection error" . $exception->getMessage();
        }

        return $this->conn;
    } 

}