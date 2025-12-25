<?php 
  session_start();

  if($_SESSION['role'] === 'ADMIN'){
    include "./admin.php";
  }
  elseif($_SESSION['role'] === 'Guide'){
    include "./Guide.php";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
</body>
</html>