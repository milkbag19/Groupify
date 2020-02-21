<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


 session_start();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
 // Create connection
 $mysqli = new mysqli($servername, $username, $password, $database);
 // Check connection
 if (!$mysqli) {
     die("Connection failed: " . mysqli_connect_error());
 }
     function upload(){
      //function meant to upload data to the database.  Mainly for user creation.
     checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
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

                             header("Location: https://group-ify.herokuapp.com/index.php");
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
 checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
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
         header("Location: https://group-ify.herokuapp.com/dashboard.php");
         }else{
         $_SESSION['error']="invalid username/password";
          }
 }
 /*
 //==============================================================\\
 //Logs the user out of their account. This is done by ending    \\
 //The session they are currently using (ustalizing data from)   \\
 //The database                                                  \\
 <?php
  session_start();
  session_destroy();
 ?>
 */

 function updatePassword(){
 checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
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
 checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
 $id = $_SESSION['user']['userId'];
 $oldUsername = $_SESSION['user']['username'];
 $newUsername = $_POST['username'];


 $mysqli = new mysqli($servername, $username, $password, $database);


 $searchquery = "SELECT * FROM users WHERE `username` LIKE '%{$newUsername}%'";

 $searchresult = $mysqli->query($searchquery);
 $row = $searchresult->fetch_assoc();



 if($row['username']==null){

          /*UPDATE THE USERNAME CELL USING SQL QUERY*/

          $updateQuery = "UPDATE users SET `username` = '$newUsername' WHERE `userId` = '$id'";

          /*SEND QUERY TO DATABASE*/

          if ($mysqli->query($updateQuery) === TRUE) {
              $searchresult = $mysqli->query($searchquery);
                      $row = $searchresult->fetch_assoc();
                      $_SESSION['user']=$row;
                      $_SESSION['error'] = "";


                       /*EMAIL NOTIFICATION CODE*/

                       $mail = new PHPMailer(true);
                       $mail->IsSMTP();
                       $mail->SMTPAuth = true;
                       $mail->SMTPSecure = "ssl";
                       $mail->Host = "smtp.gmail.com";
                       $mail->Port = 465;
                       $mail->Username = "noreply.groupify@gmail.com";
                       $mail->Password = "Groupify1234";
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
 function showMembers(){
  $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
  $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
  $password = "b155c581";         //declaring a placeholder for the database password sign in.
  $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
     $classCode = $_SESSION['currentClass'];

     $mysqli = new mysqli($servername, $username, $password, $database);

     $sql = "SELECT * FROM class WHERE classCode = ?";
           $stmt = $mysqli->prepare($sql);
           $stmt->bind_param('s', $classCode);
           $stmt->execute();
           $result = $stmt->get_result();
           while($row = $result->fetch_object()) {
           $userId= $row->userid;
            $sqls = "SELECT * FROM users WHERE userId = ?";
                       $stmts = $mysqli->prepare($sqls);
                       $stmts->bind_param('s', $userId);
                       $stmts->execute();
                       $results = $stmts->get_result();
                       $rows = $results->fetch_object();
                       echo"<h2 style='color:white;font-family:  Avantgarde,  CenturyGothic, sans-serif;text-align:center;'>$rows->username</h2>";
           }
 }
 function addClassroom(){
  //function meant to upload data to the database.  Mainly for user creation.
      checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
      $className = $_POST['className'];
      $idUser = $_SESSION['user']['userId'];
      $classCode = rand(10000,99999);

      $mysqli = new mysqli($servername, $username, $password, $database);
      $codeSearch = "SELECT * FROM classroom WHERE `classCode` LIKE '%{$classCode}%'";
       $searchresult = $mysqli->query($codeSearch);
       $row = $searchresult->fetch_assoc();
      while(!$row['username']==null){
        $classCode = rand(10000,99999);
        $searchresult = $mysqli->query($codeSearch);
        $row = $searchresult->fetch_assoc();
      }
      //=====================================================================\\
      //All $_POST variables are grabbing the values from HTML text boxes    \\
      //=====================================================================\\
      if($className ===''){
      }else{
              $upload = "INSERT INTO class (ClassName,userid,classCode,Teacher) VALUES ('$className','$idUser','$classCode',1)";

              if ($mysqli->query($upload) === TRUE) {
                echo"<script>window.location.href='https://group-ify.herokuapp.com/dashboard.php';</script>";
              }
             }
 }
  function removeClassroom(){
   //function meant to upload data to the database.  Mainly for user creation.
       checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
       $idUser = $_SESSION['user']['userId'];
       $classCode=$_SESSION['currentClass'];
       $mysqli = new mysqli($servername, $username, $password, $database);
       //=====================================================================\\
       //All $_POST variables are grabbing the values from HTML text boxes    \\
       //=====================================================================\\

               $upload = "DELETE FROM `class` WHERE userid='$idUser' AND classCode='$classCode'";
               if ($mysqli->query($upload) === TRUE) {
                 echo"<script>window.location.href='https://group-ify.herokuapp.com/dashboard.php';</script>";
               }

  }
function classJoin(){
checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
    $mysqli = new mysqli($servername, $username, $password, $database);
    $userId1 = $_SESSION['user']['userId'];
    $classCode = $_POST['codeInput'];
    $codeSearch = "SELECT * FROM class WHERE `classCode` LIKE '%{$classCode}%'";
    $searchresult = $mysqli->query($codeSearch);
    $row = $searchresult->fetch_assoc();
    $className = $row['ClassName'];
    if($row['classCode']==$classCode){
         $upload = "INSERT INTO class(ClassName,userid,classCode,Teacher) VALUES ('$className','$userId1','$classCode',0)";
              if ($mysqli->query($upload) === TRUE) {
                            }
    }

}

 function classSelect(){
    checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
      $mysqli = new mysqli($servername, $username, $password, $database);
      $userId1 = $_SESSION['user']['userId'];
      $sql = "SELECT * FROM class WHERE userid = ?";
      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param('s', $userId1);
      $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_object()) {
      $teacher = 1;
      $classcode=$row->classCode;
      $TeacherSearch = "SELECT * FROM class WHERE `classCode` LIKE '%{$classcode}%' AND `Teacher` LIKE '$teacher'";
            $stmt = $mysqli->prepare($TeacherSearch);
            $stmt->execute();
            $TeacherRow= $stmt->get_result();
            $LOL = $TeacherRow->fetch_object();
            $XD=$LOL->userid;
             $userSearch = "SELECT * FROM users WHERE `userId` = '$XD'";
                  $stmt = $mysqli->prepare($userSearch);
                  $stmt->execute();
                  $results = $stmt->get_result();
                  $TeacherName= $results->fetch_object();
                  $usernameee = $TeacherName->username;
          echo "<div class='classBox'>
                        <button id='class' style='height:13vh; width:32vw; border:none;box-shadow: none;font-size:2.5vw;'  class='submit1' name = 'class' value='$row->classCode' >$row->ClassName<br> [$row->classCode]</button>
                <button class='contact' id='contact'name='contact' value='$TeacherName->userId'>Contact</button><br>
                <h1 style='float:left;margin-left:1vw;font-size:2.5vw;'class='TeacherDisplay'>$usernameee</h1>

                 </div>";
      }
 }

 function sendMessage(){
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
       $mysqli = new mysqli($servername, $username, $password, $database);
 $sql = "SELECT * FROM users WHERE userId = ?";
       $stmt = $mysqli->prepare($sql);
       $stmt->bind_param('s', $_SESSION['teacherContact']);
       $stmt->execute();
       $result = $stmt->get_result();
       $row = $result->fetch_object();

 $username = $_SESSION['user']['username'];
 $mail = new PHPMailer(true);
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 465;
                        $mail->Username = "noreply.groupify@gmail.com";
                        $mail->Password = "Groupify1234";
                        $mail->AddAddress($row->email, $username);
                        $mail->SetFrom("noreply.groupify@gmail.com", "Groupify");
                        $mail->Subject = "Student Contact from $username";
                        $mail->Body = $_POST['Message'];

                       try{
                           $mail->Send();
                       } catch(Exception $e){
                            echo"wrong";
                       }
                       echo"<script>window.location.href='https://group-ify.herokuapp.com/dashboard.php'</script>";
 }

 function showClasses(){
    checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
          $mysqli = new mysqli($servername, $username, $password, $database);
          $userId1 = $_SESSION['user']['userId'];
          $sql = "SELECT * FROM class WHERE userid = ?";
          $stmt = $mysqli->prepare($sql);
          $stmt->bind_param('s', $userId1);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_object()) {
          $teacher = 1;
          $classcode=$row->classCode;
          echo "<button  class='quickClass' style='width:100%;background-color:#FFDD33;border:2px solid #FFDD33;' name ='class' id='class' value='$classcode'>$row->ClassName</button>";

          }
 }
 function addTasks(){
   //function meant to upload data to the database.  Mainly for user creation.
       checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
       $taskName = $_POST['taskName'];
       $idUser = $_SESSION['user']['userId'];
       $classCode=$_SESSION['currentClass'];
       $stus = "Working";

       $mysqli = new mysqli($servername, $username, $password, $database);


               $upload = "INSERT INTO updatedtasks (taskName,userId,classCode,stus) VALUES ('$taskName','$idUser','$classCode','$stus')";
               $stmt = $mysqli->prepare($upload);
               $stmt->execute();
               $result = $stmt->get_result();





  }
function loadTasks(){
checkSession();
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
          $mysqli = new mysqli($servername, $username, $password, $database);
          $classCode = $_SESSION['currentClass'];
          //code below was sourced via helpful user, on the internet. He also described that our table could be modified by users (which isn't good) and the suggested code fix below would fix it.
          $sql = "SELECT * FROM updatedtasks WHERE classCode = ?";
          $stmt = $mysqli->prepare($sql);
          $stmt->bind_param('s', $classCode);
          $stmt->execute();
          $result = $stmt->get_result();




          while($row = $result->fetch_object()) {
          $search = "SELECT * FROM users WHERE userId = ?";
          $userId = $row->userid;
                              $stmt1 = $mysqli->prepare($search);
                              $stmt1->bind_param('s',$userId );
                              $stmt1->execute();
                              $results = $stmt1->get_result();
                              $user = $results->fetch_object();
                              if(isset($_POST['finished'])){
                                     $value = $_POST['finished'];
                                        $updateQuery = "UPDATE updatedtasks SET `stus` = '$value' WHERE `userId` = '$userId'";
                                        $stmt1 = $mysqli->prepare($updateQuery);
                                                                      $stmt1->execute();
                                                                      echo"<script>window.location.href='https://group-ify.herokuapp.com/classroom.php'</script>";
                                     }
                                     else if(isset($_POST['working'])){
                                      $value = $_POST['working'];
                                      $updateQuery = "UPDATE updatedtasks SET `stus` = '$value' WHERE `userId` = '$userId'";
                                      $stmt1 = $mysqli->prepare($updateQuery);
                                      $stmt1->execute();
                                        echo"<script>window.location.href='https://group-ify.herokuapp.com/classroom.php'</script>";
                                     }
            echo"<tr style='background-color:white;border-radius:10px;border:0px solid #dddddd;  '><th style='border:0px solid #dddddd; height:2vh; width:33vw; '><div style='height:2vh;width:20px;background-color:red;display:block;'>  </div>$row->taskName</th><th style='border:1px solid #dddddd; height:2vh; width:33vw; '>$user->username</th><th><input type='date' name='due' value='2020-11-27'><div class='dropdown'><button class='dropbtn' id='statusMenu'>$row->stus</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                              <div class='dropdown-content'>
                                                                                                                                                                                                                                                                                                                                                                                                                                              <form id ='lol' name='SignInForm' method='post' enctype='multipart/form-data'>
                                                                                                                                                                                                                                                                                                                                                                                                                                               <button name = 'finished' value='Finished'>Finished</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                               <button name = 'working' value='Working'>Working</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                               </form>
                                                                                                                                                                                                                                                                                                                                                                                                                                              </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                              </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                              </th></tr>
                        ";


          }

 }
 function checkSession(){
             if (session_status() == PHP_SESSION_ACTIVE) {
                    }
                    else{
                    session_start();
                    }

           }
 function checkSignin(){
 if(array_key_exists ( 'user' , $_SESSION )){
    if($_SESSION['user']!=null){
    echo"yeet2";
        echo"<script>window.location.href='https://group-ify.herokuapp.com/dashboard.php'</script>";
       }
    }
 }
 function getClassName(){
 $servername = "us-cdbr-iron-east-04.cleardb.net";  //declaring a placeholder for the database server name.
 $username = "b68081f3e213ce";    //declaring a placeholder for the database username sign in.
 $password = "b155c581";         //declaring a placeholder for the database password sign in.
 $database = "heroku_ddbc7204b6736f4";     //declaring which database within the server to connect to.
           $mysqli = new mysqli($servername, $username, $password, $database);
           $classCode = $_SESSION['currentClass'];
           //code below was sourced via helpful user, on the internet. He also described that our table could be modified by users (which isn't good) and the suggested code fix below would fix it.
           $sql = "SELECT * FROM class WHERE classCode = ?";
           $stmt = $mysqli->prepare($sql);
           $stmt->bind_param('s', $classCode);
           $stmt->execute();
           $result = $stmt->get_result();
           $row = $result->fetch_object();
           $_SESSION['currentClassName'] = $row->ClassName;
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
    header("Location: https://group-ify.herokuapp.com/SignUp.php");
}
if(isset($_POST["back"])){
    header("Location: https://group-ify.herokuapp.com/index.php");
}
if(isset($_POST["changeUsername"])){
    updateUsername();
}
if(isset($_POST["changePassword"])){
    updatePassword();
}
?>