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


class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $email, $password, $role) {
        $sql = "INSERT INTO utilisateurs (nom_user, email, motpasse_hash, user_role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $name,
            $email,
            md5($password),
            $role
        ]);
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM utilisateurs WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user['motpasse_hash'] === md5($password)) {
            session_start();
            $_SESSION['username'] = $user['nom_user'];
            $_SESSION['role'] = $user['user_role'];
            header("Location: ../index.php");
            return true;
        }else{
            echo "<script>alert('Your Password or Email is not Correct')</script>";
        return false;
        }
    }
}

// dyal Register 

  $Register_login = new User($conn);
  if(isset($_POST['Register'])){

    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];
    $userrole = $_POST['role'];

//register($name, $email, $password, $role)
    $Register_login->register($username, $useremail, $userpassword, $userrole);
    
    header("Location: ../index.php");
  }

// Login

  if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $Register_login->login($email, $password);

  }