<?php 

     include "../Classes/admin_Classes.php";

    if(isset($_GET['idon'])){
        
        $admin->activate($_GET['idon']);

        header("Location: ./DASHBOARD.php");
        
    }

    if(isset($_GET['idoff'])){
        
        $admin->deactivate($_GET['idoff']);

        header("Location: ./DASHBOARD.php");
    }
?>