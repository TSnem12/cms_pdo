<?php


class Article {
    private $conn;
    private $table = 'articles';


    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }


    public function getExcerpt($content, $lenght = 100) {
        if(strlen($content) > $lenght) {
            return substr($content, 0, $lenght) . "...";
        }

        return $content;

    }




    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);


    }








}
