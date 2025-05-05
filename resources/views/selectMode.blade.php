<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 100px;
        }

        /* Container to align cards */
        .card-container {
            display: flex; /* Use Flexbox */
            justify-content: center; /* Center the Cards */
            gap: 50px; /* Add Space Between Cards */
            flex-wrap: wrap; /* Responsive Design */
            margin-top: 20px;
        }

        /* Common Card Styling */
        .card, .card_1 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            padding: 15px;
            text-align: center;
            background: white;
            border-radius: 8px;
        }

        /* Title Styling */
        .title {
            color: grey;
            font-size: 18px;
        }

        /* Button Styling */
        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 10px;
            width: 100%;
            font-size: 18px;
            background-color: #000;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Button Hover Effect */
        button:hover {
            opacity: 0.8;
        }

        /* Social Icons */
        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
            margin: 0 5px;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .card-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    <h1>Railway Management System </h1>

    <div class="card-container">
        <!-- Admin Card -->
        <div class="card">
            <h1>A Paul J</h1>
            <p class="title">CEO & Founder, AutoRail</p>
            <div style="margin: 20px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
            </div>
            <a href="/admin/register/">
                <button>Admin</button>
            </a>
        </div>

        <!-- User Card -->
        <div class="card_1">
            <h1>User</h1>
            <p class="title">Railway Registered User</p>
            <div style="margin: 20px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
            </div>
            <a href="/user/register">
                <button>User</button>
            </a>
        </div>
    </div>

</body>
</html>
