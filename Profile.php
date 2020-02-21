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
width:60vw;
}
.signInTxt{
font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}
.title{

font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}

.username{
outline:none;padding:3px;border-radius:10px;height:20px;
}

div button{
    display:inline-block;
}
.submit {
    font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
    display:inline-block;
    border-radius:10px;
    color: #FFDD33;
    width:90px;
    height:35px;
    background: #222222;
    border:none;
    outline:none;
    transition:0.25s;
    margin-left:2%;
}

.submit:hover {
    opacity:0.8;
    width:90px;
    height:45px;
}

.submit:active {
    box-shadow: inset 0 2px 5px #2370FE;
}
.y{
    font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}

.signInUnity{
    margin-left:7%;margin-top:45px; padding:0px;
    margin-bottom:10vh;border-radius:100px;
    background-color:#FFDD33;
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);padding-bottom:65px;width:85%;
	display:inline-block;
}

.Groupify{
    font-style:italic;

    font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, 'AppleGothic', sans-serif;text-align:center;
}
body{
    background-color:#222222; padding:0px;border-radius:15px;height:vmin;
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
    font-size:30px;

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
   border-radius: 15px;
   padding: 10px;
   background: #2222;
   outline: none;
   transition:0.25s;
   font-size:15px;

 }
::placeholder {
  color: black;
}
 .input-field:focus {
   border: 2px solid dodgerblue;
   border-radius: 0px;
   width:60%;
   background:#2222;


 }
 .input-field:hover {
    opacity:0.8;
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
</style>
</head>


<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body >
<div class="secondaryBody">


<div align="center" class="signInUnity" >


<div class="SignInTitle" style="margin:0px; padding:0px; display:inline-block;width:85%;">

   <a href="https://group-ify.herokuapp.com/dashboard.php"><img src="https://img.icons8.com/windows/512/000000/gender-neutral-user.png"style="width:150px;height:150px;margin:0px;padding:0px;"></a>
   <h1 class="profileTitle">Your Profile</h1>
</div>
<div class="signInBox">
<form id ="yeet" name="SignInForm" method="post" enctype="multipart/form-data">

<br>
    <br>
    <h2 class="usernameDisplay">Username : <?php echo $_SESSION['user']['username']; ?><h2><h2 class="usernameDisplay">Email : <?php echo$_SESSION['user']['email']; ?></h2>

     <div class="input-container">
        <input style="text-align: center;border:none;height:5vh;margin: 0 auto 10px auto;"class="input-field" type="text" placeholder="New Username" name="username">
      </div>
      <p style="font-size:12px;color:red;"><?php $error="";if(isset($_POST['changeUsername']) && $_POST['changeUsername'] == ''){ echo $_SESSION['error']; } ?></p>
          <button  id = "changeUsername" class="submit"  name="changeUsername" >Change</button>
     <br>
     <br>
     <div class="input-container">
       <input style="text-align: center;border:none;height:5vh;margin: 0 auto 10px auto;"class="input-field" type="password" placeholder="New Password" name="password">
     </div>
     <br>
     <div class="input-container">
        <input style="text-align: center;border:none;height:5vh;margin: 0 auto 10px auto;"class="input-field" type="password" placeholder="Confirm Password" name="passwordCon">
     </div>
        <p style="font-size:12px;color:red;"><?php $error="";if(isset($_POST['changePassword']) && $_POST['changePassword'] == ''){ echo $_SESSION['error']; } ?></p>
          <button  id = "changePassword" class="submit"  name="changePassword" >Change</button>
    <br>
    <br>



</form>

     <br>
</div>

</div>

</div>
<p class="signInTxt"  style="text-align:center;color:#FFDD33;">Created and Designed by : Josh Wells; Shaun Francis</p>
</body>