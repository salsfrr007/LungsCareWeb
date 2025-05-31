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
     style="background-image: url('/images/background.png'); background-size: cover; background-position: center;">
  <div class="absolute inset-0 bg-gradient-to-b from-[#8a9bf7] to-[#0b3d91] opacity-80"></div>
  <div class="relative z-10 w-full max-w-md px-6 py-10">
    <h1 class="text-white text-4xl font-extrabold mb-1">Welcome Back<br />Admin!</h1>
    <p class="text-white text-xs mb-6">Enter your credentials to access the dashboard</p>

        @if(session('loginError'))
          <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            {{ session('loginError') }}
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
              document.getElementById('popup-success').style.display = 'none';
            }, 2000);
          </script>
        @endif

        <form method="POST" action="{{ url('/auth') }}" class="space-y-5">
          @csrf
          <div>
            <label for="username" class="block text-white font-semibold mb-1">Username</label>
            <input 
              id="username" name="username" type="text" required
              class="w-full rounded-md border border-black border-opacity-40 px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-[#8a9bf7]"
            />
          </div>
          <div>
            <label for="password" class="block text-white font-semibold mb-1">Password</label>
            <input 
              id="password" name="password" type="password" required
              class="w-full rounded-md border border-black border-opacity-40 px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-[#8a9bf7]"
            />
          </div>
          <div class="flex justify-end">
            <a href="#" class="text-sm text-white hover:underline">Forgot your password?</a>
          </div>
          <button 
            type="submit"
            class="w-full bg-white text-[#0B3D91] font-bold py-2 rounded-md hover:bg-gray-100 transition"
          >
            Login
          </button>
        </form>
      </div>
    </>
  </>

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
      if (index === current || isTransitioning) return;
      isTransitioning = true;

      // Prepare next image and caption
      nextImg.src = images[index].src;
      nextImg.style.opacity = 0;
      nextImg.classList.remove('hidden');
      nextImg.classList.remove('opacity-100');
      nextImg.classList.add('opacity-0');
      nextImg.style.zIndex = 2;
      img.style.zIndex = 1;

      // Animate fade in next image
      setTimeout(() => {
        nextImg.classList.remove('opacity-0');
        nextImg.classList.add('opacity-100');
      }, 10);

      // Animate fade out current image
      img.classList.remove('opacity-100');
      img.classList.add('opacity-0');

      // Update dots
      dots.forEach((dot, i) => {
        dot.classList.toggle('bg-[#0B3D91]', i === index);
        dot.classList.toggle('bg-gray-300', i !== index);
      });

      // After transition, swap images
      setTimeout(() => {
        img.src = images[index].src;
        caption.textContent = images[index].caption;
        img.classList.remove('opacity-0');
        img.classList.add('opacity-100');
        nextImg.classList.remove('opacity-100');
        nextImg.classList.add('opacity-0');
        isTransitioning = false;
        current = index;
      }, 600);
    }

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        showSlide(i);
      });
    });

    setInterval(() => {
      const next = (current + 1) % images.length;
      showSlide(next);
    }, 3500);
    </script>
</body>
</html>  