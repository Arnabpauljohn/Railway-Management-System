@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>User Comments</h2>

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>
                        @if($comment->rating)
                            @for($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star {{ $i <= $comment->rating ? 'checked' : '' }}"></span>
                            @endfor
                        @else
                            No Rating
                        @endif
                    </td>
                    <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $comments->links() }}
</div>

<style>
.fa {
    font-size: 20px;
}
.checked {
    color: orange;
}
</style>
@endsection
