<?php 
  session_start();
  if($_SESSION['role'] === 'ADMIN'){
    include "./admin.php";
  }
  elseif($_SESSION['role'] === 'Guide'){
    include "./Guide.php";
  }
?>