<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Add some basic styling -->
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f4f4; margin: 0; }
        .container { background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; color: #333; }
        label { display: block; margin-bottom: 0.5rem; color: #555; }
        input[type="text"], input[type="password"] { width: calc(100% - 1.2rem); padding: 0.6rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 4px; }
        button { background-color: #007bff; color: white; padding: 0.7rem 1rem; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #0056b3; }
        .error { color: red; font-size: 0.9em; margin-bottom: 1rem; }
        .login-link { text-align: center; margin-top: 1rem; }
        .login-link a { color: #007bff; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div>
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">
                    Register
                </button>
            </div>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>
</body>
</html> 