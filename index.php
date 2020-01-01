<?php
include_once('database.php');
?>



<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="WebTool.css">
<script src="WebTool.js"></script>
<script src="jquery.js"></script>

<style>
.signInBox{
width:100%;
text-align:center;
padding-left:0px;
}
.signInTxt{
font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}
.title{

font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}
.titleText{

      font-size:45pt;margin:0px;padding:0px;color:black;
      }
   .titleTextG{

         font-size:50pt;margin:0px;padding:0px;color:red;
         }
.username{
outline:none;padding:3px;border-radius:10px;height:20px;
}

div button{
    display:inline-block;
}
.submit {
    display:inline-block;
    border-radius:10px;
    color: white;
    width:70px;
    height:35px;
    background: #4C8FFB;
    border: 1px #3079ED solid;
    box-shadow: inset 0 1px 0 #80B0FB;
}

.submit:hover {
    border: 1px #2F5BB7 solid;
    box-shadow: 0 1px 1px #EAEAEA, inset 0 1px 0 #5A94F1;
    background: #3F83F1;
}

.submit:active {
    box-shadow: inset 0 2px 5px #2370FE;
}
.y{
    font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}

.signInUnity{
    margin-left:30%;margin-top:45px; padding:0px;
    margin-bottom:100px;border-radius:100px;
    background-color:rgba(217, 217, 217,0.85);
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);padding-bottom:65px;width:40%;
}

.Groupify{
    font-style:italic;
    font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, 'AppleGothic', sans-serif;text-align:center;
}
body{
    background-image: url('memphis-colorful.png'); padding:0px;border-radius:15px;height:85vh;
}
.secondaryBody{
    width:95%;
    height:100%;
    margin:0 auto;
    padding-bottom:50px;
}
* {box-sizing: border-box;}

 .input-container {
   display: flex;
   width: 100%;
   margin-bottom: 15px;
 }

 .icon {
   padding: 10px;
   background: dodgerblue;
   color: white;
   margin-left:20%;
   min-width: 50px;
   text-align: center;
 }

 .input-field {
   width: 50%;
   padding: 10px;
   outline: none;
 }

 .input-field:focus {
   border: 2px solid dodgerblue;
 }
 .btn {
   background-color: dodgerblue;
   color: white;
   padding: 15px 20px;
   border: none;
   cursor: pointer;
   width: 100%;
   opacity: 0.9;
 }
</style>
</head>


<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Groupify</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body >
<div class="secondaryBody">
<div>

    <h1 class = "Groupify" >
          <span class="titleTextG" >G</span>
          <span class="titleTextG" >r</span>
          <span class="titleTextG" >o</span>
          <span class="titleTextG" >u</span>
          <span class="titleTextG" >p</span>
          <span class="titleText" >i</span>
          <span class="titleText" >f</span>
          <span class="titleText" >y</span>

        </h1>
</div>

<div align="center" class="signInUnity" style="">


<div class="SignInTitle" style="margin:0px; padding:0px; ">
    <h1 style="" class="title">Sign In</h1>
</div>
<div class="signInBox">
<form id ="yeet" name="SignInForm" method="post" enctype="multipart/form-data">

<br>
    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Username" name="username">
                      </div>
                    <br>
                      <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field" type="password" placeholder="Password" name="password">
                      </div>
                    <br>
    <br>
    <p style="font-size:15px;color:red;"><?php if(isset($_POST['submit']) && $_POST['submit'] == ''){ echo $_SESSION['error']; } ?></p>

    <div style="margin-left:30%;width:200px;display:block;">
        <button  id = "submit" class="submit"  name="submit" >Sign In</button>
        <p style="font-size:10px;margin:0px;padding:0px;">Dont have a Groupify account? </p>
        <a style="color:blue;font-size:10px;margin:0px;padding:0px;" href="SignUp.php">Make one.</a>
    </div>

</form>
     <br>
     <a href="classroom.php">class</a>
</div>

</div>

</div>
<p class="signInTxt"  style="text-align:center;">Created and Designed by : Josh Wells, and Shaun Francis</p>
</body>