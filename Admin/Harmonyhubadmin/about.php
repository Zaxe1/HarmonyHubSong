
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
      font-family: "Open Sans", sans-serif;
      box-sizing: border-box;
    }
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color:grey;
    }
    .about-section {
      background: url("mershell.jpg") no-repeat left;
      background-size: 55%;
      background-color: #fdfdfd;
      overflow: hidden;
      padding: 100px 0;
    }
    .inner-container {
      width: 55%;
      float: right;
      background-color: #fdfdfd;
      padding: 50px;
    }
    .inner-container h1 {
      margin-bottom: 30px;
      font-size: 30px;
      font-weight: 900;
    }
    .text {
      font-size: 13px;
      color: #545454;
      line-height: 30px;
      text-align: justify;
      margin-bottom: 40px;
    }
    .skills {
      display: flex;
      flex-wrap: wrap; /* Allow skills to wrap to the next line on smaller screens */
      justify-content: space-between;
      font-weight: 700;
      font-size: 13px;
    }
    /* Add hover effect for the skills */
    .skills span:hover {
      color: #ff5733; /* Change the text color on hover */
      cursor: pointer; /* Change the cursor to a pointer on hover */
    }
    @media screen and (max-width: 1200px) {
      .inner-container {
        padding: 40px;
      }
    }
    @media screen and (max-width: 1000px) {
      .about-section {
        background-size: 100%;
        padding: 80px 20px; /* Adjust padding for smaller screens */
      }
      .inner-container {
        width: 100%;
        text-align: center; /* Center-align content on smaller screens */
      }
    }
    @media screen and (max-width: 600px) {
      .about-section {
        padding: 0;
        background-size: 100%;
      }
      .inner-container {
        padding: 40px;
      }
    }
    
  </style>
  <body>
    
    <div class="about-section">
      <div class="inner-container">
        <h1>About us</h1>
        <p class="text">
          Welcome to <b>HarmonyHub</b>, your ultimate destination for all things
          music! We are passionate music enthusiasts who have come together to
          create a platform dedicated to celebrating the art of sound and rhythm.
          Whether you're a casual listener, a seasoned musician, or somewhere in
          between, <b>HarmonyHub</b> is designed to be your one-stop resource for all
          things related to the world of music.
        </p>
        <div class="skills">
          <span>Web Design</span>
          <span>Application development</span>
          <span>App Design</span>
        </div>
      </div>
    </div>
    <?php require_once("footer.php") ?>
  </body>
  
</html>
