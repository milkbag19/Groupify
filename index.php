<?php
include_once('database.php');

checkSignin();
?>

<style>

</style>

<!DOCTYPE html>
<div style= "height:0.5vh;width:100%;background-color:lightgray;">
<div style= "height:0.5vh;width:200%;background-color:red;animation: 2s slidein;float:right;">

</div>
</div>
<head>

<link rel="stylesheet" type="text/css" href="index.css">
<script src="WebTool.js"></script>
<script src="jquery.js?2"></script>
<meta name="theme-color" content="#000000">
</head>


<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<title>Groupify</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body >



<div class="secondaryBody">


<div align="center" class="signInUnity" style="">


<div class="SignInTitle" style="margin:0px; padding:0px; padding-top:4vh;">
<h1 class = "Groupify" style="padding-top:5vh;width:26vw;background-color:#FFDD33;;border-radius:20px 0px 20px 0px;transform:rotate(5deg);padding:4px;">
                        <span class="titleText" >G</span>
                        <span class="titleText" >r</span>
                        <span class="titleText" >o</span>
                        <span class="titleText" >u</span>
                        <span class="titleText" >p</span>
                        <span class="titleText" >i</span>
                        <span class="titleText" >f</span>
                        <span class="titleText" >y</span>
                    </h1>
    <h1 style="color: #FFDD33;" class="title"> Sign In</h1>
</div>
<div class="signInBox">
<form id ="yeet" name="SignInForm" method="post" enctype="multipart/form-data">

<br>
    <div class="input-container">

                        <input style="text-align: center;border:none;height:5vh;margin: 0 auto 10px auto;"class="input-field" type="text" placeholder="Username" name="username">
                      </div>
                    <br>
                      <div class="input-container">

                        <input style="text-align: center;border:none;height:5vh;margin: 0 auto 10px auto;"class="input-field" type="password" placeholder="Password" name="password">
                      </div>
                    <br>
    <br>
    <?php
        if(in_array("user", $_SESSION, TRUE)){
        echo $_SESSION['user']['userId'];
        }
    ?>
    <p style="font-size:15px;color:red;"><?php if(isset($_POST['submit']) && $_POST['submit'] == ''){ echo $_SESSION['error']; } ?></p>

    <div style="margin-left:30%;width:200px;display:block;">
        <button  id = "submit" class="submit"  name="submit" style="animation: bgcolor 10s infinite;">Sign In</button><br>
        <a style="color:rgba(114,137,218,1);font-size:15px;margin:0px;padding:0px;" href="https://group-ify.herokuapp.com/SignUp.php">Dont have a Groupify account?</a>
    </div>

</form>

</div>

</div>

</div>
<p class="signInTxt"  style="text-align:center;">Created and Designed by : Josh Wells, and Shaun Francis</p>
</body>