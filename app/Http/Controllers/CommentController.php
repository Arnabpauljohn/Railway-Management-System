<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'comment' => 'required|string|max:500',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Your review has been submitted.');
    }

    public function index() {
        $comments = Comment::latest()->paginate(10);
        return view('user.comments', compact('comments'));
    }
    
    public function adminIndex() {
        //dd("adminIndex method is being called!");
      // $comments = Comment::latest()->paginate(10);
       $comments = Comment::with('user')->latest()->paginate(10);
       return view('admin.comments', compact('comments'));
       //return "adminIndex method is working!";
    }
    
}
