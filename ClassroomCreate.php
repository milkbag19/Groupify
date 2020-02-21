<?php
include_once('database.php');
?>



<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="WebTool.css">
<script src="WebTool.js"></script>
<script src="jquery.js"></script>

<style>
.createBox{
width:50vw;
margin-left:0vw;
}
.signInTxt{
font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}
.title{

font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}
.titleText{
        display:inline-block;
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
    margin-left:9%;margin-top:45px; padding:0px;
    margin-bottom:100px;border-radius:100px;
    background-color:rgba(217, 217, 217,0.85);
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);padding-bottom:65px;width:85%;
	display:inline-block;
}

.Groupify{
    font-style:italic;

    font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, 'AppleGothic', sans-serif;text-align:center;
}
body{
    background-image: url('memphis-colorful.png'); padding:0px;border-radius:15px;height:vmin;
}
.secondaryBody{
    width:95%;
    height:100%;
    margin:0 auto;
    padding-bottom:50px;
}
.usernameDisplay{
    padding:0px;
    margin:0px;
    font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, 'AppleGothic', sans-serif;text-align:center;
}
* {box-sizing: border-box;}

.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 15px;
  margin-left:1vw;
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
.profileTitle{
    font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, 'AppleGothic', sans-serif;text-align:center;
    padding:0px;
    margin:0px;
}
@keyframes slidein {
   from { transform: scaleX(0); }
   to   { transform: scaleX(1); }
 }
</style>
</head>
<div style= "height:0.5vh;width:100%;background-color:lightgray;">
<div style= "height:0.5vh;width:200%;background-color:red;animation: 2s slidein;float:right;">

</div>
</div>

<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body >
<div class="secondaryBody">
<div>
        <a href="dashboard.php" style="text-decoration: none;">
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
        </a>
</div>

<div align="center" class="signInUnity" >


<div class="SignInTitle" style="margin:0px; padding:0px; display:inline-block;width:85%;">
   <h1 class="profileTitle">Create your classroom</h1>
</div>
<div class="createBox">
<form id ="yeet" name="SignInForm" method="post" enctype="multipart/form-data">

<br>
    <br>

     <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Classroom Name" name="className" id="className">
      </div>
     <br>
        <p style="font-size:12px;color:red;"><?php $error="";if(isset($_POST['CreateClass']) && $_POST['CreateClass'] == ''){addClassroom(); } ?></p>
          <button  id = "changePassword" class="submit"  name="CreateClass" >Create</button>
    <br>
    <br>



</form>

     <br>
</div>

</div>

</div>
<p class="signInTxt"  style="text-align:center;">Created and Designed by : Josh Wells; Shaun Francis</p>
</body>