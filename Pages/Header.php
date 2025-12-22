<header class="bg-green-900 text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <a href="../index.php" class="text-2xl font-bold tracking-wide">🦁 ASSAD Virtual Zoo</a>

            <nav class="space-x-6 hidden md:block">
                <?php 
                    if(isset($_SESSION['role'])){
                    if($_SESSION['role'] === 'ADMIN' || $_SESSION['role'] === 'Guide'){
                        echo '<a href="./DASHBOARD.php" class="hover:text-yellow-300">DashBoard</a>';
                    }
                }
                ?>
                <?php 
                    if(isset($_SESSION['username'])){
                        $name = $_SESSION['username'];
                        echo '
                            <span class="font-semibold text-green-300">
                                Welcome z'.$name.'
                            </span>
                            <a href="./Pages/logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg">
                                Logout
                            </a>  
                        ';
                    }
                    else {
                        echo '
                            <a href="./Pages/login.php" class="loginbtn bg-yellow-400 text-green-900 px-4 py-2 rounded font-semibold" >
                                Login / Register
                            </a>
                        ';
                    }
                ?>
                
            </nav>
        </div>
    </header>