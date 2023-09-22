<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
    body{
    background-color: #eaeaea;
    overflow: hidden;
}
.container{
    position: absolute;
    left:50%;
    top:50%;
    transform: translate(-50%,-50%);
    width:1000px;
    height:600px;
    padding:50px;
    background-color: #f5f5f5;
    box-shadow: 0 30px 50px #dbdbdb;
}
#slide{
    width:max-content;
    margin-top:50px;
}
.item{
    width:200px;
    height:300px;
    background-position: 50% 50%;
    display: inline-block;
    transition: 0.5s;
    background-size: cover;
    position: absolute;
    z-index: 1;
    top:50%;
    transform: translate(0,-50%);
    border-radius: 20px;
    box-shadow:  0 30px 50px #505050;
}
.item:nth-child(1),
.item:nth-child(2){
    left:0;
    top:0;
    transform: translate(0,0);
    border-radius: 0;
    width:100%;
    height:100%;
    box-shadow: none;
}
.item:nth-child(3){
    left:50%;
}
.item:nth-child(4){
    left:calc(50% + 220px);
}
.item:nth-child(5){
    left:calc(50% + 440px);
}
.item:nth-child(n+6){
    left:calc(50% + 660px);
    opacity: 0;
}
.item .content{
    position: absolute;
    top:50%;
    left:100px;
    width:300px;
    text-align: left;
    padding:0;
    color:#eee;
    transform: translate(0,-50%);
    display: none;
    font-family: system-ui;
}
.item:nth-child(2) .content{
    display: block;
    z-index: 11111;
}
.item .name{
    font-size: 40px;
    font-weight: bold;
    opacity: 0;
    animation:showcontent 1s ease-in-out 1 forwards
}
.item .des{
    margin:20px 0;
    opacity: 0;
    animation:showcontent 1s ease-in-out 0.3s 1 forwards
}
.item button{
    padding:10px 20px;
    border:none;
    opacity: 0;
    animation:showcontent 1s ease-in-out 0.6s 1 forwards
}
@keyframes showcontent{
    from{
        opacity: 0;
        transform: translate(0,100px);
        filter:blur(33px);
    }to{
        opacity: 1;
        transform: translate(0,0);
        filter:blur(0);
    }
}
.buttons{
    position: absolute;
    bottom:30px;
    z-index: 222222;
    text-align: center;
    width:100%;
}
.buttons button{
    width:50px;
    height:50px;
    border-radius: 50%;
    border:1px solid #555;
    transition: 0.5s;
}.buttons button:hover{
    background-color: #bac383;
}
.name{
    color:greenyellow;
    
}
.des{
    color:lightcyan;
}
  
</style>
<body>
    <div class="container">
        <div id="slide">
            <div class="item" style="background-image: url(ar1.png);">
                <div class="content">
                    <div class="name">Artists</div>
                    <div class="des">Music is the universal language of human emotion, 
                        a timeless art form that transcends borders, cultures, and eras. 
                        It is a vibrant tapestry woven from the threads of melody, harmony, 
                        rhythm, and expression that has enriched the human experience for millennia.

                    </div>
                    
                </div>
            </div>
            <div class="item" style="background-image: url(ar2.jpg);">
                <div class="content">
                    <div class="name">Artists</div>
                    <div class="des">At its core, music is an extraordinary means of communication. 
                        It allows individuals to convey emotions, stories, and messages through the 
                        power of sound. Whether it's the haunting strains of a melancholic violin solo, 
                        the infectious rhythm of a lively drumbeat, or the lyrical poetry of a heartfelt song,
                         music has the unique ability to evoke feelings, stir memories, and inspire change.

                    </div>
                   
                    
                </div>
            </div>
            <div class="item" style="background-image: url(ar3.jpg);">
                <div class="content">
                    <div class="name">Artists</div>
                    <div class="des">Music has a rich and diverse history that spans the globe. 
                        From the haunting melodies of classical compositions to the foot-stomping 
                        energy of rock 'n' roll, from the intricate rhythms of jazz to the poetic 
                        narratives of folk songs, every genre offers a unique glimpse into the cultural 
                        and emotional landscape of its time and place.

                    </div>
                    
                </div>
            </div>
            <div class="item" style="background-image: url(ar4.jpg);">
                <div class="content">
                    <div class="name">Artists</div>
                    <div class="des">Music has a rich and diverse history that spans the globe. 
                        From the haunting melodies of classical compositions to the foot-stomping 
                        energy of rock 'n' roll, from the intricate rhythms of jazz to the poetic 
                        narratives of folk songs, every genre offers a unique glimpse 
                        into the cultural and emotional landscape of its time and place.</div>
                   
                </div>
            </div>
            <div class="item" style="background-image: url(ar5.jpg);">
                <div class="content">
                    <div class="name">Artists</div>
                    <div class="des">In the modern era, technology has amplified the reach and accessibility of
                         music. With the advent of digital streaming platforms and online communities, music has 
                         become more accessible than ever before. Artists from around the world can now share their 
                         creations with a global audience, and listeners can discover a seemingly infinite array of 
                         musical styles and voices.
                        
                    </div>
                    
                </div>
            </div>
            <div class="item" style="background-image: url(ar6.jpg);">
                <div class="content">
                    <div class="name">Artists</div>
                    <div class="des">Music is not only a source of pleasure and entertainment but also a powerful force
                         for change. It has been a catalyst for social and political movements, a means of expressing dissent, 
                         and a tool for raising awareness about critical issues. Through lyrics that challenge the status quo 
                         and melodies that inspire action, music has played a pivotal role in shaping the world we live in.</div>
                  
                </div>
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>

    <script>
          document.getElementById('next').onclick = function(){
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').appendChild(lists[0]);
}
document.getElementById('prev').onclick = function(){
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').prepend(lists[lists.length - 1]);
}
  
    </script>
</body>
</html>
  