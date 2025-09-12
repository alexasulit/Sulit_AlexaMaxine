<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create User</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 font-sans">

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl p-8 mt-10">

  <!-- Header Section -->
  <div class="text-center border-b-4 border-pink-500 pb-5 mb-6">
    <h1 class="text-3xl font-extrabold text-pink-600">Create User</h1>
    <p class="text-gray-600 text-lg">Fill out the form below to add a new user</p>
  </div>

  <!-- Error Message -->
  <?php if(isset($error)): ?>
  <div class="bg-red-100 border-l-4 border-red-500 text-red-600 p-3 rounded-lg mb-6 shadow-sm">
    <?=$error;?>
  </div>
  <?php endif; ?>

  <!-- User Form -->
  <form action="<?=site_url('user/create');?>" method="post" class="space-y-6 max-w-2xl mx-auto">
    <div>
      <label class="block text-pink-600 font-semibold mb-1">Username:</label>
      <input type="text" name="username" placeholder="Enter username" required 
             class="w-full border border-pink-400 rounded-full px-5 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-sm">
    </div>

    <div>
      <label class="block text-pink-600 font-semibold mb-1">Email:</label>
      <input type="email" name="email" placeholder="Enter email address" required 
             class="w-full border border-pink-400 rounded-full px-5 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-sm">
    </div>

    <!-- Buttons -->
    <div class="flex justify-center gap-4 pt-4">
      <button type="submit" 
              class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-8 py-3 rounded-full font-semibold shadow-md hover:from-pink-600 hover:to-pink-700 transition">
        Create User
      </button>
      <a href="<?=site_url('/');?>"
         class="bg-gray-200 text-gray-700 px-8 py-3 rounded-full hover:bg-gray-300 font-semibold shadow transition">
        Cancel
      </a>
    </div>
  </form>
</div>

</body>
</html>
