<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
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

    .gen-btn {
        margin-top: -5px;
        background-color: green;
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
    </style>
</head>
<body>
    <div class="form-container"> 
        <h2>User Registration</h2>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter Name" required><br>

            <input type="email" name="email" placeholder="Enter Email" required><br>

            <input type="password" name="password" placeholder="Enter Password" required><br>

            <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>

            <!-- Password Generator Button -->
            <button type="button" onclick="generatePassword()" class="gen-btn">Generate Strong Password</button><br><br>

            <button type="submit">Register</button>
        </form>

        <a href="{{ route('user.login') }}">Already have an account? Login</a>
    </div>

    <!-- Password Generator Script -->
    <script>
        function generatePassword() {
            const chars = "ABCDEFGHIJKLMNOPQRSTUVWZYZ123456789abcdefghijklmnopqrstuvwxyz#*&^%?<&><:";
            let password = "";
            for (let i = 0; i < 10; i++) {
                const randomIndex = Math.floor(Math.random() * chars.length);
                password += chars.charAt(randomIndex);
            }

            document.querySelector('input[name="password"]').value = password;
            document.querySelector('input[name="password_confirmation"]').value = password;

            alert("Generated Password: " + password);
        }
    </script>
</body>
</html>
