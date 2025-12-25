<?php
  include_once "../Classes/animal.php";
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
  <?php
   include "./Header.php"
  ?>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md text-center">
        <h2 class="text-2xl font-bold mb-4">Delete Animal</h2>
        <p class="mb-6">Are you sure you want to delete <span class="font-semibold"><?php while($row = $animalname->fetch()){echo $row['ani_nom'];} ?></span>?</p>
        <form method="Post" class="flex justify-center gap-4">
            <button type="submit" name="confirm" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">Yes, Delete</button>
            <a href="../index.php" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </form>
    </div>
</div>
    <?php
    include "./Footer.php"
    ?>
</body>
</html>