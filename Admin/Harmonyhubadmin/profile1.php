<?php
    
    require_once("dbconnect.php");
    if (!isset($_SESSION)) 
    {
        session_start();
    }
    $conn = connect();
    try
    {
        $sql = "select * from admin";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $admin = $stmt->fetchAll();
    }
    catch (PDOException $e) 
    {
        echo $e;
    }
    function getCategoryName($id)
    {
        global $conn;
        try
        {
            $sql = "select * from category where id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $cat=$stmt->fetch();
            return $cat['fullname'];
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">

    <style>
        /* Custom CSS for the hover effect */
        .card:hover {
            color: aqua;
            transform: scale(1.05); /* Increase the size of the card on hover */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Add a subtle shadow */
        }

        /* Add more custom styling here if needed */
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .hero {
            position: relative;
            width: 100%;
          
        
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
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($admin as $admin): ?>
                <div class="col-md-3 mb-4 d-flex">
                    <div class="card w-100">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $admin['email']?></h5>
                            <h6 class="card-title"><?php echo $admin['fullname']?></h6>
                            
                        </div>
                        <div class="card-footer">
                            <!-- Add any additional content for the card footer here -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
