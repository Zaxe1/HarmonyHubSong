<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #0333;
        }

        .music-player {
            background: #ffe0e5;
            width: 400px;
            padding: 25px 35px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(255, 26, 26, 0.22);
            border-radius: 15px;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .circle {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background: #fff;
            color: #f53192;
            box-shadow: 0 5px 10px rgba(255, 26, 26, 0.22);
        }

        .song-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 8px solid #fff;
            box-shadow: 0 10px 60px rgba(255, 26, 26, 0.22);
            margin: 20px auto;
            display: block;
        }
        .music-player h1{
            font-size: 20px;
            font-weight: 400;
            color: #333;
            margin-top: 20px;

        }
        .music-player p{
            font-size: 14px;
            color: #333;

        }
        #progress{
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            background: #f53192;
            border-radius: 4px;
            cursor: pointer;
            margin: 40px 0;
        }
        #progress::-webkit-slider-thumb{
            -webkit-appearance: none;
            background: #f53192;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 8px solid #fff;
            box-shadow: 0 5px 5px rgba(255,26,26,0.22);
        }
        .controls{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .controls div{
            width: 60px;
            height: 60px;
            margin: 20px;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            color: #f53192;
            box-shadow: 0 10px 20px rgba(255,26,26,0.22);
            cursor: pointer;
        }
        .controls div:nth-child(2){
            transform: scale(1.5);
            background: #f53192;
            color: #0333;

        }
    </style>
</head>
<body>
    <div class="music-player">
        <div class="nav">
            <div class="circle">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="circle">
                <i class="fa-solid fa-bars"></i>
            </div>
            
        </div>
        
        <img src="lbol1.jpg" class="song-img">
        <h1>A little bit of love</h1>
        <p>Tom Grennan</p>
        <audio id="song">
            <source src="lboll.m4a" type="audio/mpeg">
        </audio>


      
        <input type="range" value="0" id="progress">
        <div class="controls">
            <div><i class="fa-solid fa-backward"></i></div>
            <div onclick="playPause()"><i class="fa-solid fa-play" id="ctrlIcon"></i></div>
            <div><i class="fa-solid fa-forward"></i></div>
        </div>
    </div>
    
    <script>
        let progress=document.getElementById("progress");
        let song=document.getElementById("song");
        let ctrlIcon=document.getElementById("ctrlIcon");

        song.onloadedmetadata=function(){
            progress.max=song.duration;
            progress.value=song.currentTime;
        }
        function playPause(){
            if(ctrlIcon.classList.contains("fa-pause")){
                song.pause();
                ctrlIcon.classList.remove("fa-pause");
                ctrlIcon.classList.add("fa-play");
            }
            else{
                song.play();
                ctrlIcon.classList.add("fa-pause");
                ctrlIcon.classList.remove("fa-play");
            }
        }
        if(song.play()){
            setInterval(()=>{
                progress.value=song.currentTime;

            },500);
        }
        progress.onchange=function(){
            song.play();
            song.currentTime=progress.value;
        }

    </script>
</body>
</html>
