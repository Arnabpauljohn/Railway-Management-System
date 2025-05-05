<!DOCTYPE html>
<html>
<head>
    <title>Booking Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
        }
        .details {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Booking Slip</h2>
    <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
    <p><strong>Train Number:</strong> {{ $booking->train_no }}</p>
    <p><strong>Name:</strong> {{ $booking->user->name }}</p>
    <p><strong>Date:</strong> {{ $booking->created_at->format('d-m-Y') }}</p>

    <table class="details">
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Ticket Price</th>
        </tr>
        <tr>
            <td>{{ $booking->from_city }}</td>
            <td>{{ $booking->to_city }}</td>
            <td>{{ \Carbon\Carbon::parse($booking->departure_time)->format('H:i') }}</td>
            <td>{{ \Carbon\Carbon::parse($booking->arrival_time)->format('H:i') }}</td>
            <td>${{ number_format($booking->ticket_price, 2) }}</td>  
        </tr>
    </table>

    @if($booking->payment_status === 'paid')
        <!-- Button to download the booking slip -->
        <a href="{{ route('download.booking', ['booking_id' => $booking->id]) }}" class="btn btn-primary">Download Booking Slip</a>
    @else
        <p>Payment is not successful. Please complete payment to get the booking slip.</p>
    @endif
</body>
</html>
