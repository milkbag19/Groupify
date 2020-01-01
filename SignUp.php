
<?php

include_once("database.php");
?>

<!DOCTYPE html>
<style>
.signInBox{
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
    margin-bottom:75px;border-radius:100px;
    background-color:rgba(217, 217, 217,0.7);
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);padding-bottom:65px;width:40%;
}

.Groupify{
    font-style:italic;
    font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, 'AppleGothic', sans-serif;text-align:center;
}
body{
    background-image: url('email-pattern.png'); padding:0px;border-radius:15px;height:85vh;
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
<link rel="stylesheet" type="text/css" href="WebTool.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<script src="WebTool.js"></script>
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
    <div align="center" class="signInUnity" >
        <div class="SignInTitle" style=" margin:0px; padding:0px; ">
            <h1 style="" class="title">Create Sign In</h1>
        </div>
        <div class="signInBox">
            <form  name="SignInForm" method="post" enctype="multipart/form-data">


                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="Username" name="username">
                  </div>
                <br>
                  <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input class="input-field" type="text" placeholder="Email" name="email">
                  </div>
                  <br>
                  <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" placeholder="Password" name="password">
                  </div>
                <br>
                <div class="input-container">
                     <i class="fa fa-key icon"></i>
                     <input class="input-field" type="password" placeholder="Confirm password" name="passwordCon">
                  </div>
                 <br>
                <br>
                <div style="width:185px;">
                <p style="font-size:12px;color:red;"><?php if(isset($_POST['create']) && $_POST['create'] == ''){ echo $_SESSION['error']; } ?></p>
                <button style="width:70px;height:35px;margin-bottom:10px;" id = "create" class="submit" name="create" >Register</button>
                <button style="width:70px;height:35px;" id = "back" class="submit"  name="back">back</button>
                </div>

            </form >
        </div>
    </div>
</div>
<p class="signInTxt" style="text-align:center;">Created and Designed by : Josh Wells; Shaun Francis</p>
</body>

