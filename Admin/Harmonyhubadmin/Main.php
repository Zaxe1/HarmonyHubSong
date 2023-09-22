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
            background: gray;
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
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: orange;
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
            background: black;
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
            transition: background 0.3s, color 0.3s;
        }

        .detal a:hover {
            background: orange;
            color: #212121;
        }

        .image {
            width: 35%;
            height: 80%;
            position: absolute;
            bottom: 0;
            right: 100px;
        }

        .image img {
            height: 100%;
            position: absolute;
            left: 60%;
            bottom: 0;
            transform: translateX(-50%);
            transition: bottom 1s, left 1s;
        }

        .image img.shape,
        .image img.justin {
            transition: bottom 1s, left 1s;
        }

        .image:hover img.shape {
            bottom: 40px;
        }

        .image:hover img.justin {
            left: 45%;
        }

        #services {
            padding: 30px 0;
        }

        .services-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 40px;
            margin-top: 50px;
        }

        .services-list div {
            background-color: #262626;
            padding: 40px;
            font-size: 13px;
            font-weight: 300;
            border-right: 10px;
            transition: background 0.3s, transform 0.5s;
        }

        .services-list div:hover {
            background: orange;
            transform: translateY(-10px);
        }

        .services-list div i {
            font-weight: 50px;
            margin-bottom: 30px;
        }

        .services-list div h2 {
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .services-list div a {
            text-decoration: none;
            color: #fff;
            font-size: 12px;
            margin-top: 20px;
            display: inline-block;
        }

        #portofolio {
            padding: 50px 0;
        }

        .work-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 40px;
            margin-top: 50px;
        }

        .work {
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .work img {
            width: 100%;
            border-radius: 10px;
            display: block;
            transition: transform 0.5s;
        }

        .layer {
            width: 100%;
            height: 0%;
            background: linear-gradient(rgba(0, 0, 0, 0.6), #e31b59);
            border-radius: 10px;
            position: absolute;
            left: 0;
            bottom: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            font-size: 14px;
            transition: height 0.5s;
        }

        .layer h3 {
            font-weight: 500;
            margin-bottom: 20px;
        }

        .layer a {
            margin-top: 20px;
            color: #e31b59;
            text-decoration: none;
            font-size: 18px;
            line-height: 60px;
            background: #fff;
            width: 60px;
            border-radius: 50%;
            text-align: center;
        }

        .work:hover img {
            transform: scale(1.1);
        }

        .work:hover .layer {
            height: 100%;
        }

        .btn {
            display: block;
            margin: 50px auto;
            width: fit-content;
            border: 1px solid #e31b59;
            padding: 11px 60px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            transition: background 0.5s;
        }

        .btn:hover {
            background: #e31b59;
        }

        .contact-left {
            flex-basis: 35%;
        }

        .contact-right {
            flex-basis: 60%;
        }

        .contact-left p {
            margin-top: 30px;
        }

        .contact-left p i {
            color: #e31b59;
            margin-right: 15px;
            font-size: 25px;
        }

        .social-icons {
            margin-top: 30px;
        }

        .social-icons a {
            text-decoration: none;
            font-size: 30px;
            margin-right: 15px;
            color: #ababab;
            display: inline-block;
            transition: transform 0.5s;
        }

        .social-icons a:hover {
            color: aqua;
            transform: translateY(-5px);
        }

        .btn.btn2 {
            display: inline-block;
            background: #e31b59;
        }

        .contact-right form {
            width: 100%;
        }

        form input,
        form textarea {
            width: 100%;
            border: 0;
            outline: none;
            background: #1d1d1d;
            padding: 15px;
            margin: 15px 0;
            color: #fff;
            font-size: 18px;
            border-radius: 6px;
        }

        form.btn2 {
            padding: 14px 60px;
            font-size: 18px;
            margin-top: 20px;
            cursor: pointer;
        }

        .copyright {
            color: #e31b59;
        }

        nav.fa-solid {
            display: none;
        }

        @media only screen and (max-width: 600px) {
            #header {
                background-image: url("lbol1.jpg");
            }

            .header-text {
                margin-top: 100%;
                font-size: 16px;
            }

            .header-text h1 {
                font-size: 30px;
            }

            nav.fa.solid {
                display: block;
                font-size: 25px;
            }

            nav ul {
                background: #e31659;
                position: fixed;
                top: 0;
                right: -200px;
                width: 200px;
                height: 100vh;
                padding-top: 50px;
                z-index: 2;
                transition: right 0.5s;
            }

            nav ul li {
                display: block;
                margin: 25px;
            }

            nav ul .fa-solid {
                position: absolute;
                top: 25px;
                left: 25px;
                cursor: pointer;
            }

            .sub-title {
                font-size: 40px;
            }

            .about-col-1,
            .about-col-2 {
                flex-basis: 100%;
            }

            .about-col-1 {
                margin-bottom: 30px;
            }

            .about-col-2 {
                font-size: 14px;
            }

            .tab-links {
                font-size: 16px;
                margin-right: 20px;
            }

            .contact-left,
            .contact-right {
                flex-basis: 100%;
            }

            .copyright {
                font: size 14px;
            }
        }
        body {
            background-color: gray;
        }
       
    </style>
</head>


    
<body>

<div class="hero">
    <nav>
        <div class="logo-container">
            <img src="hlogo1.png" alt="Logo" class="logo">
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="">Contact us</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
   
    <div class="detal">
        <h1> Welcome from <span style="color:orange">HarmonyHub</span></h1>
        <p>This is my official music website to show all<br> 
        details and work experiences in web development</p>
        <a href="signup.php">Sign Up for an account</a>
    </div>
    <div class="image">
        <img src="gray.jpg" class="shape">
        <img src="js.png" class="justin">
    </div>
</div>
<div id="services">
    <div class="container">
        <h1 class="sub-title" style="color:darkorange">My Services</h1>
        <div class="services-list">
            <div>
                <i class="fa-solid fa-code"></i>
                <h2>Web Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing ellt. Sed, similique. Soluta sunt esse sligendi aut cumque, iste earum a quidem!</p>
                <a href="">Learn more</a>
            </div>
            <div>
                <i class="fa-solid fa-corp-simple"></i>
                <h2>UI/UX Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing ellt. Sed similique. Soluta sunt esse sligendi aut cumque, iste earum a quidem!</p>
                <a href="">Learn more</a>
            </div>
            <div>
                <i class="fa-brands fa-app-store"></i>
                <h2>App Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing ellt. Sed, similique. Soluta sunt esse sligendi aut cumque, iste earum a quidem!</p>
                <a href="">Learn more</a>
            </div>
        </div>
    </div>
</div>
<div id="portofolio">
    <div class="container">
        <h1 class="sub-title" style="color:#e31659">Vocalist</h1>
        <div class="work-list">
            <div class="work">
                <img src="s4.jpg">
                <div class="layer">
                    <h3>Freddie Mercury</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing ellt. Totam sed dolorum natus numquam odio repellendus.</p>
                    <a href=""><i class="fa-solid fa-arrowo-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="s2.jpg">
                <div class="layer">
                    <h3>Unknowons</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing ellt. Totam sed dolorum natus numquam odio repellendus.</p>
                    <a href=""><i class="fa-solid fa-arrowo-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="s3.jpg">
                <div class="layer">
                    <h3>Dub Poetry</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing ellt. Totam sed dolorum natus numquam odio repellendus.</p>
                    <a href=""><i class="fa-solid fa-arrowo-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
        <a href="" class="btn" style="color:blue">See more</a>
    </div>
</div>
<div id="contact">
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h1 class="sub-title" style="color:#e31659">Contact Me</h1>
                <p><i class="fa-solid fa-paper-plane"></i> endo@gmail.com</p>
                <p><i class="fa-sharp fa-solid fa-phone"></i> 09987765551</p>
                <div class="social-icons">
                    <a href="https://facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter-square"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                </div>
                
            </div>
            <div class="contact-right">
                <form>
                    <input type="text" name="Name" placeholder="Your name" required/>
                    <input type="email" name="email" placeholder="Your Email" required/>
                    <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn btn2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once("footer.php") ?>


</body>
</html>
