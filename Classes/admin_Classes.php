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

//statistics

    public function statistics()
    {
        // Animals
        $sql = "SELECT COUNT(*) AS total_animals FROM animaux";
        $stmt = $this->conn->query($sql);
        $animals = $stmt->fetch(PDO::FETCH_ASSOC);

        // Visits
        $sql1 = "SELECT COUNT(*) AS total_visits FROM visitesguidees";
        $stmt1 = $this->conn->query($sql1);
        $visits = $stmt1->fetch(PDO::FETCH_ASSOC);

        // Reservations
        $sql2 = "SELECT COUNT(*) AS total_reservations FROM reservations";
        $stmt2 = $this->conn->query($sql2);
        $reservations = $stmt2->fetch(PDO::FETCH_ASSOC);

        return [
            'animals'      => $animals['total_animals'],
            'visits'       => $visits['total_visits'],
            'reservations' => $reservations['total_reservations']
        ];
    }

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


//classes
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
      $message = "Animal is added ";
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


//delete animal and show his name

$animalname = $animal->showAnimals();

    if(isset($_POST['confirm'])){
        $id = $_GET['id'];
        $animal->deleteAnimal($id);

        header("Location: ./DASHBOARD.php");
    }

//edit animal and show his info

$editname = $animal->showAnimals();
$showhabitats = $habitat->showhabitats();

    if(isset($_POST['update'])){
        
        $name = $_POST['name'];
        $espece = $_POST['espece'];
        $alimentation = $_POST['alimentation'];
        $description = $_POST['description'];
        $country = $_POST['country'];
        $image = $_POST['image'];
        $habita = $_POST['habita'];
        $id = $_GET['id'];
        
    $animal->updateanimal($name, $espece, $alimentation, $image, $country, $description, $habita, $id);
    
        header("Location: ./DASHBOARD.php");
    }

?>