<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Train</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .topnav {
            overflow: hidden;
            background-color: #333;
        }
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }
        .container {
            padding: 20px;
        }
        .form-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>

    <div class="container">
        <h2>Edit Train</h2>

        <div class="form-container">
            <form action="{{ route('trains.update', $train->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="train_no">Train No:</label>
                <input type="text" id="train_no" name="train_no" value="{{ $train->train_no }}" required><br><br>

                <label for="name">Train Name:</label>
                <input type="text" id="name" name="name" value="{{ $train->name }}" required><br><br>

                <label for="route">Route:</label>
                <input type="text" id="route" name="route" value="{{ $train->route }}" required><br><br>

                <label for="departure_time">Departure Time:</label>
                <input type="time" id="departure_time" name="departure_time" value="{{ $train->departure_time }}" required><br><br>

                <label for="arrival_time">Arrival Time:</label>
                <input type="time" id="arrival_time" name="arrival_time" value="{{ $train->arrival_time }}" required><br><br>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="{{ $train->date }}" required><br><br>

                <label for="from_city">From City:</label>
                <input type="text" id="from_city" name="from_city" value="{{ $train->from_city }}" required><br><br>

                <label for="to_city">To City:</label>
                <input type="text" id="to_city" name="to_city" value="{{ $train->to_city }}" required><br><br>

                <label for="prize">Prize (TK):</label>
                <input type="number" id="prize" name="prize" value="{{ $train->prize }}" required><br><br>

                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="{{ $train->status }}" required><br><br>

                <button type="submit" class="btn">Update Train</button>
            </form>
        </div>
    </div>

</body>
</html>
