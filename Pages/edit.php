<?php
    include "../Classes/admin_Classes.php";
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
    <form method="post" class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6">Edit Animal</h2>
        
        <?php 
          while($row = $editname->fetch()){
            if($_GET['id'] == $row['an_id']){
            echo "
            <label class='block mb-2 font-semibold'>Name:</label>
              <input type='text' name='name' value='{$row['ani_nom']}' class='border p-2 w-full mb-4 rounded'>

              <label class='block mb-2 font-semibold'>espèce :</label>
              <input type='text' name='espece' value='{$row['espèce']}' class='border p-2 w-full mb-4 rounded'>

              <label class='block mb-2 font-semibold'>Description :</label>
              <input type='text' name='description' value='{$row['descriptioncourte']}' class='border p-2 w-full mb-4 rounded'>

              <label class='block mb-2 font-semibold'>Food Type:</label>
              <select class='p-2 border rounded w-full' name='alimentation' class='p-2 border rounded'>
                <option value='Carnivore'>Carnivore</option>
                <option value='Herbivore'>Herbivore</option>
                <option value='Omnivore'>Omnivore</option>
              </select>
              <br><br>
              <label class='block mb-2 font-semibold'>Country :</label>
              <input type='text' name='country' value='{$row['paysorigine']}' class='border p-2 w-full mb-4 rounded'>
              <div>
                  <label class='block mb-2 font-semibold'>Image URL:</label>
                  <input type='text' name='image' value='{$row['an_image']}' class='border p-2 w-full mb-4 rounded'>
              </div>
              ";
            }
          }
        ?>

          <label class='block mb-2 font-semibold'>Habitat ID:</label>
              <select class='p-2 border rounded' name='habita'>
            <?php
              while($habi = $showhabitats->fetch()){
                echo "
                        <option value='{$habi['id_habi']}'>{$habi['nom_habi']}</option>
                      ";
              }
            ?>
            </select>
          <br><br>
          <div class="flex justify-between">
            <button type="submit" name="update" class="bg-yellow-400 text-white px-6 py-2 rounded hover:bg-yellow-500">
               Update
            </button>
            <a href="./DASHBOARD.php" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
<?php
   include "./Footer.php"
  ?>
</body>
</html>