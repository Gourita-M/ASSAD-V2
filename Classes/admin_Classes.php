<?php 

    include "../Classes/connection.php";
    include "../Classes/User_class.php";
    include "../Classes/animal.php";
    include "../Classes/habitat.php";

class admin extends User{

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
//activate()

    public function activate($userid){
        $sql = "UPDATE utilisateurs
                SET user_Status = 'active' 
                WHERE id_user = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$userid]);
    }
//deactivate()

    public function deactivate($userid){
        $sql = "UPDATE utilisateurs
                SET user_Status = 'inactive'
                WHERE id_user = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$userid]);
    }

//approveguide()

//show all users
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

}

$admin = new admin($conn);
$animal = new Animal($conn);
$habitat = new Habitat($conn);

if(isset($_POST['adde'])){
    $name = $_POST['addname'];
    $espece = $_POST['espece'];
    $alimentation = $_POST['addfood'];
    $image = $_POST['addimage'];
    $country = $_POST['Country'];
    $idhabi = $_POST['addhabitat'];
    $descriptioncourte = $_POST['Description'];

$animal->addanimal($name, $espece, $alimentation, $image, $country, $idhabi, $descriptioncourte);

    header("Location: ./DASHBOARD.php");
}

if(isset($_POST['subhabi'])){
    $name = $_POST['habi'];
    $type = $_POST['type'];
    $description = $_POST['zone'];
    $zone = $_POST['descri'];
    
$habitat->addnewhabi($name, $type, $description, $zone);

    header("Location: ./DASHBOARD.php");
}

$showall = $admin->showusers();
$showhabitats = $habitat->showhabitats();
$habitatoption = $habitat->showhabitats();
$animals = $animal->showAnimals();
?>