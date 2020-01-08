<?php
include_once('database.php');
?>

<!DOCTYPE html>
<script>
    function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0px";
}
    function openJoin() {
  document.getElementById("joinbtn").style.height = "350px";
}
function closeJoin() {
  document.getElementById("joinbtn").style.height = "0px";
}
</script>
<style>
    .titleText{
        font-size:30pt;margin:0px;padding:0px;color:black;font-weight:1200;
    }

    .titleTextG{
        font-size:35pt;margin:0px;padding:0px;color:red;font-weight:1200;
    }

    .logoText{
        display:inline-block;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
           z-index: 1;
           top: 0;
           right: 0;
           background-color: #111;
           overflow-x: hidden;
           transition: 0.5s;
           padding-top: 60px;
          text-align:right;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }
    .joinMenu .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }
    .joinMenu a:hover {
          color: #f1f1f1;
        }
    .joinMenu a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }
        @keyframes animatedgradient {
        	0% {
        		background-position: 0% 50%;
        	}
        	50% {
        		background-position: 100% 50%;
        	}
        	100% {
        		background-position: 0% 50%;
        	}
        }

        .joinMenu{
        border: 10px solid black;
        border-color: red red black red;
        }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
      .joinMenu {padding-top: 15px;}
      .joinMenu a {font-size: 18px;}
    }

.submit {
    display:inline-block;
    border-radius:10px;

    color: white;
    width:70px;
    height:35px;
    background: #4C8FFB;
    border: none;
    box-shadow: inset 0 1px 0 #80B0FB;
     font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}

.submit:hover {
    border: 1px #2F5BB7 solid;
    box-shadow: 0 1px 1px #EAEAEA, inset 0 1px 0 #5A94F1;
    background: #3F83F1;
}
.submit1 {
    display:inline-block;
    border-radius:10px;
    color: white;
    width:70px;
    height:35px;
    background: #4C8FFB;
    border: 1px #3079ED solid;
    box-shadow: inset 0 1px 0 #80B0FB;
}
.submit1:hover{
    cursor:pointer;
}

.submit:active {
    box-shadow: inset 0 2px 5px #2370FE;
}
*:focus {outline:none}
button{
    font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DASHBOARD</title>
</head>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="Profile.php">PROFILE OPTIONS</a>
</div>
<div style="-webkit-animation:Background 5s infinite alternate; border-radius:50px;margin-top:-50px;margin-bottom:50px;height:0;width:600px; position: fixed;z-index: 1;top: 0;left: 27%;background-color: #111;overflow-x: hidden;transition: 0.5s;padding-left: 60px;text-align:right;overflow: hidden;" id="joinbtn" class="joinMenu">
<a href="javascript:void(0)" class="closebtn" onclick="closeJoin()"style="margin-top:7%;">&times;</a>
<h1 class = "Groupify" style="margin-top:15%;margin-right:33%;z-index: 1;">
                        <span class="titleText" >C</span>
                        <span class="titleText" >l</span>
                        <span class="titleText" >a</span>
                        <span class="titleText" >s</span>
                        <span class="titleText" >s</span>
                        <span class="titleTextG" >C</span>
                        <span class="titleTextG" >o</span>
                        <span class="titleTextG" >d</span>
                        <span class="titleTextG" >e</span>
                    </h1>
                    <form id ="lol" name="SignInForm" method="post" enctype="multipart/form-data">
                    <button class='submit' id='join' name='join'>Join</button>
                    <input type="text" style="margin-top:0;margin-right:24%;height:8%;width:50%;background-color:#111;border:none;border-bottom: 5px solid white;color:gray;caret-color: rgb(200, 200, 200);" placeholder="Example '45676'" name="codeInput">

</form>
<?php
 if(isset($_POST['join']) && $_POST['join'] == ''){
                    classJoin();
                     echo"<script>window.location.href = 'dashboard.php';</script>";
                     unset($_SESSION['join']);
                 }
?>
</div>

<body style="background-image: url('memphis-colorful.png'); padding: 0px; border-radius:0px; padding:0px; margin:0px;">
    <div style="display:inline-block; width:100%; height:15%; padding:0%; margin:0%; background-color:lightGrey;">

         <div class="logoText" style="float:left; font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, 'AppleGothic', sans-serif; font-style:italic;" >
                <a href="dashboard.php" style="text-decoration: none;">
                    <h1 class = "Groupify" style="margin-left:20px">
                        <span class="titleTextG" >G</span>
                        <span class="titleTextG" >r</span>
                        <span class="titleTextG" >o</span>
                        <span class="titleTextG" >u</span>
                        <span class="titleTextG" >p</span>
                        <span class="titleText" >i</span>
                        <span class="titleText" >f</span>
                        <span class="titleText" >y</span>
                    </h1>
                    </a>
                </div>
            <span style="font-size:30px;cursor:pointer; display:inline-block; float:right; margin-top:40px; margin-right:20px;" onclick="openNav()">My Account▼</span>
            <span style="text-align:center;background-color:green;font-size:30px;cursor:pointer; display:inline-block; float:right; margin-top:40px; margin-right:20px;" class="submit" onclick="openJoin()">Join</span>

        </div>



</body>
<div style="margin-top: 0px; display:inline-block; float:left;">
 <table style="border-collapse:collapse; width:100%;">
 <th>

  <form id ="yeet" name="SignInForm" method="post" enctype="multipart/form-data">
<?php

 classSelect();
 echo"<input type='text'id='className'name='className'><button id='y'name='y'>ADD</button>";
 if(isset($_POST['n'])&&$_POST['n'] == ''){
             unset($_POST['n']);
             echo"<script>window.location.href = 'dashboard.php';</script>";
         }
         if(isset($_POST['class']) && $_POST['class'] == ''){
                     echo"<script>window.location.href = 'classroom.php';</script>";
                     unset($_SESSION['n']);
                 }?>
        <?php

        if(isset($_POST['y']) && $_POST['y'] == ''){
            addClassroom();
            echo"<script>window.location.href = 'dashboard.php';</script>";
        }?>


</form>
</th>
    </table>
    <form id ="yeet" name="SignInForm" method="post" enctype="multipart/form-data">
<button id = "n" class="submit" name = "n" >Reset</button>
</form>


</div>
</html>