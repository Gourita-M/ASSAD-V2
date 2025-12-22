<?php

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
    <nav class="bg-green-600 text-white p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">Zoo Encyclopedia</h1>
    <div class="space-x-4">
      <a href="../index.php" class="bg-white text-green-600 px-3 py-1 rounded">
        Home
      </a>
    </div>
  </nav>
      <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <form method="post" class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6">Edit Animal</h2>
        <label class="block mb-2 font-semibold">Name:</label>
        <input type="text" name="name" value="<?php echo $row['nom_habi']; ?>" class="border p-2 w-full mb-4 rounded">
        
            <label class="block mb-2 font-semibold">Climat Type URL:</label>
            <input type="text" name="type" value="<?php echo $row['typeclimat']; ?>" class="border p-2 w-full mb-4 rounded">

        <label class="block mb-2 font-semibold">Description:</label>
            <input type="text" name="newdescrp" value="<?php echo $row['habi_description']; ?>" class="border p-2 w-full mb-4 rounded">

        <label class="block mb-2 font-semibold">zonezoo:</label>
            <input type="text" name="zonezoo" value="<?php echo $row['zonezoo']; ?>" class="border p-2 w-full mb-4 rounded">

        <div class="flex justify-between">
            <button type="submit" name="update" class="bg-yellow-400 text-white px-6 py-2 rounded hover:bg-yellow-500">
               Update
            </button>
            <a href="../index.php" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
<footer class="bg-green-600 text-white p-4 text-center">
    2025 Zoo Management System
  </footer>
</body>
</html>