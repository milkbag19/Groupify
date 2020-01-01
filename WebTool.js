function signIn(a,b){
if(a == "milkbag19"&&b=="urmomdotcom"){

    document.getElementById("y").value = "";
    window.location.href = "signUp.html";
}else{
    document.getElementById("y").value = "invalid username/password";
    }
}function signUp(a,b,c,e){
var a = false;
if(e.includes(".ca")||e.includes(".com")||e.includes(".au")||e.includes(".org")){
    if(e.includes("@")){
    a = true;
    }
}

 if(a != ""&&b==c&&a == true){
    alert("yeet");
     document.getElementById("y").value = "";
 }else if(a!=""&&b!=c&&a == true){
    document.getElementById("y").value = "passwords must match";
 }else if(a==""&&b==c&&a==true){
     document.getElementById("y").value = "invalid username";
     }
  else if(a!=""&&b==c&&a == false){
     document.getElementById("y").value = "invalid email";
  }
  else{
    document.getElementById("y").value = "invalid inputs";
  }
 }



<table style="border-collapse:collapse; width:100%; display:inline-block;">
        <tr style="border:1px solid #dddddd; padding:0px; margin:0px;">
            <th style ="border:1px solid #dddddd; width:33vw; margin:33%;"