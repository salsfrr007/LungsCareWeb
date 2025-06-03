<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Background styles */
        body {
            background-image: url('/images/background.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Logout popup styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-box {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        .popup-box img {
            width: 120px;
            margin: 0 auto 1rem;
        }

        .popup-box h2 {
            color: #1a1a1a;
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .popup-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn-yes, .btn-no {
            padding: 0.5rem 2rem;
            border-radius: 0.25rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-yes {
            background-color: #ef4444;
            color: white;
            border: none;
        }

        .btn-no {
            background-color: #e5e7eb;
            color: #374151;
            border: none;
        }

        .btn-yes:hover { background-color: #dc2626; }
        .btn-no:hover { background-color: #d1d5db; }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-6 flex flex-col justify-between">
            <div>
                <!-- Logo -->
                <div class="flex justify-right mb-10">
                    <img src="/images/Logo.png" alt="Lungscare Logo" class="w-40">
                </div>

                <!-- Menu -->
                <nav class="flex flex-col gap-4">
                    <a href="/dashboard" class="flex items-center gap-2 text-blue-600 font-medium">
                        <span class="material-icons">dashboard</span> Dashboard
                    </a>
                    <a href="/articles" class="flex items-center gap-2 hover:text-blue-600">
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
                <a href="/settings" class="flex items-center gap-2 text-sm hover:text-blue-600">
                    <span class="material-icons">settings</span> Settings
                </a>
                <a href="#" onclick="openLogoutPopup(); return false;" 
                   class="flex items-center gap-2 text-sm hover:text-red-500">
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
                    <div class="rounded-lg w-full h-[300px] max-h-[300px] overflow-y-auto p-4 border border-gray-200 text-sm leading-relaxed" style="min-height: 300px;">
                        <p>
                            Lung health is crucial for a quality life, yet often overlooked. Many respiratory diseases like asthma, bronchitis, or COPD stem from lifestyle habits such as smoking, exposure to pollutants, and poor air quality. This article highlights the importance of regular check-ups, avoiding smoking, and maintaining clean indoor air. Exercise also plays a vital role, as it increases lung capacity and improves breathing efficiency. Awareness campaigns during Lung Health Month aim to educate people about early symptoms such as persistent coughing, shortness of breath, or chest discomfort. Early diagnosis and treatment can make a significant difference. Stay informed, stay healthy.
                        </p>
                    </div>
                    <div class="mt-4 text-right">
                        <a href="/articles" class="text-blue-600 hover:underline font-medium">See more →</a>
                    </div>
                </div>

</div>

            </div>
        </main>
    </div>



    <!-- Logout Popup -->
    <div id="logoutPopup" class="popup-overlay">
        <div class="popup-box">
            <img src="{{ asset('images/logout.png') }}" alt="Logout" class="w-50 mx-auto mb-5">
            <h2 class="text-xl font-semibold mb-6">Apakah Anda yakin ingin keluar?</h2>
            <div class="popup-buttons">
              <form method="POST" action="{{ route('logout') }}" class="inline w-1/2">
                @csrf
                <button type="submit" class="btn-yes w-full">Ya</button>
              </form>
              <button type="submit" class="btn-no w-1/2" onclick="closeLogoutPopup()">Tidak</button>
            </div>
            <style>
              .btn-yes{
                width: 100%;
                min-width: 100px;
              }
              .btn-no {
                width: 100%;
                min-width: 50px;
              }
              .popup-buttons .btn-yes {
                background-color: #2563eb !important; /* Tailwind blue-600 */
                color: #fff;
              }
              .popup-buttons .btn-yes:hover {
                background-color: #1d4ed8 !important; /* Tailwind blue-700 */
              }
            </style>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function openLogoutPopup() {
            document.getElementById('logoutPopup').style.display = 'flex';
        }

        function closeLogoutPopup() {
            document.getElementById('logoutPopup').style.display = 'none';
        }

        // Close popup when clicking outside
        document.getElementById('logoutPopup').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLogoutPopup();
            }
        });

        // Success popup auto-hide
        if(session('success'))
            setTimeout(function() {
                document.getElementById('popup-success').style.display = 'none';
            }, 2000);
        endif
    </script>
</body>
</html>