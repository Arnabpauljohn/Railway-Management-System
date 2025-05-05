<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Management</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .topnav {
            overflow: hidden;
            background-color: #333;
            display: flex;
            justify-content: center;
        }
        .topnav a {
            color: #f2f2f2;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            font-size: 17px;
            transition: background-color 0.3s ease;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2, h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-danger:hover {
            background-color: #da190b;
        }
        .btn:focus {
            outline: none;
        }
        .form-container {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="time"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-container button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="{{ route('admin.comments') }}">Comment</a>
        <a href="{{ route('admin.rules') }}">AI Chatbot</a>
        <a href="#about">About</a>
    </div>

    <div class="container">
        <h2>Train Management</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Train Create Form -->
        <div class="form-container">
            <h3>Add New Train</h3>
            <form action="{{ route('trains.store') }}" method="POST">
                @csrf
                <label for="train_no">Train No:</label>
                <input type="text" id="train_no" name="train_no" required><br>

                <label for="name">Number of Seat:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="route">Route:</label>
                <input type="text" id="route" name="route" required><br>

                <label for="departure_time">Departure Time:</label>
                <input type="time" id="departure_time" name="departure_time" required><br>

                <label for="arrival_time">Arrival Time:</label>
                <input type="time" id="arrival_time" name="arrival_time" required><br>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br>

                <label for="from_city">From City:</label>
                <input type="text" id="from_city" name="from_city" required><br>

                <label for="to_city">To City:</label>
                <input type="text" id="to_city" name="to_city" required><br>

                <label for="prize">Prize (TK):</label>
                <input type="number" id="prize" name="prize" required><br>
                
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" required><br>

                <button type="submit">Add Train</button>
            </form>
        </div>

        <!-- Train List -->
        <h3>All Trains</h3>
        <table>
            <thead>
                <tr>
                    <th>Train No</th>
                    <th>Number of seat</th>
                    <th>Route</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Date</th>
                    <th>From City</th>
                    <th>To City</th>
                    <th>Prize</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trains as $train)
                    <tr>
                        <td>{{ $train->train_no }}</td>
                        <td>{{ $train->name }}</td>
                        <td>{{ $train->route }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->date }}</td>
                        <td>{{ $train->from_city }}</td>
                        <td>{{ $train->to_city }}</td>
                        <td>{{ $train->prize }} TK</td>
                        <td>{{ $train->status }}</td>
                        <td>
                            <a href="{{ route('trains.edit', $train->id) }}" class="btn">Edit</a>
                            <form action="{{ route('trains.destroy', $train->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
