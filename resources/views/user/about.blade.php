<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | autoRail</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #1f4037, #99f2c8);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(16px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 850px;
            width: 100%;
            color: #fff;
            text-align: center;
        }

        .header h1 {
            font-size: 3em;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .header p {
            font-size: 1.2em;
            color: #f9d976;
            margin-bottom: 30px;
        }

        .profile img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 4px solid #fff;
            margin-bottom: 20px;
        }

        .info h2 {
            font-size: 2em;
            color: #f9d976;
            margin-bottom: 5px;
        }

        .info p {
            font-size: 1.1em;
            line-height: 1.8;
            color: #f3f3f3;
        }

        .highlight {
            font-weight: bold;
            color: #fbd786;
        }

        .social-links {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .social-links a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            padding: 12px 24px;
            border-radius: 30px;
            background-color: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .social-links a i {
            font-size: 20px;
        }

        .social-links a:hover {
            background-color: #fbd786;
            color: #000;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 2.2em;
            }

            .info h2 {
                font-size: 1.6em;
            }

            .profile img {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>About Us</h1>
        <p>Revolutionizing Railway Management with Technology</p>
    </div>

    <div class="profile">
        <img src="https://via.placeholder.com/160" alt="Founder Image">
    </div>

    <div class="info">
        <h2>xyz</h2>
        <p><strong>Founder & CEO of autoRail</strong></p>
        <p>
            I am a passionate technology enthusiast, currently pursuing my <span class="highlight">6th semester</span> at 
            <span class="highlight">XYZ University</span>. My journey in <span class="highlight">Artificial Intelligence, Machine Learning, and Deep Learning</span> 
            is fueled by the vision to leverage technology for solving real-world problems. <br><br>
            Through this Railway Management System, we aim to enhance the efficiency of railway operations, making travel seamless for everyone.
        </p>
    </div>

    <div class="social-links">
        <a href="https://facebook.com/yourprofile" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="https://linkedin.com/in/yourprofile" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        <a href="https://github.com/yourprofile" target="_blank"><i class="fab fa-github"></i> GitHub</a>
    </div>
</div>

</body>
</html>
