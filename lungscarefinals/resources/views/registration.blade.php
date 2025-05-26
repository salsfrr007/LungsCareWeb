<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <style>
        *, ::after, ::before { box-sizing: border-box; }
        body {
            background-color: #212121;
            color: #fff;
            font-family: monospace, serif;
            letter-spacing: 0.05em;
        }
        h1 { font-size: 23px; }
        .form {
            width: 300px;
            padding: 64px 15px 24px;
            margin: 0 auto;
        }
        .control { margin: 0 0 24px; }
        .control input {
            width: 100%;
            padding: 14px 16px;
            border: 0;
            background: transparent;
            color: #fff;
            font-family: monospace, serif;
            letter-spacing: 0.05em;
            font-size: 16px;
        }
        .control input:focus { outline: none; }
        .btn {
            width: 100%;
            display: block;
            padding: 14px 16px;
            background: transparent;
            outline: none;
            border: 0;
            color: #fff;
            letter-spacing: 0.1em;
            font-weight: bold;
            font-family: monospace;
            font-size: 16px;
            cursor: pointer;
        }
        .block-cube {
            position: relative;
        }
        .block-cube .bg-top {
            position: absolute;
            height: 10px;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(52,9,121,1) 37%, rgba(0,212,255,1) 94%);
            bottom: 100%;
            left: 5px;
            right: -5px;
            transform: skew(-45deg, 0);
            margin: 0;
        }
        .block-cube .bg-inner {
            background: #212121;
            position: absolute;
            left: 2px;
            top: 2px;
            right: 2px;
            bottom: 2px;
        }
        .block-cube .bg-right {
            position: absolute;
            background: rgba(0,212,255,1);
            top: -5px;
            z-index: 0;
            bottom: 5px;
            width: 10px;
            left: 100%;
            transform: skew(0, -45deg);
        }
        .block-cube .bg {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(52,9,121,1) 37%, rgba(0,212,255,1) 94%);
        }
        .block-cube .text {
            position: relative;
            z-index: 2;
        }
        .block-cube.block-input input {
            position: relative;
            z-index: 2;
        }
        .block-cube.block-input .bg-top,
        .block-cube.block-input .bg-right,
        .block-cube.block-input .bg {
            background: rgba(255,255,255,0.5);
            transition: background 0.2s ease-in-out;
        }
        .block-cube.block-input:focus,
        .block-cube.block-input:hover {
            background: rgba(255,255,255,0.8);
        }
        .credits {
            position: fixed;
            left: 0;
            bottom: 0;
            padding: 15px 15px;
            width: 100%;
            z-index: 111;
        }
        .credits a {
            opacity: 0.6;
            color: #fff;
            font-size: 11px;
            text-decoration: none;
        }
        .credits a:hover { opacity: 1; }
        a { color: #00d4ff; text-decoration: none; }
    </style>
</head>
<body>
    <form class="form" method="POST" action="/register" autocomplete="off">
        <div class="control">
            <h1>Registrasi</h1>
        </div>
        @csrf
        @if (session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif
        @if ($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
        @endif
        <div class="control block-cube block-input">
            <input type="text" name="name" placeholder="Nama" required>
            <div class="bg-top"><div class="bg-inner"></div></div>
            <div class="bg-right"><div class="bg-inner"></div></div>
            <div class="bg"><div class="bg-inner"></div></div>
        </div>
        <div class="control block-cube block-input">
            <input type="email" name="email" placeholder="Email" required>
            <div class="bg-top"><div class="bg-inner"></div></div>
            <div class="bg-right"><div class="bg-inner"></div></div>
            <div class="bg"><div class="bg-inner"></div></div>
        </div>
        <div class="control block-cube block-input">
            <input type="password" name="password" placeholder="Password" required>
            <div class="bg-top"><div class="bg-inner"></div></div>
            <div class="bg-right"><div class="bg-inner"></div></div>
            <div class="bg"><div class="bg-inner"></div></div>
        </div>
        <button class="btn block-cube block-cube-hover" type="submit">
            <div class="bg-top"><div class="bg-inner"></div></div>
            <div class="bg-right"><div class="bg-inner"></div></div>
            <div class="bg"><div class="bg-inner"></div></div>
            <span class="text">Register</span>
        </button>
        <div style="margin-top:16px;text-align:center;">
            <a href="/login">Kembali ke Login</a>
        </div>
    </form>
    <div class="credits">
        <a href="https://codepen.io/marko-zub/" target="_blank">Made by Salma Safira Ramandha</a>
    </div>
</body>
</html>