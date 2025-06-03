<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LungsCare Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");
    body {
      font-family: 'Poppins', sans-serif;
    }
    .error-messages ul { list-style-type: none; padding: 0; margin: 0; }
    .error-messages li { margin-bottom: 0.5rem; }
  </style>
</head>
<body class="white">
  <div class="min-h-screen flex flex-col md:flex-row">

    <!-- Logo -->
    <div class="absolute top-6 left-6 z-50">
      <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-8 w-auto" />
    </div>

    <!-- Left side (Slider) -->
    <div class="md:w-1/2 w-full flex flex-col justify-center items-center px-8 py-12 bg-white relative">
      <div class="relative w-72 h-80 flex flex-col items-center justify-start">
        <div class="relative w-full h-64">
          <img id="slider-image" src="{{ asset('images/asset1.png') }}" alt="Motivation" class="absolute w-full h-full object-contain transition-opacity duration-1000 opacity-100" />
          <img id="next-image" src="{{ asset('images/asset2.png') }}" class="absolute w-full h-full object-contain transition-opacity duration-1000 opacity-0" />
        </div>
        <p id="slider-caption" class="text-center text-gray-700 font-medium mt-4">
          Temukan dukungan untuk membantumu menjauhi kebiasaan merokok
        </p>
        <div class="flex justify-center space-x-2 mt-4" id="slider-dots">
          <span class="w-2 h-2 rounded-full bg-[#0B3D91] cursor-pointer" data-index="0"></span>
          <span class="w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-index="1"></span>
          <span class="w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-index="2"></span>
        </div>
      </div>
    </div>

  <!-- Right side (Login Form) -->
<div class="md:w-1/2 w-full relative flex items-center justify-center bg-cover bg-no-repeat"
     style="background-image: url('{{ asset("images/background.png") }}'); background-size: cover; background-position: center;">
  <div class="absolute inset-0 bg-gradient-to-b from-[#8a9bf7] to-[#0b3d91] opacity-80"></div>
  <div class="relative z-10 w-full max-w-md px-6 py-10">
    <h1 class="text-white text-4xl font-extrabold mb-1">Welcome Back!</h1> <!-- Simplified title -->
    <p class="text-white text-xs mb-6">Enter your credentials to access your account</p>

        @if ($errors->any())
          <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif

        @if(session('success'))
          <div id="popup-success" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded shadow-lg">
              {{ session('success') }}
            </div>
          </div>
          <script>
            setTimeout(() => {
              const popup = document.getElementById('popup-success');
              if (popup) popup.style.display = 'none';
            }, 2000);
          </script>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
          @csrf
          <div>
            <label for="username" class="block text-white font-semibold mb-1">Username</label>
            <input 
              id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
              class="w-full rounded-md border border-black border-opacity-40 px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-[#8a9bf7] @error('username') border-red-500 @enderror"
            />
          </div>
          <div>
            <label for="password" class="block text-white font-semibold mb-1">Password</label>
            <input 
              id="password" name="password" type="password" required
              class="w-full rounded-md border border-black border-opacity-40 px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-[#8a9bf7] @error('password') border-red-500 @enderror"
            />
          </div>
          
          <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-[#0B3D91] focus:ring-[#8a9bf7] border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-white">
                    Remember me
                </label>
            </div>
            <a href="#" class="text-sm text-white hover:underline">Forgot your password?</a>
          </div>

          <button 
            type="submit"
            class="w-full bg-white text-[#0B3D91] font-bold py-2 rounded-md hover:bg-gray-100 transition"
          >
            Login
          </button>

          <div class="text-center mt-4">
            <p class="text-sm text-white">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-medium text-white hover:underline">Register here</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Slider Script -->
  <script>
    const images = [
      {
        src: "{{ asset('images/asset1.png') }}",
        caption: "Temukan dukungan untuk membantumu menjauhi kebiasaan merokok"
      },
      {
        src: "{{ asset('images/asset2.png') }}",
        caption: "Dapatkan tips hidup sehat dan inspirasi setiap hari"
      },
      {
        src: "{{ asset('images/asset3.png') }}",
        caption: "Bersama kita bisa wujudkan hidup tanpa rokok"
      }
    ];

    let current = 0;
    const img = document.getElementById('slider-image');
    const nextImg = document.getElementById('next-image');
    const caption = document.getElementById('slider-caption');
    const dots = document.querySelectorAll('#slider-dots span');
    let isTransitioning = false;

    function showSlide(index) {
      if (index === current || isTransitioning || !images[index]) return; // Added !images[index] for safety
      isTransitioning = true;

      nextImg.src = images[index].src;
      nextImg.style.opacity = 0;
      nextImg.classList.remove('hidden'); // Ensure it's not hidden if it was before
      nextImg.classList.remove('opacity-100');
      nextImg.classList.add('opacity-0');
      nextImg.style.zIndex = 2;
      img.style.zIndex = 1;

      setTimeout(() => {
        nextImg.classList.remove('opacity-0');
        nextImg.classList.add('opacity-100');
      }, 10);

      img.classList.remove('opacity-100');
      img.classList.add('opacity-0');

      dots.forEach((dot, i) => {
        dot.classList.toggle('bg-[#0B3D91]', i === index);
        dot.classList.toggle('bg-gray-300', i !== index);
      });

      setTimeout(() => {
        img.src = images[index].src;
        caption.textContent = images[index].caption;
        img.classList.remove('opacity-0');
        img.classList.add('opacity-100');
        nextImg.classList.remove('opacity-100');
        nextImg.classList.add('opacity-0');
        // nextImg.classList.add('hidden'); // Hide it again after transition
        isTransitioning = false;
        current = index;
      }, 600); // Sync with transition duration
    }

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        showSlide(i);
      });
    });

    // Auto-slide
    if (images.length > 1) {
        setInterval(() => {
            const next = (current + 1) % images.length;
            showSlide(next);
        }, 3500);
    }
    // Ensure the first slide is shown correctly if assets are present
    if (images.length > 0 && img) {
        img.src = images[0].src;
        if(caption) caption.textContent = images[0].caption;
    } else if (img) {
        // Fallback if images array is empty or not properly configured
        img.alt = "Welcome";
        if(caption) caption.textContent = "Welcome to LungsCare";
    }

    // Ensure background image path is correct using asset()
    const rightSideDiv = document.querySelector('.md\\:w-1\\/2.w-full.relative.flex.items-center.justify-center');
    if (rightSideDiv) {
        rightSideDiv.style.backgroundImage = `url('{{ asset("images/background.png") }}')`;
    }
  </script>
</body>
</html> 