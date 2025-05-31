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
  <div class="container">
      <!-- Sidebar -->
      <aside>
        <h2>Admin Panel</h2>
        <nav>
          <a href="/dashboard">
            <span class="material-icons">dashboard</span> Dashboard
          </a>
          <a href="/article">
            <span class="material-icons">article</span> Articles
          </a>
          <a href="/user">
            <span class="material-icons">group</span> Active Users
          </a>
          <a href="/profile" class="active">
            <span class="material-icons">person</span> Profile
          </a>
        </nav>
      </aside>

    <div class="main-content">
                <!-- Modal -->
                <div id="userModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <h2>User Details</h2>
                        <div class="modal-body">
                            <p><strong>Username:</strong> <span id="modalName"></span></p>
                            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                            <p><strong>Email Verified At:</strong> <span id="modalVerified"></span></p>
                            <p><strong>Password:</strong> <span id="modalPassword"></span></p>
                            <p><strong>Registered At:</strong> <span id="modalCreatedAt"></span></p>
                        </div>
                        <button class="btn-done" onclick="closeModal()">Done</button>
                    </div>
                </div>

                <div class="header">
                    <h1><strong>Active User</strong></h1>
                </div>
                <input type="text" id="searchInput" placeholder="Search by name or email...">
                
                <!-- Tabel Active User -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('F j, Y') }}</td>
                            <td>
                                <button type="button" class="btn btn-warning"
                                    onclick="openModal(
                                        '{{ $user->name }}',
                                        '{{ $user->email }}',
                                        '{{ $user->email_verified_at }}',
                                        '{{ $user->password }}',
                                        '{{ $user->created_at }}'
                                    )">
                                    Detail
                                </button>
                                <form action="{{ route('active.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
            document.getElementById('userModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('userModal').style.display = 'none';
        }

        // Tutup modal jika klik di luar konten
        window.onclick = function(event) {
            const modal = document.getElementById('userModal');
            if (event.target === modal) {
                closeModal();
            }
        }

    </script>
</body>

</html>