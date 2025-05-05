<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Password</title>  <!-- Title updated to "Update Password" -->
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

</style>
</head>
<body>
    <div class="form-container">
        <h2>Update Password</h2>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form action="{{ route('admin.password_update') }}" method="POST">
            @csrf
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required><br><br>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required><br><br>

            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" required><br><br>

            <button type="submit">Update Password</button>
        </form>
    </div>
</body>
</html>
