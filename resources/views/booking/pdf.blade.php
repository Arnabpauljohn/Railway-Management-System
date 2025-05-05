<!-- resources/views/booking/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Slip PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .company-name {
            font-weight: bold;
            font-size: 20px;
            color: #2d3e50;
        }

        .details {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .details th, .details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .details th {
            background-color: #f7f7f7;
            color: #333;
        }

        .details td {
            background-color: #fff;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }

        .footer p {
            margin: 0;
        }

        .highlight {
            color: #ff6347;
            font-weight: bold;
        }

        .download-btn {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .download-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="company-name">autoRail</div>
            <h3>Booking Slip</h3>
        </header>

        <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
        <p><strong>Train Number:</strong> {{ $booking->train_no }}</p>
        <p><strong>From:</strong> {{ $booking->from_city }} <strong>To:</strong> {{ $booking->to_city }}</p>
        <p><strong>Departure:</strong> {{ \Carbon\Carbon::parse($booking->departure_time)->format('d-m-Y H:i') }}</p>
        <p><strong>Arrival:</strong> {{ \Carbon\Carbon::parse($booking->arrival_time)->format('d-m-Y H:i') }}</p>
        <p><strong>Price:</strong> ${{ number_format($booking->ticket_price, 2) }}</p>
        <p><strong>Payment Status:</strong> <span class="highlight">{{ $booking->payment_status }}</span></p>

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

        @if (!isset($pdf))
    <a href="{{ route('download.booking', ['booking_id' => $booking->id]) }}" class="download-btn">
        Download Booking Slip
    </a>
@endif


        <div class="footer">
            <p>Thank you for choosing autoRail!</p>
        </div>
    </div>
</body>
</html>
