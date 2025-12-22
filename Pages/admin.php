<?php 
    
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard - ASSAD Virtual Zoo</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">
  <?php
   include "./Header.php"
  ?>

  <main class="p-6 max-w-7xl mx-auto">
    <h2 class="text-3xl font-semibold mb-6 text-green-900">Administrator Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">

      <section class="bg-white rounded shadow p-5">
        <h3 class="text-center text-xl font-semibold mb-4 border-b border-green-200 pb-2 text-green-800">Animal/Habitat Management</h3>
        <ul class="space-y-3 text-gray-700">
          <li>
            <a href="./add_animals.php">
            <button class="w-full bg-yellow-500 text-white rounded px-4 py-2 hover:bg-yellow-600 transition">
              Add an Animal
            </button>
          </a>
          </li>
          <li>
            <a href="./add_habitat.php">
            <button class="w-full bg-yellow-500 text-white rounded px-4 py-2 hover:bg-yellow-600 transition">
              Add a Habitat
            </button>
            </a>
          </li>
        </ul>
      </section>

    </div>
   
<div class="bg-gray-100 font-sans p-6">

  <h1 class="text-3xl font-bold mb-8 text-green-900">Admin Dashboard - Users & Animals List</h1>

  <section class="mb-12 bg-white rounded shadow p-6">
    <h2 class="text-2xl font-semibold mb-4 text-green-800">Users List</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-green-100">
          <tr>
            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Role</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
           //id_user, nom_user, email, user_role, user_Status
            foreach($userlist as $uslis){
              echo "
                <tr class='hover:bg-green-50'>
                  <td class='border border-gray-300 px-4 py-2'>{$uslis['id_user']}</td>
                  <td class='border border-gray-300 px-4 py-2'>{$uslis['nom_user']}</td>
                  <td class='border border-gray-300 px-4 py-2'>{$uslis['email']}</td>
                  <td class='border border-gray-300 px-4 py-2'>{$uslis['user_role']}</td>
                  <td class='border border-gray-300 px-4 py-2'>
                    <span class='text-green-600 font-semibold'>{$uslis['user_Status']}</span>
                  </td> ";
              if($uslis['user_Status'] === 'active'){

                  if($uslis['user_role'] === 'ADMIN'){
                    echo "
                    <td class='border border-gray-300 px-4 py-2 space-x-2'>
                      <h1 class='bg-blue-500 text-center text-white px-3 py-1 rounded'> ADMIN </h1>
                    </td>
                    ";
                  }else{
                  echo "
                    <td class='border border-gray-300 px-4 py-2 space-x-2'>
                      <div class='flex justify-center gap-2'>
                          <a href='./usersstatus.php?idoff={$uslis["id_user"]}'
                          class='bg-red-500 text-white px-3 py-1 rounded'>DEACTIVATE</a>
                      </div>
                    </td>
                      ";
                  }
              }else{
                echo "
                  <td class='border border-gray-300 px-4 py-2 space-x-2'>
                    <div class='flex justify-center gap-2'>
                        <a href='./usersstatus.php?idon={$uslis["id_user"]}' 
                        class='bg-green-400 text-white px-3 py-1 rounded'>ACTIVATE</a>
                    </div>
                  </td>
                    ";
              }
              echo "
                </tr> ";
                  
            }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <section class="bg-white rounded shadow p-6">
    <h2 class="text-2xl font-semibold mb-4 text-green-800">Habitat List</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-yellow-100">
          <tr>
            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Type</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             foreach($habitatresult as $habi){
              echo "
                  <tr class='hover:bg-yellow-50'>
                    <td class='border border-gray-300 px-4 py-2'>{$habi['id_habi']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$habi['nom_habi']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$habi['typeclimat']}</td>
                    <td class='border border-gray-300 px-4 py-2 space-x-2'>
                      <div class='flex justify-center gap-2'>
                        <a href='./edit_habitat.php?id={$habi["id_habi"]}' 
                        class='bg-yellow-400 text-white px-3 py-1 rounded'>Edit</a>
                        <a href='./delete_habibat.php?id={$habi["id_habi"]}'
                        class='bg-red-500 text-white px-3 py-1 rounded'>Delete</a>
                      </div>
                    </td>
                  </tr>
              ";
             }
          ?>
        </tbody>
      </table>
      <br>
      <p class="text-red-500">NOTE: You Can't Delete a Habitat if There is an Animals in it</p>
    </div>
  </section>

  <section class="bg-white rounded shadow p-6">
    <h2 class="text-2xl font-semibold mb-4 text-green-800">Animals List</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-yellow-100">
          <tr>
            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Species</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Diet</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Country of Origin</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              foreach($animresult as $ani){
                echo "
                   <tr class='hover:bg-yellow-50'>
                    <td class='border border-gray-300 px-4 py-2'>{$ani['an_id']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$ani['ani_nom']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$ani['espèce']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$ani['alimentation']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$ani['paysorigine']}</td>
                    <td class='border border-gray-300 px-4 py-2 space-x-2'>
                      <div class='mt-4 flex gap-2'>
                        <a href='./edit.php?id={$ani["an_id"]}' 
                        class='bg-yellow-400 text-white px-3 py-1 rounded'>Edit</a>
                        <a href='./delete.php?id={$ani["an_id"]}'
                        class='bg-red-500 text-white px-3 py-1 rounded'>Delete</a>
                      </div>
                    </td>
                  </tr>
                ";
              }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  
</div>

  </main>

  <?php
   include "./Footer.php"
  ?>

</body>
</html>

<?php 
  function accesdenied(){
    echo '
     <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Access Denied</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-50 to-red-100 font-sans">

  <div class="bg-white shadow-xl rounded-2xl p-10 max-w-md w-full text-center">
    
    <!-- Icon -->
    <div class="flex justify-center mb-6">
      <div class="w-16 h-16 flex items-center justify-center rounded-full bg-red-100 text-red-600 text-3xl font-bold">
        !
      </div>
    </div>

    <!-- Title -->
    <h1 class="text-3xl font-extrabold text-red-600 mb-4">
      Access Denied
    </h1>

    <!-- Message -->
    <p class="text-gray-600 mb-8">
      You do not have permission to access this page.
      <br>
      Please contact the administrator if you believe this is a mistake.
    </p>

    <!-- Buttons -->
    <div class="flex flex-col gap-3">
      <a href="../index.php"
         class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg transition">
        Go to Home
      </a>

    </div>

    <!-- Footer note -->
    <p class="text-xs text-gray-400 mt-6">
      Error 403 — Forbidden
    </p>

  </div>

</body>
</html>

    ';
  }
?>