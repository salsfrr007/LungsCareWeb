<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Articles - LungsCare Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>
<body style="background-image: url('/images/background.png'); background-size: cover; background-repeat: no-repeat;">

<div class="flex min-h-screen">

  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md p-6 flex flex-col justify-between">
    <div>
      <div class="flex justify-center mb-10">
        <img src="/images/Logo.png" alt="Lungscare Logo" class="w-32" />
      </div>
      <nav class="flex flex-col gap-4">
        <a href="/dashboard" class="flex items-center gap-2 hover:text-blue-600">
          <span class="material-icons">dashboard</span> Dashboard
        </a>
        <a href="{{ route('articles.index') }}" class="flex items-center gap-2 text-blue-600 font-medium">
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

    <!-- POPUP GAMBAR -->
    @if(isset($popupImage) && $popupImage !== 'confirm-delete.png')
      <div id="popup" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-70">
        <img src="{{ asset('images/' . $popupImage) }}" alt="Popup" class="max-w-xs md:max-w-sm lg:max-w-md rounded-lg shadow-lg transition-transform duration-300 scale-100" />
      </div>
      <script>
        setTimeout(() => {
          const popup = document.getElementById('popup');
          if (popup) popup.remove();
        }, 3000);
      </script>
    @endif

    <!-- POPUP KONFIRMASI DELETE -->
    <div id="deleteConfirmPopup" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-70">
      <div class="relative">
        <img src="{{ asset('images/confirm-delete.png') }}" alt="Confirm Delete" class="w-64 md:w-80 lg:w-96 rounded-xl shadow-lg" />
        <form id="deleteForm" method="POST" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-4">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Iya</button>
          <button type="button" onclick="hideDeletePopup()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Tidak</button>
        </form>
      </div>
    </div>

    <!-- Header Bar -->
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl text-white font-bold">Articles</h2>
      <div class="flex-1 px-6">
        <input id="searchInput" type="text" placeholder="Search articles..." class="w-full px-4 py-2 rounded border border-gray-300 shadow" />
      </div>
      <a href="{{ route('articles.create') }}" class="ml-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        + Add Article
      </a>
    </div>

    <!-- Tabel Artikel -->
    <table id="articlesTable" class="min-w-full bg-white rounded shadow overflow-hidden">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="p-3 text-center">ID</th>
          <th class="p-3 text-center">Title</th>
          <th class="p-3 text-center">Author</th>
          <th class="p-3 text-center">Link URL</th>
          <th class="p-3 text-center">Date</th>
          <th class="p-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody id="articlesBody">
        @forelse($articles as $article)
          <tr class="border-b text-center">
            <td class="p-3">{{ $article['id'] }}</td>
            <td class="p-3">{{ $article['judul'] }}</td>
            <td class="p-3">{{ $article['author'] }}</td>
            <td class="p-3">
              <a href="{{ $article['link'] }}" class="text-blue-600 underline" target="_blank">
                {{ $article['link'] }}
              </a>
            </td>
            <td class="p-3">
              {{ isset($article['tanggal']) ? \Carbon\Carbon::parse($article['tanggal'])->format('d M Y') : '-' }}
            </td>
            <td class="p-3">
              <a href="{{ route('articles.edit', $article['id']) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
              <button onclick="showDeletePopup({{ $article['id'] }})" class="text-red-600 hover:underline">Delete</button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="p-3 text-center text-gray-600">Belum ada artikel.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </main>
</div>

<!-- Script -->
<script>
  function showDeletePopup(articleId) {
    const popup = document.getElementById('deleteConfirmPopup');
    const form = document.getElementById('deleteForm');
    form.action = `/articles/${articleId}`;
    popup.classList.remove('hidden');

    form.onsubmit = () => {
      popup.classList.add('hidden');
    };
  }

  function hideDeletePopup() {
    document.getElementById('deleteConfirmPopup').classList.add('hidden');
  }

  // Pencarian termasuk tanggal
  const searchInput = document.getElementById('searchInput');
  searchInput.addEventListener('input', function () {
    const query = this.value.toLowerCase();
    const rows = document.querySelectorAll('#articlesBody tr');

    rows.forEach(row => {
      const title = row.cells[1]?.innerText.toLowerCase() || '';
      const author = row.cells[2]?.innerText.toLowerCase() || '';
      const tanggal = row.cells[5]?.innerText.toLowerCase() || '';
      if (title.includes(query) || author.includes(query) || tanggal.includes(query)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>

</body>
</html>
