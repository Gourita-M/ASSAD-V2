<?php 
include "./Pages/connection.php";
include "./Pages/User_class.php";
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>ASSAD Virtual Zoo – AFCON 2025</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

    <header class="bg-green-900 text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <a href="./index.php" class="text-2xl font-bold tracking-wide">🦁 ASSAD Virtual Zoo</a>

            <nav class="space-x-6 hidden md:block">
                <?php 
                    if(isset($_SESSION['role'])){
                    if($_SESSION['role'] === 'ADMIN' || $_SESSION['role'] === 'Guide'){
                        echo '<a href="./Pages/DASHBOARD.php" class="hover:text-yellow-300">DashBoard</a>';
                    }
                }
                ?>
                <?php 
                    if(isset($_SESSION['username'])){
                        $name = $_SESSION['username'];
                        echo '
                            <span class="font-semibold text-green-300">
                                Welcome Back '.$name.'
                            </span>
                            <a href="./Pages/logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg">
                                Logout
                            </a>  
                        ';
                    }
                    else {
                        echo '
                            <button id="log_regis" class="loginbtn bg-yellow-400 text-green-900 px-4 py-2 rounded font-semibold" >
                                Login / Register
                            </button>
                        ';
                    }
                ?>
                
            </nav>
        </div>
    </header>
 
    <!-- login -->
    <section>
               
        <div id="loginPopup"
            class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden">

        <div class="bg-white w-full max-w-md p-8 rounded-3xl shadow-2xl relative">

            <button
            id="closeLogin"
            class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold">
            &times;
            </button>

            <h3 class="text-3xl font-extrabold mb-6 text-center text-green-900">
            Login
            </h3>

            <form method="POST" class="space-y-4">

            <input 
                name="email"
                type="email"
                placeholder="Email address"
                class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-green-600 focus:outline-none"
                required
            >

            <input
                name="password"
                type="password"
                placeholder="Password"
                class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-green-600 focus:outline-none"
                required
            >

            <button
                name="login"
                type="submit"
                class="w-full bg-green-800 text-white py-3 rounded-xl hover:bg-green-900 transition font-semibold tracking-wide"
            >
                Login
            </button>

            </form>

            <div class="text-sm text-center text-gray-600 mt-6">
            Don’t have an account?
            <button id="regis" class="text-green-700 font-semibold hover:underline">
                Register
                </button>
            </div>

        </div>
        </div>

         <!-- register -->
        <div id="registerPopup"
            class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden">

        <div class="bg-white w-full max-w-md p-8 rounded-3xl shadow-2xl relative">

            <button
            id="closeRegister"
            class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold">
            &times;
            </button>

            <h3 class="text-3xl font-extrabold mb-6 text-center text-green-900">
            Create Account
            </h3>

            <form method="POST" class="space-y-4">

            <input
                type="text"
                name="name"
                placeholder="Full Name"
                class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-green-600 focus:outline-none"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email address"
                class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-green-600 focus:outline-none"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-green-600 focus:outline-none"
                required
            >

            <select
                name="role"
                class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-green-600 focus:outline-none"
            >
                <option value="visitor">Visitor</option>
                <option value="guide">Guide</option>
            </select>

            <button
                name="Register"
                type="submit"
                class="w-full bg-green-800 text-white py-3 rounded-xl hover:bg-green-900 transition font-semibold tracking-wide"
            >
                Register
            </button>

            </form>

            <p class="text-sm text-center text-gray-600 mt-6">
            Already have an account?
            <button
                id="openLoginFromRegister"
                class="text-green-700 font-semibold hover:underline">
                Login
                </button>
            </p>

            <p class="text-xs text-center text-gray-500 mt-3">
            Guide accounts require admin approval
            </p>

        </div>
        </div>

    </section>
    <section class="relative bg-[url('https://images.unsplash.com/photo-1546182990-dffeafbe841d')] bg-cover bg-center h-[80vh]">
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 flex items-center justify-center h-full text-center px-4">
            <div class="text-white max-w-3xl">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Discover Africa’s Wildlife During AFCON 2025
                </h2>
                <p class="text-lg mb-6">
                    Explore animals, habitats and interactive guided tours inspired by Morocco and the Atlas Lion.
                </p>
                <a href="#tours" class="bg-yellow-400 text-green-900 px-6 py-3 rounded-lg font-bold hover:bg-yellow-300">
                    Explore Guided Tours
                </a>
            </div>
        </div>
    </section>

    <section id="asaad" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <img
                src="https://images.unsplash.com/photo-1614027164847-1b28cfe1df60"
                alt="Atlas Lion"
                class="rounded-xl shadow-lg" />

            <div>
                <h3 class="text-3xl font-bold mb-4">Asaad – Lion of the Atlas</h3>
                <p class="text-gray-600 mb-4">
                    The Atlas Lion, once roaming North Africa, symbolizes strength, heritage,
                    and conservation. ASSAD aims to educate fans and families about this iconic species.
                </p>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Native to Morocco and North Africa</li>
                    <li>Critically endangered</li>
                    <li>Symbol of African pride</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="p-6">
    <h2 class="text-lg font-semibold mb-2">Filters</h2>
    <form id="formm" method="POST" class="flex gap-4">
      <select name="habittt" class="p-2 border rounded">
        <option value="">All Habitats</option>
        <?php while($result = $filter->fetch()){
          $habii = $result['nom_habi'];
          echo "<option value='$habii'>$habii</option>";
        }
        ?>
      </select>
      <select name="type" class="p-2 border rounded">
        <option value="">All Alimentaire Type</option>
        <option value="Carnivore">Carnivore</option>
        <option value="Herbivore">Herbivore</option>
        <option value="Omnivore">Omnivore</option>
      </select>
      <button type="submit" name="filterr" class="bg-green-600 text-white px-4 py-2 rounded">Filter</button>
