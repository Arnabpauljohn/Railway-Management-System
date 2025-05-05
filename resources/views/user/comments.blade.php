@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Submit a Review</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="comment" class="form-label">Your Comment</label>
            <textarea class="form-control" name="comment" required></textarea>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <select class="form-control" name="rating">
                <option value="">No Rating</option>
                <option value="1">1 - Very Bad</option>
                <option value="2">2 - Bad</option>
                <option value="3">3 - Okay</option>
                <option value="4">4 - Good</option>
                <option value="5">5 - Excellent</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>

    <hr>

    <h2>User Reviews</h2>
    @foreach($comments as $comment)
        <div class="review-box">
            <p><strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->format('Y-m-d H:i') }}</p>
            <p>{{ $comment->comment }}</p>
            @if($comment->rating)
                <div class="rating">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star {{ $i <= $comment->rating ? 'checked' : '' }}"></span>
                    @endfor
                </div>
            @endif
        </div>
    @endforeach
</div>

<style>
.review-box {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
}
.fa {
    font-size: 20px;
}
.checked {
    color: orange;
}
</style>
@endsection
