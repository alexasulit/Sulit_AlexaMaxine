<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Users</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 font-sans">

<div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-lg p-10 mt-10">

  <!-- Header Section -->
  <div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-pink-600 tracking-tight">User Management</h1>
    <p class="text-gray-500 text-lg mt-2">Manage and monitor registered users</p>
  </div>

  <!-- Controls -->
  <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <input id="search" type="text" placeholder="🔍 Search users..." onkeyup="searchTable()"
           class="border border-pink-300 rounded-full px-6 py-3 w-full md:w-1/2 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-sm text-gray-700">
    <a href="<?=site_url('user/create');?>"
       class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-6 py-3 rounded-full hover:from-pink-600 hover:to-pink-700 font-semibold shadow-md transition">
      + Add User
    </a>
  </div>

  <!-- Users Table -->
  <div class="overflow-x-auto rounded-2xl border border-pink-100 shadow-md">
    <table id="users-table" class="min-w-full bg-white rounded-lg">
      <thead>
        <tr class="bg-gradient-to-r from-pink-500 to-pink-600 text-white uppercase text-sm">
          <th class="px-6 py-4 text-left">ID</th>
          <th class="px-6 py-4 text-left">Username</th>
          <th class="px-6 py-4 text-left">Email</th>
          <th class="px-6 py-4 text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 text-sm">
        <?php foreach ($users as $user): ?>
        <tr class="hover:bg-pink-50 even:bg-pink-50/40 transition">
          <td class="px-6 py-4 font-semibold"><?=$user['id'];?></td>
          <td class="px-6 py-4"><?=$user['username'];?></td>
          <td class="px-6 py-4"><?=$user['email'];?></td>
          <td class="px-6 py-4 text-center flex justify-center gap-3">
            <a href="<?=site_url('user/update/'.$user['id']);?>"
               class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 shadow-sm transition text-sm font-medium">
              ✏️ Edit
            </a>
            <a href="<?=site_url('user/delete/'.$user['id']);?>"
               onclick="return confirm('Are you sure you want to delete this user?');"
               class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 shadow-sm transition text-sm font-medium">
              🗑️ Delete
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Pagination -->
<div class="flex justify-center mt-10">
  <nav class="inline-flex rounded-full shadow-md overflow-hidden border border-pink-300">
    <?php if (strpos($pagination_links, 'Prev') !== false): ?>
      <a href="?page=<?= max(1, (isset($_GET['page']) ? $_GET['page'] - 1 : 1)); ?>"
         class="px-6 py-3 text-pink-600 bg-pink-50 hover:bg-pink-100 border-r border-pink-300 font-semibold transition">
        ‹ Prev
      </a>
    <?php endif; ?>

    <?php
      $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      preg_match_all('/\?page=(\d+)/', $pagination_links, $pages);
      $pages = array_unique($pages[1]);
      foreach ($pages as $p):
        $active = ($p == $current_page)
          ? 'bg-pink-500 text-white'
          : 'bg-pink-50 text-pink-600 hover:bg-pink-100';
    ?>
      <a href="?page=<?= $p; ?>"
         class="px-6 py-3 <?= $active; ?> border-r border-pink-300 font-semibold transition">
        <?= $p; ?>
      </a>
    <?php endforeach; ?>

    <?php if (strpos($pagination_links, 'Next') !== false): ?>
      <a href="?page=<?= (isset($_GET['page']) ? $_GET['page'] + 1 : 2); ?>"
         class="px-6 py-3 text-pink-600 bg-pink-50 hover:bg-pink-100 font-semibold transition">
        Next ›
      </a>
    <?php endif; ?>
  </nav>
</div>

<script>
function searchTable() {
  const input = document.getElementById("search").value.toLowerCase();
  const table = document.getElementById("users-table");
  const trs = table.getElementsByTagName("tr");
  for (let i = 1; i < trs.length; i++) {
    const tds = trs[i].getElementsByTagName("td");
    let show = false;
    for (let j = 0; j < tds.length; j++) {
      if (tds[j].innerText.toLowerCase().includes(input)) {
        show = true;
        break;
      }
    }
    trs[i].style.display = show ? "" : "none";
  }
}
</script>
</body>
</html>
