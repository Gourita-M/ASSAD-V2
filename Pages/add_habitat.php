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
            <main class="w-full mb-10">
                <header class="mb-6">
                    <h1 class="text-center mt-10 mb-10 text-2xl font-semibold text-gray-800">Add Habitat & Show Existing Habitats</h1>
                </header>
                <section class="flex lg:w-[90%] lg:m-5 flex-col gap-6">
                    <form method="POST" class="bg-white p-5 rounded-2xl shadow-sm">
                        <h2 class="text-lg text-center font-medium mb-3">Add a new habitat</h2>

                        <label class="block mb-2 text-sm text-gray-600">Habitat name</label>
                        <input name="habi" required type="text" placeholder="e.g. Savannah" class="w-full mb-4 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300" />

                        <label class="block mb-2 text-sm text-gray-600">Short description (optional)</label>
                        <input name="descri" type="text" placeholder="e.g. Hot grassland area" class="w-full mb-4 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300" />

                        <div class="flex items-center gap-3">
                            <button type="submit" name="subhabi" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow-sm hover:bg-green-700">Add Habitat</button>
                            <button class="px-3 py-2 bg-red-50 text-red-600 rounded-lg border border-red-100">
                                <a href="./DASHBOARD.php">Cancel</a>
                            </button>
                        </div>
                        <p id="formMsg" class="mt-3 text-sm text-gray-500"></p>
                    </form>
                    <h1 class="text-center">LIST OF AVAILBLE HABITATS</h1>
                    <div class="bg-white mt-3 p-5 rounded-2xl shadow-sm">
                        <div class="overflow-x-auto lg:w-full">
                        <table class="min-w-full border border-gray-200 rounded-xl ">
                            <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Habitat Name</th>
                                <th class="px-4 py-2 text-left">Description</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php
                                foreach ($result as $resul){
                                        echo "
                                        <tr class='border-b'>
                                            <td class='px-4 py-2'>".$resul['id_habi']."</td>
                                            <td class='px-4 py-2'>".$resul['nom_habi']."</td>
                                            <td class='px-4 py-2'>".$resul['habi_description']."</td>
                                        </tr>
                                        " ;
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </section>
            </main>     
        <?php
            include "./Header.php"
        ?>   
    </body>

    </html>