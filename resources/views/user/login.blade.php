<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>  <!-- Title updated to User Login -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 350px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    a {
        display: block;
        margin-top: 10px;
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .alert {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        text-align: center;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

</style>
</head>
<body>
    <div class="form-container">  <!-- Centered Container -->
        <h2>User Login</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('user.login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Enter Email" required><br>

            <input type="password" name="password" placeholder="Enter Password" required><br>

            <button type="submit">Login</button>
        </form>

        <!-- Forgot Password Link -->
        <a href="{{ route('password.request') }}">Forgot Password?</a>

        <a href="{{ route('user.register') }}">Don't have an account? Register</a>
    </div>
    
</body>
</html>
