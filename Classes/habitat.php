<?php

class Habitat
{
    private $conn;

    private $id;
    private $name;
    private $type;
    private $description;
    private $zone;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getZone()
    {
        return $this->zone;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    // add habitat
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

    // show all habitat
    public function showhabitats(){
        $sql = "SELECT * FROM habitats";
        $stmt = $this->conn->query($sql);
        return $stmt;
    }

    // get habitat by id

    public function habitatById($id)
    {
        $sql = "SELECT * FROM habitats WHERE id_habi = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $this->id          = $data['id_habi'];
            $this->name        = $data['nom_habi'];
            $this->type        = $data['typeclimat'];
            $this->description = $data['habi_description'];
            $this->zone        = $data['zonezoo'];
            return true;
        }

        return false;
    }

    //delete habitat by id

    public function deleteHabitat($id)
    {
        $sql = "DELETE FROM habitats WHERE id_habi = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    //edit habitat

    public function editHabitat($id)
    {
        $sql = "UPDATE habitats SET 
                    nom_habi = ?, 
                    typeclimat = ?, 
                    habi_description = ? ,
                    zonezoo = ? 
                   WHERE id_habi = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $this->name,
            $this->type,
            $this->description,
            $this->zone,
            $id
        ]);
    }
}


?>