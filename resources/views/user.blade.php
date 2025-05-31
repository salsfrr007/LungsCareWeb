<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800" style="background-image: url('/images/background.png'); background-size: cover; background-position: center;"></body>

  <div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-6 space-y-6">
      <h2 class="text-xl font-bold text-blue-600 mb-4">Admin Panel</h2>
      <nav class="flex flex-col gap-4 text-gray-700">
        <a href="/dashboard" class="flex items-center gap-2 hover:text-blue-600 font-medium">
          <span class="material-icons">dashboard</span> Dashboard
        </a>
        <a href="/article" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">article</span> Articles
        </a>
        <a href="/user" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">group</span> Active Users
        </a>
        <a href="/profile" class="flex items-center gap-2 text-blue-600 font-semibold">
          <span class="material-icons">person</span> Profile
        </a>
      </nav>
    </aside>
    

    <!-- Main Content -->
    <main class="flex-1 p-10">

      <!-- Breadcrumb -->
      <div class="text-sm text-white mb-2">
        <a href="#" class="hover:underline">Dashboard</a> &gt; <span class="text-blue-200 font-medium">Profile</span>
      </div>

      <!-- Header -->
      <h1 class="text-3xl font-bold mb-1 text-white">Profile Management</h1>
      <p class="text-gray-100 mb-8">View and update your admin profile information.</p>