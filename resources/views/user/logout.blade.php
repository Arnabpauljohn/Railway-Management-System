<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(3, 1, 1, 0);
            text-align: center;
            border-radius: 8px;
            width: 350px;
        }

        .logout-container h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .logout-btn {
            background-color:rgb(1, 0, 0);
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
        }

        .cancel-btn {
            background-color: #ccc;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .cancel-btn:hover {
            background-color: #999;
        }
    </style>
</head>
<body>

<div class="logout-container">
    <h2>Are you sure you want to logout?</h2>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Yes, Logout</button>
    </form>

    <!-- Cancel Button -->
    <button class="cancel-btn" onclick="window.history.back();">Cancel</button>
</div>

</body>
</html>
