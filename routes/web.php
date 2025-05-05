<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainController;
//require app_path('Http/Controllers/CommentController.php');
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserQuestionController;

// Choose Mode
Route::get('/', function () {
    return view('selectMode');
});

// Admin Routes
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register']);
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/password-update', [AdminController::class, 'updatePasswordForm'])->name('admin.password_update');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); //login to dashboard
// Train Controller Route

//Train route
Route::resource('trains', TrainController::class); // Same functionality

// User Routes
Route::get('/user/register', [UserController::class, 'showRegisterForm'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register']);
Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/user/password-update', [UserController::class, 'updatePasswordForm'])->name('user.password_update');
Route::post('/user/password-update', [UserController::class, 'updatePassword']);
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard'); //user dashboard

Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');


// In routes/web.php
Route::get('/admin/comments', [CommentController::class, 'adminIndex'])->name('admin.comments');

// User search

Route::get('/dashboard', [TrainController::class, 'index'])->name('dashboard');
Route::get('/train/search', [TrainController::class, 'search'])->name('train.search');
Route::get('/train/book/{id}', [BookingController::class, 'book'])->name('train.book');


// Process the payment
Route::get('stripe/{train_no}', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

// Booking slip
Route::get('booking/slip', [BookingController::class, 'showBookingSlip'])->name('booking.slip');
// Download Booking slip
Route::get('/download-booking-slip/{booking_id}', [BookingController::class, 'downloadBookingSlip'])->name('download.booking');

//user logout
Route::get('/logout-confirm', [UserController::class, 'showLogoutConfirm'])->name('logout.confirm');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login'); // Show login form
Route::post('/login', [UserController::class, 'login'])->name('user.login.submit'); // Handle login request


// Forget Password 


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');


// Route for About Us page
Route::get('/about', [AboutController::class, 'index'])->name('about');


// Admin Panel Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
  Route::get('/rules', [RuleController::class, 'index'])->name('rules.index');
  Route::get('/rules/create', [RuleController::class, 'create'])->name('rules.create');
  Route::post('/rules', [RuleController::class, 'store'])->name('rules.store');
  Route::get('/rules/{rule}/edit', [RuleController::class, 'edit'])->name('rules.edit');
  Route::put('/rules/{rule}', [RuleController::class, 'update'])->name('rules.update');
  Route::delete('/rules/{rule}', [RuleController::class, 'destroy'])->name('rules.destroy');
});

// User Panel Routes
Route::prefix('user')->name('user.')->group(function() {
  //Route::get('/ask-question', [UserQuestionController::class, 'showForm'])->name('ask-question');
  //Route::post('/submit-question', [UserQuestionController::class, 'submitQuestion'])->name('submit-question');

});

// Our chatbot 

// Admin routes
  Route::get('/admin/rules', [RuleController::class, 'index'])->name('admin.rules');
  Route::post('/admin/rules', [RuleController::class, 'store']);
 // Route::post('/admin/rules/update/{id}', [RuleController::class, 'update']);
 // Update existing rule (update)
  Route::put('/admin/rules/update/{id}', [RuleController::class, 'update']);

  //Route::get('/admin/rules/delete/{id}', [RuleController::class, 'destroy']);
  // Delete rule (destroy)
  Route::delete('/admin/rules/delete/{id}', [RuleController::class, 'destroy']);

// User ask page
Route::get('/ask', function () {
  return view('user.ask');
});
Route::post('/ask', [RuleController::class, 'getAnswer'])->name('ask.question');

