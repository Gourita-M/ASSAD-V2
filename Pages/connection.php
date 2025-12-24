<?php 

class Database {
    public  $conn;

    public function connect() {
        $this->conn = new PDO('mysql:host=127.0.0.1;dbname=ASSAD_CAN', 'root', '');
        return $this->conn;
    }
}

// filter dyal animals in Home page

$test = new Database();
$conn = $test->connect();
$filter = $conn->prepare("SELECT * FROM habitats");
$filter->execute();

?>