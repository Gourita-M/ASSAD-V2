<?php 

class Animal
{

        private $conn;

    public function __construct($db) 
    {
        $this->conn = $db;
    }

// create()

    public function addanimal($name, $espece, $alimentation, $image, $country, $idhabi, $descriptioncourte)
    {
        $sql = "INSERT INTO animaux (ani_nom, espèce, alimentation, an_image, paysorigine,descriptioncourte, id_habitat)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $name,
            $espece,
            $alimentation,
            $image,
            $country,
            $descriptioncourte,
            $idhabi
        ]);
    }

// update()

    public function updateanimal($name, $espece, $alimentation, $image, $country, $descriptioncourte, $idhabi)
    {
        $sql = "UPDATE animaux SET 
                    ani_nom = ?, 
                    espèce = ?, 
                    alimentation = ?,
                    an_image = ?,
                    paysorigine = ?,
                    descriptioncourte = ?,
                    id_habitat = ?
                   WHERE an_id = ? ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $name,
            $espece,
            $alimentation,
            $image,
            $country,
            $descriptioncourte,
            $idhabi
        ]);
    }
// delete()
    public function deleteAnimal($idanimal): void
    {
        $sql = "DELETE
                FROM animaux
                WHERE an_id= ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $idanimal
        ]);
    }

// getall()
    public function showAnimals()
    {
        $sql = "SELECT *
                FROM animaux";
        $stmt = $this->conn->query($sql);
        return $stmt;
    }
// getbyhabitat()

}

//delete animal and show his name
$animal = new Animal($conn);
$animalname = $animal->showAnimals();
    if(isset($_POST['confirm'])){
        $id = $_GET['id'];
        $animal->deleteAnimal($id);

        header("Location: ./DASHBOARD.php");
    }
?>