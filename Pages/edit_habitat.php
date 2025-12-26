<?php

  session_start();

  include "../Classes/admin_Classes.php";

  // edit habitat

  $habitat->habitatById($_GET['id']);
  
  if(isset($_POST['update'])){

    $habitat->setName($_POST['name']);
    $habitat->setType($_POST['type']);
    $habitat->setDescription($_POST['newdescrp']);
    $habitat->setZone($_POST['zonezoo']);

    $habitat->editHabitat($_GET['id']);
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zoo Encyclopedia</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include "./Header.php"; ?>
      <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <form method="post" class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6">Edit Animal</h2>
        <label class="block mb-2 font-semibold">Name:</label>
        <input type="text" name="name" value="<?php echo $habitat->getName(); ?>" class="border p-2 w-full mb-4 rounded">
        
            <label class="block mb-2 font-semibold">Climat Type URL:</label>
            <input type="text" name="type" value="<?php echo $habitat->getType(); ?>" class="border p-2 w-full mb-4 rounded">

        <label class="block mb-2 font-semibold">Description:</label>
            <input type="text" name="newdescrp" value="<?php echo $habitat->getDescription(); ?>" class="border p-2 w-full mb-4 rounded">

        <label class="block mb-2 font-semibold">zonezoo:</label>
            <input type="text" name="zonezoo" value="<?php echo $habitat->getZone(); ?>" class="border p-2 w-full mb-4 rounded">

        <div class="flex justify-between">
            <button type="submit" name="update" class="bg-yellow-400 text-white px-6 py-2 rounded hover:bg-yellow-500">
               Update
            </button>
            <a href="./DASHBOARD.php" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
<footer class="bg-green-600 text-white p-4 text-center">
    2025 Zoo Management System
  </footer>
</body>
</html>