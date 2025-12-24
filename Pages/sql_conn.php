<?php 
  try{

    $conn = new PDO('mysql:host=127.0.0.1;dbname=ASSAD_CAN', 'root', '');

  } catch(PDOException $e){
    echo $e->getMessage();
    die();
  }
?>