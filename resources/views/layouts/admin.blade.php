<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        
        <a class="btn btn-light" href="{{ route('admin.comments') }}">
    View Comments ({{ route('admin.comments') }})
</a>


    </div>
</nav>

<!-- Content Section -->
<div class="container mt-4">
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-4">
    <p>&copy; {{ date('Y') }} autoRail</p>
</footer>

</body>
</html>
