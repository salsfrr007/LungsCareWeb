<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Article - LungsCare Admin</title>
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
    <!-- User Info and Footer Menu -->
    <div>
        @auth
            <div class="mb-4 p-2 rounded bg-gray-100 text-sm text-gray-700 text-center">
                Logged in as: <br>
                <span class="font-semibold">{{ Auth::user()->name }}</span>
            </div>
        @endauth
        <div class="flex flex-col gap-4 mt-auto">
            <a href="#" class="flex items-center gap-2 text-sm hover:text-blue-600">
              <span class="material-icons">settings</span> Settings
            </a>
            <a href="/login" class="flex items-center gap-2 text-sm hover:text-red-500">
              <span class="material-icons">logout</span> Log out
            </a>
        </div>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-10">
    <h2 class="text-2xl text-white font-bold mb-6">Edit Artikel</h2>

    @if($errors->any())
      <div class="mb-4 p-4 bg-red-500 text-white rounded">
        <ul class="list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('articles.update', $article['id']) }}" method="POST" class="bg-white p-6 rounded shadow max-w-2xl">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="judul" class="block font-semibold mb-1">Judul</label>
        <input type="text" id="judul" name="judul" value="{{ old('judul', $article['judul']) }}" class="w-full border border-gray-300 rounded px-3 py-2" required />
      </div>

      <div class="mb-4">
        <label for="link" class="block font-semibold mb-1">Link</label>
        <input type="url" id="link" name="link" value="{{ old('link', $article['link']) }}" class="w-full border border-gray-300 rounded px-3 py-2" required />
      </div>

      <div class="mb-4">
        <label for="author" class="block font-semibold mb-1">Author</label>
        <input type="text" id="author" name="author" value="{{ old('author', $article['author']) }}" class="w-full border border-gray-300 rounded px-3 py-2" required />
      </div>

      {{-- <div class="mb-4">
        <label for="tanggal" class="block font-semibold mb-1">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $article['tanggal']) }}" class="w-full border border-gray-300 rounded px-3 py-2" required />
      </div> --}}

      <div class="mb-6">
        <label for="ringkasan" class="block font-semibold mb-1">Ringkasan</label>
        <textarea id="ringkasan" name="ringkasan" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required>{{ old('ringkasan', $article['ringkasan']) }}</textarea>
      </div>

      <div class="flex justify-end gap-4">
        <a href="{{ route('articles.index') }}" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Update</button>
      </div>
    </form>
  </main>
</div>

</body>
</html>
