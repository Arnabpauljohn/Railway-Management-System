@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>All Bookings</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>User</th>
                <th>Train No</th>
                <th>From</th>
                <th>To</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Payment ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->train_no }}</td>
                    <td>{{ $booking->from_city }}</td>
                    <td>{{ $booking->to_city }}</td>
                    <td>{{ $booking->departure_time }}</td>
                    <td>{{ $booking->arrival_time }}</td>
                    <td>${{ $booking->ticket_price }}</td>
                    <td>{{ ucfirst($booking->payment_status) }}</td>
                    <td>{{ $booking->payment_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
