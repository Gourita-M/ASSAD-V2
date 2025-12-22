<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ASSAD Virtual Zoo – Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen font-sans">

<?php include "./Header.php"; ?>

<main class="max-w-7xl mx-auto p-6">


  <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

    <div class="bg-white p-6 rounded-xl shadow">
      <p class="text-sm text-gray-500">Total Animals</p>
      <?php echo "<p class='text-3xl font-bold text-green-700'>{$tot['total']}</p>"; ?>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
      <p class="text-sm text-gray-500">Guided Tours</p>
      <?php echo "<p class='text-3xl font-bold text-green-700'>{$visitota['total']}</p>"; ?>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
      <p class="text-sm text-gray-500">Reservations</p>
      <?php 
       echo "<p class='text-3xl font-bold text-green-700'>{$retota['total']}</p>"
      ?>
      
    </div>
  </section>

  <section class="bg-white rounded-xl shadow p-6 mb-10">
    <h2 class="text-2xl font-semibold text-green-800 mb-4">
      🧭 Guide Dashboard
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
      <a href="./guid_create.php" class="bg-blue-600 text-white py-3 rounded text-center hover:bg-blue-700 transition">
        Create Tour
      </a>
      <a href="#" class="bg-blue-600 text-white py-3 rounded text-center hover:bg-blue-700 transition">
        Manage Tours
      </a>
      <a href="#" class="bg-blue-600 text-white py-3 rounded text-center hover:bg-blue-700 transition">
        Tour Routes
      </a>
      <a href="#" class="bg-blue-600 text-white py-3 rounded text-center hover:bg-blue-700 transition">
        Reservations
      </a>
    </div>

  
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300">
        <thead class="bg-blue-100">
          <tr>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Language</th>
            <th class="border px-4 py-2">Capacity</th>
            <th class="border px-4 py-2">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach($result as $res){
            echo "
                <tr class='hover:bg-blue-50'>
                    <td class='border px-4 py-2'>{$res['titre']}</td>
                    <td class='border px-4 py-2'>{$res['dateheure']}</td>
                    <td class='border px-4 py-2'>{$res['langue']}</td>
                    <td class='border px-4 py-2'>{$res['capacite_max']}</td>
                    <td class='border px-4 py-2 text-green-600 font-semibold'>{$res['statut']}</td>
                </tr>
            ";
        }
        ?>
          
        </tbody>
      </table>
    </div>
  </section>


  <section class="bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-semibold text-green-800 mb-4">
      🌍 Visitor Area
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
      <a href="#" class="bg-yellow-500 text-white py-3 rounded text-center hover:bg-yellow-600 transition">
        Explore Animals
      </a>
      <a href="#" class="bg-yellow-500 text-white py-3 rounded text-center hover:bg-yellow-600 transition">
        View Guided Tours
      </a>
      <a href="#" class="bg-yellow-500 text-white py-3 rounded text-center hover:bg-yellow-600 transition">
        My Reservations
      </a>
    </div>


    <div class="bg-gray-50 p-4 rounded">
      <h3 class="text-lg font-semibold mb-2">💬 My Last Comment</h3>
      <p class="text-sm text-gray-600">
        “Amazing tour! The Atlas Lion presentation was very informative.”
      </p>
      <p class="text-yellow-500 mt-1">★★★★★</p>
    </div>
  </section>

</main>

<?php include "./Footer.php"; ?>

</body>
</html>
