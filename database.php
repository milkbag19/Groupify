<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

 session_start();
 $_SESSION['rowcount'];
 $servername = "localhost";  //declaring a placeholder for the database server name.
 $username = "milkbag19";    //declaring a placeholder for the database username sign in.
 $password = "yeet";         //declaring a placeholder for the database password sign in.
 $database = "userinfo";     //declaring which database within the server to connect to.
 // Create connection
 $mysqli = new mysqli($servername, $username, $password, $database);
 // Check connection
 if (!$mysqli) {
     die("Connection failed: " . mysqli_connect_error());
 }
     function upload(){
      //function meant to upload data to the database.  Mainly for user creation.
     if (session_status() == PHP_SESSION_ACTIVE) {
     }
     else{
     session_start();
     }
     $servername = "localhost";
     $username = "milkbag19";
     $password = "yeet";
     $database = "userinfo";
     //=====================================================================\\
     //All $_POST variables are grabbing the values from HTML text boxes    \\
     //=====================================================================\\
     $emailInput = $_POST['email'];
     $usernameInput = $_POST['username'];
     $passwordInput = $_POST['password'];
     $passwordConfirm = $_POST['passwordCon'];
      //=====================================================================\\
      //Checking for different sign up info requirements                     \\
      //=====================================================================\\

     if($passwordInput===$passwordConfirm){

         if($emailInput!=""&&$usernameInput!=""&&$passwordInput!=""){
         list($user, $domain) = explode('@', $emailInput);
               if(filter_var($emailInput, FILTER_VALIDATE_EMAIL)&&checkdnsrr($domain,"MX")){
          //========================================================================\\
          //Attempts to connect to the database with the info given beforehand.    \\
          //It then searches the database for the username inputted in the text box \\
          //If the result of the search is null, or it isn't found,                  \\
          //proceed with the creation and uploading of the username.                \\
          //========================================================================\\
             $mysqli = new mysqli($servername, $username, $password, $database);

             $searchquery1 = "SELECT * FROM users WHERE `email` LIKE '%{$emailInput}%'";
             $searchresult1 = $mysqli->query($searchquery1);
             $row1 = $searchresult1->fetch_assoc();

             $searchquery = "SELECT * FROM users WHERE `username` LIKE '%{$usernameInput}%'";
                         $searchresult = $mysqli->query($searchquery);
                         $row = $searchresult->fetch_assoc();
             if($row['username']==null){
                 if($row1['email']==null){

                         //sending the server the data to be uploaded and where to insert it into the database
                         $upload = "INSERT INTO users (username,password,email) VALUES ('$usernameInput','$passwordInput','$emailInput')";

                         if ($mysqli->query($upload) === TRUE) {
                             //echo "New record created successfully";

                             header("Location: index.php");
                         } else {
                             //echo "Error: " . $upload . "<br>" . $mysqli->error;
                         }
                         }else{
                         $_SESSION['error'] = "email already in use";
                         }
                 }else{
                 $_SESSION['error'] = "username already in use";
                 }
         }else{
         $_SESSION['error'] = "invalid email";

         }
     }else{
          $_SESSION['error'] = "fields must all be entered";
     }
     }else{
     $_SESSION['error'] = "passwords must match";

     }


     }
 function signIn(){
 if (session_status() == PHP_SESSION_ACTIVE) {

 }
 else{
 session_start();
 }
 $servername = "localhost";
 $username = "milkbag19";
 $password = "yeet";
 $database = "userinfo";

 $usernameInput = $_POST['username'];
 $usernameInput = strtolower($usernameInput);
 $passwordInput = $_POST['password'];
 $string = $usernameInput;
 //=====================================================================\\
 //Searches for the string within the data base in the username column. \\
 //If the username is found, it checks the data inputted in the text    \\
 //and compares the data to the respective data in the database columns.\\
 //=====================================================================\\
 $searchquery = "SELECT * FROM users WHERE `username` LIKE '%{$string}%'";
 //  ----------------------------------------------------------------^^^-------^^^

             $mysqli = new mysqli($servername, $username, $password, $database);
         $searchresult = $mysqli->query($searchquery);
         $row = $searchresult->fetch_assoc();
         if($usernameInput === strtolower($row['username'])&&$passwordInput === $row['password']||$usernameInput === strtolower($row['email'])&&$passwordInput === $row['password']){

         $_SESSION['user'] = $row;
         $_SESSION['error'] = "";
         header("Location: classroom.php");
         }else{
         $_SESSION['error']="invalid username/password";
          }
 }
 function updatePassword(){
 if (session_status() == PHP_SESSION_ACTIVE) {

 }
 else{
 session_start();
 }
 $servername = "localhost";
 $username = "milkbag19";
 $password = "yeet";
 $database = "userinfo";
 $id = $_SESSION['user']['userId'];
 $oldPassword = $_SESSION['user']['password'];
 $newPassword = $_POST['password'];
 $newPasswordCon = $_POST['passwordCon'];


 $mysqli = new mysqli($servername, $username, $password, $database);


 $searchquery = "SELECT * FROM users WHERE `userId` LIKE '%{$id}%'";


 if($newPassword===$newPasswordCon){
          $updateQuery = "UPDATE users SET `password` = '$newPassword' WHERE `userId` = '$id'";
          try{
              $updateResult = $mysqli->query($updateQuery);
              $searchresult = $mysqli->query($searchquery);

                      $row = $searchresult->fetch_assoc();
                      $_SESSION['user']=$row;
                      $_SESSION['error'] = "";
                      $mail = new PHPMailer(true);


                          $mail->IsSMTP(); // telling the class to use SMTP
                          $mail->SMTPAuth = true; // enable SMTP authentication
                          $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
                          $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
                          $mail->Port = 465; // set the SMTP port for the GMAIL server
                          $mail->Username = "noreply.groupify@gmail.com"; // GMAIL username
                          $mail->Password = "Groupify1234"; // GMAIL password


                      $mail->AddAddress($_SESSION['user']['email'], $_SESSION['user']['username']);
                      $mail->SetFrom("noreply.groupify@gmail.com", "Groupify");
                      $mail->Subject = "Changed Username";
                      $mail->Body = $_SESSION['user']['username'].","."\nYour Groupify password has been changed to ".$_SESSION['user']['password']."\nIf this was not you, change your password.";

                      try{
                          $mail->Send();
                      } catch(Exception $e){

                      }
          } catch(Exception $f){
            echo $f->getTraceAsString();
          }
      }else{
         $_SESSION['error'] = "Passwords don't match";
      }
 }
 function updateUsername(){
 if (session_status() == PHP_SESSION_ACTIVE) {

 }
 else{
 session_start();
 }
 $servername = "localhost";
 $username = "milkbag19";
 $password = "yeet";
 $database = "userinfo";
 $id = $_SESSION['user']['userId'];
 $oldUsername = $_SESSION['user']['username'];
 $newUsername = $_POST['username'];


 $mysqli = new mysqli($servername, $username, $password, $database);


 $searchquery = "SELECT * FROM users WHERE `username` LIKE '%{$newUsername}%'";

 $searchresult = $mysqli->query($searchquery);
 $row = $searchresult->fetch_assoc();



 if($row['username']==null){
          $updateQuery = "UPDATE users SET `username` = '$newUsername' WHERE `userId` = '$id'";
          if ($mysqli->query($updateQuery) === TRUE) {
              $searchresult = $mysqli->query($searchquery);
                      $row = $searchresult->fetch_assoc();
                      $_SESSION['user']=$row;
                      $_SESSION['error'] = "";
                      $mail = new PHPMailer(true);


                          $mail->IsSMTP(); // telling the class to use SMTP
                          $mail->SMTPAuth = true; // enable SMTP authentication
                          $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
                          $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
                          $mail->Port = 465; // set the SMTP port for the GMAIL server
                          $mail->Username = "noreply.groupify@gmail.com"; // GMAIL username
                          $mail->Password = "Groupify1234"; // GMAIL password


                      $mail->AddAddress($_SESSION['user']['email'], $_SESSION['user']['username']);
                      $mail->SetFrom("noreply.groupify@gmail.com", "Groupify");
                      $mail->Subject = "Changed Username";
                      $mail->Body = "Your Groupify user name has been changed to ".$_SESSION['user']['username'];

                      try{
                          $mail->Send();
                      } catch(Exception $e){

                      }
          } else {
              echo "Error updating record: " . $mysqli->error;
          }
      }else{
         $_SESSION['error'] = "username unavailable";
      }
 }
//=====================================================================\\
//When enter is pressed, or submit is clicked, then either submit      \\
//or create is set, and this is checked via post method.               \\
//=====================================================================\\
if(isset($_POST["submit"])) {
    signIn();
}
if(isset($_POST["create"])){
    upload();
}
if(isset($_POST["register"])){
    header("Location: SignUp.php");
}
if(isset($_POST["back"])){
    header("Location: index.php");
}
if(isset($_POST["changeUsername"])){
    updateUsername();
}
if(isset($_POST["changePassword"])){
    updatePassword();
}
?>