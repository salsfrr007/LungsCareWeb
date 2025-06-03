<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Manajemen Fitur Mobile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-6 flex flex-col justify-between">
            <div>
                <!-- Logo -->
                <div class="flex justify-center mb-10">
                    <img src="/images/Logo.png" alt="Lungscare Logo" class="w-40">
                </div>
                <!-- Menu -->
                <nav class="flex flex-col gap-4">
                    <a href="/dashboard" class="flex items-center gap-2 hover:text-blue-600 font-medium">
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
                <a href="#" class="flex items-center gap-2 text-sm text-blue-600 font-semibold">
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
            <h1 class="text-3xl font-bold mb-2 text-white drop-shadow">Manajemen Fitur Aplikasi Mobile</h1>
            <p class="text-gray-200 mb-6">Daftar fitur yang tersedia di aplikasi mobile beserta penjelasannya.</p>
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Feature Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi Fitur</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-700">1</td>
                            <td class="px-6 py-4">Register</td>
                            <td class="px-6 py-4">Pengguna baru dapat mendaftar untuk membuat akun di aplikasi dengan mengisi informasi dasar seperti nama, email, dan password.</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-700">2</td>
                            <td class="px-6 py-4">Login</td>
                            <td class="px-6 py-4">Pengguna yang sudah terdaftar dapat masuk ke aplikasi menggunakan kredensial mereka (username dan password).</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-700">3</td>
                            <td class="px-6 py-4">User Personalization</td>
                            <td class="px-6 py-4">Aplikasi akan menyesuaikan pengalaman pengguna berdasarkan preferensi dan kemajuan mereka, termasuk pengaturan notifikasi dan tampilan antarmuka.</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-700">4</td>
                            <td class="px-6 py-4">Notification</td>
                            <td class="px-6 py-4">Pengguna akan menerima pemberitahuan tentang kemajuan mereka, pengingat untuk tidak merokok, dan tips motivasi.</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-700">5</td>
                            <td class="px-6 py-4">Progress Tracker</td>
                            <td class="px-6 py-4">Fitur ini memungkinkan pengguna untuk memantau konsumsi rokok harian mereka, melihat berapa banyak rokok yang telah dihindari, dan melacak kemajuan menuju tujuan berhenti merokok.</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-700">6</td>
                            <td class="px-6 py-4">Money Saving</td>
                            <td class="px-6 py-4">Menghitung jumlah uang yang dihemat oleh pengguna dengan tidak membeli rokok, memberikan motivasi tambahan untuk terus berusaha.</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-700">7</td>
                            <td class="px-6 py-4">Share Report</td>
                            <td class="px-6 py-4">Pengguna dapat membagikan laporan kemajuan mereka kepada teman atau keluarga melalui media sosial atau pesan langsung, sebagai bentuk dukungan sosial.</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-700">8</td>
                            <td class="px-6 py-4">Cigarettes Avoided</td>
                            <td class="px-6 py-4">Mencatat jumlah rokok yang berhasil dihindari oleh pengguna, membantu mereka memahami dampak positif dari keputusan tersebut.</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-700">9</td>
                            <td class="px-6 py-4">LungsBot</td>
                            <td class="px-6 py-4">Chatbot berbasis AI yang memberikan dukungan langsung kepada pengguna, menjawab pertanyaan, dan memberikan rekomendasi profesional terkait proses berhenti merokok.</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-700">10</td>
                            <td class="px-6 py-4">Artikel Rekomendasi</td>
                            <td class="px-6 py-4">Menyediakan artikel informatif dan tips tentang cara berhenti merokok serta manfaat hidup sehat tanpa rokok.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
