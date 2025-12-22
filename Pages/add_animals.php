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
    <?php
          include "./Header.php"
      ?>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
    <h2 class="text-xl font-bold mb-4">Add New Animal</h2>
    <form method="POST" class="bg-white p-8 rounded w-full max-w-lg">
      <label class="block mb-2">Animal Name:</label>
      <input type="text" name="addname" class="w-full border px-2 py-1 mb-3" required>

      <label class="block mb-2">espèce:</label>
      <input type="text" name="espèce" class="w-full border px-2 py-1 mb-3" required>

      <label class="block mb-2">Country:</label>
      <input type="text" name="Country" class="w-full border px-2 py-1 mb-3" required>

      <label class="block mb-2">Food Type:</label>
      <select class="p-2 border rounded w-full" name="addfood" class="p-2 border rounded">
        <option value="Carnivore">Carnivore</option>
        <option value="Herbivore">Herbivore</option>
        <option value="Omnivore">Omnivore</option>
      </select>
      <br><br>
      <label class="block mb-2">Image URL:</label>
      <input type="text" name="addimage" class="w-full border px-2 py-1 mb-3" required>

      <label class="block mb-2 font-semibold">Habitat:</label>
        <select class="p-2 border rounded w-full" name="addhabitat" required>
          <?php 
          foreach($resul as $res){
          $habii = $res['nom_habi'];
          $habiid = $res['id_habi'];
          echo "<option value='$habiid'>$habii</option>";
        }
         ?>
        </select>
        <br><br>
        <label class="block mb-2">Description:</label>
        <input type="text" name="Description" class="w-full border px-2 py-1 mb-3" required>
     
      <div class="flex justify-end gap-2 mt-4">
        <button type="button" class="px-3 py-1 bg-gray-400 text-white rounded">
          <a href="../index.php">Cancel</a>
        </button>
        <button type="submit" name="adde" class="px-3 py-1 bg-blue-500 text-white rounded">Save</button>
      </div>
    </form>
  </div>
</div>
    <?php
        include "./Footer.php"
    ?>
</body>
</html>