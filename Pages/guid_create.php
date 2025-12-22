<?php
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Create Visite</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<?php include "./Header.php"; ?>

<main class="max-w-3xl mx-auto p-8 bg-white shadow rounded-xl mt-10">
  <h1 class="text-2xl font-bold mb-6">Create a guided tour</h1>

  <form method="POST" class="space-y-4">
    <input name="title" type="text" placeholder="Titre de la visite" class="w-full border p-2 rounded" required>
    <textarea name="descri" placeholder="Description" class="w-full border p-2 rounded" required></textarea>

    <div class="grid md:grid-cols-2 gap-4">
      <input name="time" type="datetime-local" class="border p-2 rounded" required>
      <input name="duree" type="number" placeholder="Durée (minutes)" class="border p-2 rounded" required>
    </div>

    <div class="grid md:grid-cols-3 gap-4">
      <input name="prix" type="number" placeholder="Prix (€)" class="border p-2 rounded" required>
      <input name="capacite" type="number" placeholder="Capacité max" class="border p-2 rounded" required>
      <select name="lang" class="border p-2 rounded">
        <option>Français</option>
        <option>Anglais</option>
        <option>Arabe</option>
      </select>
    </div>

    <button type="submit" name="create" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
      Create
    </button>
  </form>
</main>

<main class="max-w-3xl mb-5 mx-auto bg-white p-8 mt-10 rounded-xl shadow">
  <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300">
        <thead class="bg-blue-100">
          <tr>
            <th class="border px-4 py-2">id</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Description</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach($result as $res){
            echo "
                <tr class='hover:bg-blue-50'>
                    <td class='border px-4 py-2'>{$res['id_etap']}</td>
                    <td class='border px-4 py-2'>{$res['titreetape']}</td>
                    <td class='border px-4 py-2'>{$res['descriptionetape']}</td>
                </tr>
            ";
        }
        ?>
          
        </tbody>
      </table>
    </div>
    <br>

  <h1 class="text-2xl font-bold mb-6">Parcours de la visite</h1>

  <div class="space-y-4">
    <div class="border p-4 rounded">
      <input type="text" placeholder="Titre de l’étape" class="w-full border p-2 rounded mb-2">
      <textarea placeholder="Description" class="w-full border p-2 rounded"></textarea>
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
      Ajouter une étape
    </button>
  </div>
</main>
<?php include "./Footer.php"; ?>
</body>
</html>
