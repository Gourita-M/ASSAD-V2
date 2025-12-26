<?php

class User
{
    private $conn;

    private $id;
    private $name;
    private $email;
    private $role;
    private $status;

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

    public function getEmail()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function register($name, $email, $password, $role)
    {
        
        $sqlcheck = "SELECT id_user FROM utilisateurs WHERE email = ? LIMIT 1";
        $stmtcheck = $this->conn->prepare($sqlcheck);
        $stmtcheck->execute([$email]);

        if ($stmtcheck->fetch()) {
            return false;
        }

        $sql = "INSERT INTO utilisateurs 
                (nom_user, email, motpasse_hash, user_role, user_Status)
                VALUES (?, ?, ?, ?, 'inactive')";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $name,
            $email,
            md5($password),
            $role
        ]);
    }


    public function login($email, $password)
    {
        $sql = "SELECT * FROM utilisateurs WHERE email = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        if ($user['motpasse_hash'] !== md5($password)) {
            return false;
        }

        if ($user['user_Status'] === 'inactive') {
            return 'inactive';
        }

        $this->id = $user['id_user'];
        $this->setName($user['nom_user']);
        $this->setEmail($user['email']);
        $this->setRole($user['user_role']);
        $this->setStatus($user['user_Status']);

        return true;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        return true;
    }
}

$user = new User($conn);

?>