</form>
  </section>
  <section class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php
    if(isset($_POST['filterr'])){
      $habiii = $_POST['habittt'];
      $type = $_POST['type'];
        $stmt = $conn->prepare("SELECT an_id,
             ani_nom,
             alimentation,
             an_image,
             nom_habi,
             paysorigine
             FROM animaux , habitats 
             WHERE id_habitat = id_habi  
             and nom_habi like :habiii
             and alimentation like :type");
        $stmt->execute(['habiii' => "%$habiii%",
                        'type' => "%$type%"]);
            while($list = $stmt->fetch()){
            addanimals($list);
        }
      
    }
    else{
        $stmt = $conn->prepare("SELECT an_id,
             ani_nom,
             alimentation,
             an_image,
             nom_habi,
             paysorigine
             FROM animaux , habitats 
             WHERE id_habitat = id_habi 
             and nom_habi like '%'
             and alimentation like '%'");
        $stmt->execute();
        
        while($list = $stmt->fetch()){
            addanimals($list);
        }
    }
    ?>
</section>

    
    <section id="tours" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold mb-8">Virtual Guided Tours</h3>

            <div class="grid md:grid-cols-2 gap-8">
                
                <div class="border rounded-xl p-6 shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-bold mb-2">African Giants Tour</h4>
                    <p class="text-gray-600 mb-2">🗓 12 Jan 2025 | ⏰ 18:00 | ⏳ 90 min</p>
                    <p class="text-gray-600 mb-2">🌍 Language: English</p>
                    <p class="text-gray-600 mb-4">💰 Price: €15 | 👥 Remaining: 8</p>

                    <div class="bg-gray-100 p-3 rounded mb-4">
                        <p class="font-semibold text-sm mb-1">Route:</p>
                        <p class="text-sm">Asian mammals → Exotic birds → Monkeys → Hippos</p>
                    </div>

                    <button class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">
                        Book Tour
                    </button>
                </div>
            </div>
        </div>
    </section>

    <?php include "./Pages/Footer.php"; ?>
<script src="./app.js"></script>
</body>

</html>
<?php
  function addanimals($arr){
    echo "
    <div class='bg-white rounded-lg shadow hover:shadow-lg transition'>
    <img src='{$arr['an_image']}' class='rounded-t-lg h-48 w-full object-cover'>

    <div class='p-4'>
        <h4 class='font-bold text-lg'>{$arr['ani_nom']}</h4>
        <p class='text-sm text-gray-600'>Habitat: {$arr['nom_habi']}</p>
        <p class='text-sm text-gray-600'>Origin: {$arr['paysorigine']}</p>
      </div>
    </div>
    ";
                  
  }
?>