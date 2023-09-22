<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .hero {
            position: relative;
            width: 100%;
            height: 100vh;
        
        }

        nav {
            display: flex;
            width: 84%;
            margin: auto;
            padding: 20px 0;
            align-items: center;
            justify-content: space-between;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            max-height: 100px; /* Set the maximum height of the logo */
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .detal {
            margin-left: 8%;
            margin-top: 15%;
        }

        .detal h1 {
            font-size: 50px;
            color: #212121;
            margin-bottom: 20px;
        }

        span {
            background: orange;
        }

        .detal p {
            color: #555;
            line-height: 22px;
        }

        .detal a {
            background: #212121;
            padding: 10px 18px;
            text-decoration: none;
            font-weight: bold;
            color: #fff;
            display: inline-block;
            margin: 30px 0;
            border-radius: 5px;
        }


       
    </style>
</head>
<body>
<div class="hero">
    <nav>
        <div class="logo-container">
            <img src="logo1.jfif" alt="Logo" class="logo">
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact us</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
   
    
   
</div>
</body>
</html>
