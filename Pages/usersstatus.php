<?php 
    include "./conn_sql.php";

    if(isset($_GET['idon'])){
        $idon = $_GET['idon'];
        $sqlon = "UPDATE utilisateurs
                   SET user_Status = 'active' 
                   WHERE id_user = $idon";
        
        $conn->query($sqlon);
        header("Location: ./DASHBOARD.php");
        exit();
    }

    if(isset($_GET['idoff'])){
        $idoff = $_GET['idoff'];
        
        $sqloff = "UPDATE utilisateurs
                   SET user_Status = 'inactive' 
                   WHERE id_user = $idoff";
        
        $conn->query($sqloff);
        header("Location: ./DASHBOARD.php");
        exit();
    }
?>