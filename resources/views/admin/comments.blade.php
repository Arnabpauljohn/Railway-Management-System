@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>All User Comments & Reviews</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name ?? 'Unknown' }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->rating ?? 'No Rating' }}</td>
                    <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $comments->links() }}
</div>
@endsection
