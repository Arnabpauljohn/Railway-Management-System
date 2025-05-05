<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            font-size: 16px;
            color: #555;
            text-align: left;
            margin-bottom: 5px;
            display: block;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .form-container ul {
            color: red;
            padding-left: 0;
            list-style-type: none;
        }

        .form-container a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .status-message {
            background-color: #f0f8ff;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #a8d7ff;
            border-radius: 5px;
            color: #004a74;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Forgot Password</h1>

        @if(session('status'))
            <div class="status-message">
                <p>{{ session('status') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            <button type="submit">Send Password Reset Link</button>
        </form>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

</body>
</html>
