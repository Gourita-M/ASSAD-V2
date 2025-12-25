<?php 

class Habitat
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

//add habitat

    public function addnewhabi($name, $type, $description, $zone){
        $sql = "INSERT INTO habitats(nom_habi, typeclimat, habi_description, zonezoo)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $name,
            $type,
            $description,
            $zone
        ]);
    }
//delete habitat


//update habitat
//show all habitat

    public function showhabitats(){
        $sql = "SELECT * FROM habitats";
        $stmt = $this->conn->query($sql);
        return $stmt;
    }

}
?>