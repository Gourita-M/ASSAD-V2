<?php

if (isset($_POST['Logout'])) {
    $user->logout();
    header("Location: ../index.php");
    exit;
}
?>

<header class="bg-green-900 text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <a href="../index.php" class="text-2xl font-bold tracking-wide">🦁 ASSAD Virtual Zoo</a>

            <nav class="space-x-6 md:block">
                <?php 
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] === 'ADMIN' || $_SESSION['role'] === 'Guide') {
                        echo '<a href="./DASHBOARD.php" class="hover:text-yellow-300">Dashboard</a>';
                    }
                }
                ?>

                <?php 
                if (isset($_SESSION['username'])) {
                    $name = $_SESSION['username'];
                    echo '
                    <div class="inline-flex items-center gap-4">
                        <span class="font-semibold text-green-300">
                            Welcome '.$name.'
                        </span>

                        <form method="POST" action="" class="inline">
                            <button type="submit" name="Logout"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg">
                                Logout
                            </button>
                        </form>
                    </div>
                    ';
                } else {
                    echo '
                    <button id="log_regis"
                        class="loginbtn bg-yellow-400 text-green-900 px-4 py-2 rounded font-semibold">
                        Login / Register
                    </button>
                    ';
                }
                ?>
            </nav>
        </div>
    </header>