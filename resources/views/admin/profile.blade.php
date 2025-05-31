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

      <!-- Card -->
      <div class="bg-white rounded-lg shadow p-6 max-w-3xl">
        <!-- Section Title -->
        <h2 class="text-xl font-semibold mb-1">Personal Information</h2>
        <p class="text-gray-500 mb-6">Update your name, email, and avatar.</p>

        <form class="space-y-6">
          <!-- Avatar -->
          <div class="flex items-center gap-6">
            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-sm">
              100 × 100
            </div>
            <button type="button" class="flex items-center gap-2 bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586M8.586 7l6.586 6.586"></path>
              </svg>
              Change Avatar
            </button>
          </div>

          <!-- Full Name -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" value="Admin User" disabled class="w-full bg-gray-100 border border-gray-300 text-gray-600 px-4 py-2 rounded-md" />
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" value="admin@lungcare.com" disabled class="w-full bg-gray-100 border border-gray-300 text-gray-600 px-4 py-2 rounded-md" />
          </div>

          <!-- Save Button -->
          <div class="text-right">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition">
              Save Changes
            </button>
          </div>
        </form>
      </div>

    </main>

  </div>

</body>
</html>
