<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        *, ::after, ::before { box-sizing: border-box; }
        body {
            background-color: #212121;
            color: #fff;
            font-family: monospace, serif;
            letter-spacing: 0.05em;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 350px;
            margin: 80px auto 0 auto;
            background: rgba(33,33,33,0.98);
            border-radius: 8px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.3);
            padding: 32px 24px 24px 24px;
            text-align: center;
        }
        h2 {
            font-size: 23px;
            margin-bottom: 16px;
        }
        p {
            margin-bottom: 24px;
        }
        .btn-logout {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(52,9,121,1) 37%, rgba(0,212,255,1) 94%);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-family: monospace, serif;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0.05em;
            cursor: pointer;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .btn-logout:hover {
            opacity: 0.8;
        }
        .credits {
            position: fixed;
            left: 0;
            bottom: 0;
            padding: 15px 15px;
            width: 100%;
            z-index: 111;
            text-align: center;
        }
        .credits a {
            opacity: 0.6;
            color: #fff;
            font-size: 11px;
            text-decoration: none;
        }
        .credits a:hover { opacity: 1; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat datang, {{ $user->name }}</h2>
        <p>Email: {{ $user->email }}</p>
        <a href="/logout" class="btn-logout">Logout</a>
    </div>
    <div class="credits">
        <a href="https://codepen.io/marko-zub/" target="_blank">Made by Salma Safira Ramandha</a>
    </div>
</body>
</html>