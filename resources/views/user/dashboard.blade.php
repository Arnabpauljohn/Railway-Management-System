<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .topnav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            padding: 10px 20px;
        }
        .topnav .nav-links {
            display: flex;
            gap: 15px;
        }
        .topnav a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
            border-radius: 5px;
        }
        .topnav a:hover {
            background-color: #007bff;
        }
        .logout-form {
            margin: 0;
        }
        .logout-btn {
            background-color:rgb(8, 3, 3);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color:rgb(2, 1, 1);
        }
        .container {
            margin-top: 50px;
            width: 60%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-search {
            width: 100%;
        }
        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="topnav">
    <div class="nav-links">
        <a href="#">Home</a>
        <a href="{{ route('comments.index') }}">Comment</a>
        <a href="{{ route('ask.question') }}">AI Chatbot</a>
        <a href="{{ route('about') }}">About Us</a>
    </div>
    
    <a href="{{ route('logout.confirm') }}" class="btn btn-black">Logout</a>

</div>

<div class="container">
    <h2 class="text-center">Search for a Train</h2>

    <form action="{{ route('train.search') }}" method="GET">
    <div class="mb-3">
        <label for="from_city" class="form-label">From City:</label>
        <select name="from_city" class="form-control" required>
            <option value="" disabled selected>Select Departure City</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Khulna">Khulna</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Barisal">Barisal</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Mymensingh">Mymensingh</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="to_city" class="form-label">To City:</label>
        <select name="to_city" class="form-control" required>
            <option value="" disabled selected>Select Destination City</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Khulna">Khulna</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Barisal">Barisal</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Mymensingh">Mymensingh</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-search">Search</button>
</form>


    @if(isset($trains))
    <h3 class="mt-4">Available Trains</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Train No</th>
                <th>Seat Number</th>
                <th>Route</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Fare (TK)</th>
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
                    <td>{{ $train->prize }}</td>
                    <td>
                    <a href="{{ route('stripe', ['train_no' => $train->train_no]) }}" class="btn btn-primary">Book Now</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if(isset($booking) && $booking->payment_status == 'paid')
    <a href="{{ route('bookingSlip', ['booking_id' => $booking->id]) }}" class="btn btn-success">Download Booking Slip</a>
    @else
    <p class="text-danger">You need to complete the payment to download the booking slip.</p>
    @endif

</div>
</body>
</html>
