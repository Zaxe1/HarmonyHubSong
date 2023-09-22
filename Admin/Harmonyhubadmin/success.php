<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="styles.css" />
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

    .hero {
        width: 100%;
        height: 100vh;
        background-image: url("anime.jpg");
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }

    .logo {
        width: 100px;
        cursor: pointer;
    }

    .navbar {
        width: 85%;
        height: 15%;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    button {
        color:gold;
        padding: 10px 25px;
        background-color: black;
        border: 1px solid #fff;
        border-radius: 20px;
        outline: none;
        cursor: pointer;
        transition: background-color 0.3s ease; /* Add transition for hover effect */
    }

    /* Change button hover color to green */
    button:hover {
        background-color:deeppink;
    }

    .content {
        color:chartreuse;
        position: absolute;
        top: 50%;
        left: 8%;
        transform: translateY(-50%);
        z-index: 2;
    }

    h1 {
        font-size: 80px;
        margin: 10px 0 30px;
        line-height: 80px;
    }

    .side-bar {
        width: 50px;
        height: 100vh;
        background: none; /* Remove background */
        position: absolute;
        right: 0;
        top: 0;
    }

  

    .social-links img,
    .useful-links img {
        width: 25px;
        margin: 25px auto;
        cursor: pointer;
    }

    .social-links {
        width: 50px;
        text-align: center;
        position: absolute;
        top: 20px; /* Adjust the top position */
        right: 20px; /* Move to the right */
    }

    .useful-links {
        width: 50px;
        text-align: center;
        position: absolute;
        bottom: 20px; /* Adjust the bottom position */
        right: 20px; /* Move to the right */
    }

    .bubbles img {
        width: 200px;
    }

    .bubbles {
        width: 200%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        position: absolute;
        bottom: -70px;
    }

    /* Add bubble animation */
    @keyframes bubble {
        0% {
            transform: translateY(0);
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        70% {
            opacity: 1;
        }

        100% {
            transform: translateY(-80vh);
            opacity: 0;
        }
    }

    .bubbles img:nth-child(1) {
        animation: bubble 6s ease-in-out infinite; /* Apply the bubble animation to the first bubble */
       
    }

    .bubbles img:nth-child(2) {
        animation: bubble 6s ease-in-out infinite; /* Apply the bubble animation to the second bubble */
    }

    .bubbles img:nth-child(3) {
        animation: bubble 6s ease-in-out infinite; /* Apply the bubble animation to the third bubble */
        
    }
    .bubbles img:nth-child(4) {
        animation: bubble 5s ease-in-out infinite; /* Apply the bubble animation to the first bubble */
        
    }

    .bubbles img:nth-child(5) {
        animation: bubble 3s ease-in-out infinite; /* Apply the bubble animation to the second bubble */
       
    }

    .bubbles img:nth-child(6) {
        animation: bubble 8s ease-in-out infinite; /* Apply the bubble animation to the third bubble */
        
    }
    .bubbles img:nth-child(7) {
        animation: bubble 5s ease-in-out infinite; /* Apply the bubble animation to the first bubble */
       
    }

    .bubbles img:nth-child(8) {
        animation: bubble 3s ease-in-out infinite; /* Apply the bubble animation to the second bubble */
        
    }

    .bubbles img:nth-child(9) {
        animation: bubble 8s ease-in-out infinite; /* Apply the bubble animation to the third bubble */
       
    }
    .bubbles img:nth-child(10) {
        animation: bubble 5s ease-in-out infinite; /* Apply the bubble animation to the first bubble */
       
    }

    .bubbles img:nth-child(11) {
        animation: bubble 3s ease-in-out infinite; /* Apply the bubble animation to the second bubble */
        
    }

    .bubbles img:nth-child(12) {
        animation: bubble 8s ease-in-out infinite; /* Apply the bubble animation to the third bubble */
       
    }

    /* Add animations to other bubbles here */

</style>
<body>
<audio id="myAudio" autoplay="autoplay" loop>
    <source src="shivers.m4a" type="audio/mpeg">
</audio>

<div class="hero">
    <div class="navbar">
        
        <img src="hlogo1.png" class="logo">
        <button type="button"><a href="main.php" style="color:yellow"> <b>Home</b></button>
       
        <button type="button"><a href="profile1.php" style="color:yellow"><b> Individual Information</b> </button>
        <button type="button"><a href="info.php" style="color:yellow"><b> Info Artists</b></button>
        <button type="button"><a href="logout.php" style="color:yellow"><b> Logout</b></button>
    </div>
    <div class="content">
        <small style="color:deeppink"><b>Welcome to our</b> </small>
        <h1 style="color:chartreuse">Song <br>streaming <span style="color:darkkhaki">website</span></h1>
        <button type="button"><a href="musics.php" style="color:chartreuse"> Continue to <span style="color:aquamarine">Streaming music</span></a></button>
    </div>
    
    <div class="social-links">
        <img src="face.png">
        <img src="tw.png">
        <img src="Instagram-Logo.jpg">
    </div>
    <div class="useful-links">
        <img src="info.jfif">
        <img src="share.png">
    </div>
    <div class="bubbles">
        <img src="">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
        <img src="rgb1.png">
    </div>
    
</div>
<script>
    // Get the audio element and button element
    const audio = document.getElementById("myAudio");
    const unmuteButton = document.getElementById("unmuteButton");

    // Add a click event listener to the button
    unmuteButton.addEventListener("click", function () {
        // Toggle mute/unmute
        audio.muted = !audio.muted;

        // Update the button text
        if (audio.muted) {
            unmuteButton.textContent = "Unmute Music";
        } else {
            unmuteButton.textContent = "Mute Music";
        }
    });
</script>
</body>
</html>
