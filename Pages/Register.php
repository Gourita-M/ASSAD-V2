<?php
 include "./Classes.php";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php include "./Header.php"; ?>
<div class="bg-gradient-to-br from-green-900 to-black min-h-screen flex items-center justify-center">

  <div class="bg-white w-full max-w-md p-8 rounded-3xl shadow-2xl">

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

      <select name="role"
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
      <a href="./login.php" class="text-green-700 font-semibold hover:underline">
        Login
      </a>
    </p>

    <p class="text-xs text-center text-gray-500 mt-3">
      Guide accounts require admin approval
    </p>

  </div>
</div>
</body>   
</body>
</html>
