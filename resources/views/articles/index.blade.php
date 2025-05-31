<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LungCare Admin - Articles</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="flex bg-gray-100 min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md p-6 flex flex-col justify-between">
    <div>
      <!-- Logo -->
      <div class="flex justify-center mb-10">
        <img src="/images/Logo.png" alt="Lungscare Logo" class="w-32">
      </div>

      <!-- Menu -->
      <nav class="flex flex-col gap-4">
        <a href="/dashboard" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <span class="material-icons">dashboard</span> Dashboard
        </a>
        <a href="/articles" class="flex items-center gap-2 text-blue-600 font-medium">
          <span class="material-icons">article</span> Articles
        </a>
        <a href="/user" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <span class="material-icons">group</span> Active Users
        </a>
        <a href="/profile" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <span class="material-icons">person</span> Profile
        </a>
      </nav>
    </div>

    <!-- Footer Menu -->
    <div class="flex flex-col gap-4 mt-10">
      <a href="#" class="flex items-center gap-2 text-sm text-gray-700 hover:text-blue-600">
        <span class="material-icons">settings</span> Settings
      </a>
      <a href="#" class="flex items-center gap-2 text-sm text-red-500 hover:text-red-600">
        <span class="material-icons">logout</span> Log out
      </a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8">
    <div class="text-sm text-gray-500 mb-2">
      Dashboard > <span class="text-gray-800 font-medium">Articles</span>
    </div>

    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Article Management</h1>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Create New Article
      </button>
    </div>
    <p class="text-gray-600 mb-6">Create, edit, and manage all articles.</p>

    <div class="bg-white shadow rounded-lg overflow-hidden">
      <table class="min-w-full text-sm">
        <thead class="bg-gray-100 text-gray-600 text-left">
          <tr>
            <th class="px-6 py-3">Title</th>
            <th class="px-6 py-3">Author</th>
            <th class="px-6 py-3">Status</th>
            <th class="px-6 py-3">Created At</th>
            <th class="px-6 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <tr class="border-t">
            <td class="px-6 py-4">Understanding COPD</td>
            <td class="px-6 py-4">Dr. Emily Carter</td>
            <td class="px-6 py-4">
              <span class="bg-green-100 text-green-700 text-xs font-medium px-2 py-1 rounded-full">Published</span>
            </td>
            <td class="px-6 py-4">Jan 15, 2023, 12:00:00 AM</td>
            <td class="px-6 py-4 relative">
              <button class="material-icons text-gray-500">more_vert</button>
              <!-- Action Dropdown -->
              <div class="relative group inline-block">
                <button class="material-icons text-gray-500 focus:outline-none" type="button" onclick="toggleDropdown(this)">more_vert</button>
                <div class="dropdown-menu absolute right-0 mt-2 w-32 bg-white shadow-md rounded hidden z-10">
                  <a href="/edit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                  <a href="/Delete" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</a>
                </div>
              </div>
