<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md p-6 flex flex-col justify-between h-screen">
    <div>
      <!-- Logo -->
      <div class="flex justify-end mb-10">
        <img src="/images/Logo.png" alt="Lungscare Logo" class="w-40">
      </div>

      <!-- Menu -->
      <nav class="flex flex-col gap-4">
        <a href="/dashboard" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">dashboard</span> Dashboard
        </a>
        <a href="/articles" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">article</span> Articles
        </a>
        <a href="/user" class="flex items-center gap-2 text-blue-600 font-medium">
          <span class="material-icons">group</span> Active Users
        </a>
        <a href="/profile" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">person</span> Profile
        </a>
      </nav>
    </div>

    <!-- Footer Menu -->
    <div class="flex flex-col gap-4 mt-10">
      <a href="/settings" class="flex items-center gap-2 text-sm hover:text-blue-600">
        <span class="material-icons">settings</span> Settings
      </a>
      <a href="#" onclick="openLogoutPopup(); return false;" class="flex items-center gap-2 text-sm hover:text-red-500">
        <span class="material-icons">logout</span> Log out
      </a>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 p-8">
    <!-- Modal -->
    <div id="userModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
        <span class="close float-right cursor-pointer text-gray-500 text-xl" onclick="closeModal()">&times;</span>
        <h2 class="text-2xl font-bold mb-4">User Details</h2>
        <div class="modal-body space-y-2">
          <p><strong>Username:</strong> <span id="modalName"></span></p>
          <p><strong>Email:</strong> <span id="modalEmail"></span></p>
          <p><strong>Email Verified At:</strong> <span id="modalVerified"></span></p>
          <p><strong>Password:</strong> <span id="modalPassword"></span></p>
          <p><strong>Registered At:</strong> <span id="modalCreatedAt"></span></p>
        </div>
        <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded" onclick="closeModal()">Done</button>
      </div>
    </div>

    <div class="header mb-6">
      <h1 class="text-3xl font-bold text-blue-600">Active User</h1>
    </div>

    <input type="text" id="searchInput" placeholder="Search by name or email..."
      class="w-full mb-4 p-2 border border-gray-300 rounded"/>

    <!-- Tabel Active User -->
    <div class="overflow-auto rounded shadow">
      <table class="min-w-full table-auto">
        <thead class="bg-blue-100 text-blue-600">
          <tr>
            <th class="px-4 py-2 text-left">No</th>
            <th class="px-4 py-2 text-left">Username</th>
            <th class="px-4 py-2 text-left">Email</th>
            <th class="px-4 py-2 text-left">Registration Date</th>
            <th class="px-4 py-2 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $key => $user)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2">{{ $key + 1 }}</td>
            <td class="px-4 py-2">{{ $user->name }}</td>
            <td class="px-4 py-2">{{ $user->email }}</td>
            <td class="px-4 py-2">{{ $user->created_at->format('F j, Y') }}</td>
            <td class="px-4 py-2 space-x-2">
              <button type="button" class="bg-yellow-400 text-white px-2 py-1 rounded"
                onclick="openModal(
                  '{{ $user->name }}',
                  '{{ $user->email }}',
                  '{{ $user->email_verified_at }}',
                  '{{ $user->password }}',
                  '{{ $user->created_at }}'
                )">
                Detail
              </button>
              <form action="{{ route('active.users.delete', $user->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll("table tbody tr");

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
      });
    });

    function openModal(name, email, emailVerifiedAt, password, createdAt) {
      document.getElementById('modalName').textContent = name;
      document.getElementById('modalEmail').textContent = email;
      document.getElementById('modalVerified').textContent = emailVerifiedAt;
      document.getElementById('modalPassword').textContent = password;
      document.getElementById('modalCreatedAt').textContent = createdAt;
      document.getElementById('userModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('userModal').classList.add('hidden');
    }

    window.onclick = function(event) {
      const modal = document.getElementById('userModal');
      if (event.target === modal) {
        closeModal();
      }
    }
  </script>

</body>
</html>
