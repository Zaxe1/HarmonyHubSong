<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/ionicons@5.0.2/dist/ionicons.js" integrity="sha384-FPF4aKvveELyJlRWgLh5BQy6ceFZAXVq8pNHtrz5S1b3g3JCp9f0mi1fX4yuM2C1" crossorigin="anonymous"></script>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/facebook.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/instagram.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/twitter.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/youtube.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/cloud.css' rel='stylesheet'>
  <style>
   *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
   }
   footer{
    background-color: orange;
   }
   .footerContainer{
    width: 100%;
    padding: 70px 30px 20px;
   }
   .socialIcons{
    display: flex;
    justify-content: center;
   }
.socialIcons a{
  text-decoration: none;
  padding: 10px;
  background-color: white;
  margin: 10px;
  border-radius: 50%;
}
.socialIcons a i{
font-size: 2em;
color: black;
opacity: 0.9;
}
.socialIcons a:hover{
  background-color: #111;
  transition: 0.5s;
}
.socialIcons a:hover i{
  background-color: white;
  transition: 0.5s;
}
.footerNav{
  margin: 30px 0;
}
.footerNav ul{
  display: flex;
  justify-content: center;
}
.footerNav ul li a{
color: white;
margin: 20px;
text-decoration: none;
font-size: 3em;
opacity: 0.7;
transition: 0.5s;
}
.footerNav ul li a:hover{
opacity: 1;
}
.footerBottom{
  background-color: #000;
  padding: 20px;
  text-align: center;
}
.footerBottom p{
color: yellow;
}

  </style>
</head>
<body>
  <footer>
<div class="footerContainer">
  <div class="socialIcons">
    <a href=""><i class="gg-facebook"></i></a>
    <a href=""><i class="gg-instagram"></i></a>
    <a href=""><i class="gg-twitter"></i></a>
    <a href=""><i class="gg-youtube"></i></a>
    <a href=""><i class="gg-cloud"></i></a>
  </div>
  <div class="footerNav">
    <ul>
      <li><a href="">Home</li>
      <li><a href="">About Us</li>
      <li><a href="">Contact Us</li>
      <li><a href="">Services</li>
    </ul>
  </div>
  
</div>
<div class="footerBottom">
    <p> © Copyright 2023 - Company Name. All rights reserved</p>
  </div>
  </footer>
</body>
</html>
