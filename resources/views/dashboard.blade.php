<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="background-image: url('/images/background.png'); background-size: cover; background-repeat: no-repeat;"></body>

<div class="flex min-h-screen">

  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md p-6 flex flex-col justify-between">
    <div>
      <!-- Logo -->
      <div class="flex justify-center mb-10">
        <img src="/images/Logo.png" alt="Lungscare Logo" class="w-32">
      </div>

      <!-- Menu -->
      <nav class="flex flex-col gap-4">
        <a href="/dashboard" class="flex items-center gap-2 text-blue-600 font-medium">
          <span class="material-icons">dashboard</span> Dashboard
        </a>
        <a href="/article" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">article</span> Articles
        </a>
        <a href="/user" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">group</span> Active Users
        </a>
        <a href="/profile" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">person</span> Profile
        </a>
      </nav>
    </div>

    <!-- Footer Menu -->
    <div class="flex flex-col gap-4 mt-10">
      <a href="#" class="flex items-center gap-2 text-sm hover:text-blue-600">
        <span class="material-icons">settings</span> Settings
      </a>
      <a href="/login" class="flex items-center gap-2 text-sm hover:text-red-500">
        <span class="material-icons">logout</span> Log out
      </a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-10">
    <h2 class="text-xl font-semibold mb-1 text-white font-bold">Hello, Admin !</h2>
    <h1 class="text-3xl font-bold mb-6 text-white">Dashboard Overview</h1>
    <p class="mb-3 text-white">Welcome to the LungsCare Admin Panel.</p>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="text-sm text-gray-500 mb-2">Total Articles</div>
        <div class="text-2xl font-bold">125</div>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="text-sm text-gray-500 mb-2">Active Users</div>
        <div class="text-2xl font-bold">78</div>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="text-sm text-gray-500 mb-2">Engagement Rate</div>
        <div class="text-2xl font-bold">65%</div>
        <p class="text-green-600 text-sm mt-1">+5% from last week</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="text-sm text-gray-500 mb-2">Pending Approvals</div>
        <div class="text-2xl font-bold">3</div>
      </div>
    </div>

    <!-- Lower Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Recent Activity -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
        <ul class="text-sm space-y-3">
          <li><span class="material-icons text-blue-600 align-middle mr-1">monitor_heart</span> New article 'Understanding COPD' published. <br><span class="text-gray-400 text-xs">2 hours ago</span></li>
          <li><span class="material-icons text-blue-600 align-middle mr-1">monitor_heart</span> Admin John Doe updated profile. <br><span class="text-gray-400 text-xs">5 hours ago</span></li>
          <li><span class="material-icons text-blue-600 align-middle mr-1">monitor_heart</span> User Jane Smith logged in. <br><span class="text-gray-400 text-xs">1 day ago</span></li>
        </ul>
      </div>

      <!-- Quick Look -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Quick Look: Lung Health Awareness</h3>
        <img src="https://placehold.co/600x300" alt="Lung Health Awareness" class="rounded-lg w-full">
      </div>
    </div>
  </main>

</div>

</body>
</html>
