<?php 

class admin{

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addanimal($name, $espece, $alimentation, $image, $country, $idhabi, $descriptioncourte){
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

    public function showusers(){
        $sql = "SELECT * FROM utilisateurs";
        $stmt = $this->conn->query($sql);
        return $stmt;
    }

    public function showhabitats(){
        $sql = "SELECT * FROM habitats";
        $stmt = $this->conn->query($sql);
        return $stmt;
    }

    public function showanimals(){
        $sql = "SELECT * FROM animaux";
        $stmt = $this->conn->query($sql);
        return $stmt;
    }
}

$admin = new admin($conn);

if(isset($_POST['adde'])){
    $name = $_POST['addname'];
    $espece = $_POST['espece'];
    $alimentation = $_POST['addfood'];
    $image = $_POST['addimage'];
    $country = $_POST['Country'];
    $idhabi = $_POST['addhabitat'];
    $descriptioncourte = $_POST['Description'];

$admin->addanimal($name, $espece, $alimentation, $image, $country, $idhabi, $descriptioncourte);
}

$showall = $admin->showusers();
$showhabitats = $admin->showhabitats();
$animals = $admin->showanimals();
?>