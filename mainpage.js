window.onload=function(){
document.getElementById("login").addEventListener("submit", validateLogin, false);
}
window.setInterval(function(){
}, 60000);
function pollCheck()
{
var send1 = document.getElementById("1").name;
var send2 = document.getElementById("2").name;
var send3 = document.getElementById("3").name;
var send4 = document.getElementById("4").name;
var send5 = document.getElementById("5").name;
       var  xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        var results = JSON.parse(this.responseText);
if (results.length > 0) 
              {
for (var i=0; i < results.length; i++)
{
var t = i + 1;
var m = t + "tag";
          var json_result = results[i];
}
       
}
}
xmlhttp.open("GET", "mainpageprocess.php?a=" + send1 + "&b=" + send2 + "&c=" + send3 + "&d=" + send4 + "&e=" + send5, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
}
function validateLogin(event)
{
var email = document.forms.login.email.value;
var emailcheck =  /^\w+[._-]?\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
var password = document.forms.login.password.value;
var errorclear = true;
document.getElementById("emailerror").innerHTML="";
document.getElementById("passworderror").innerHTML="";

if (email == "")
{
errorclear = false;
document.getElementById("emailerror").innerHTML="Email field is empty";
}
else if (emailcheck.test(email) == false)
{
errorclear = false; 
document.getElementById("emailerror").innerHTML="Email address in the wrong format. Example: username@somewhere.sth";
}

if (password == "")
{
errorclear = false; 
document.getElementById("passworderror").innerHTML="Password field is empty";
}
else if (password.length <8)
{
errorclear = false; 
document.getElementById("passworderror").innerHTML="Password must be 8 characters or more";
}
else if (password.indexOf(' ') >=0)
{
errorclear= false; 
document.getElementById("passworderror").innerHTML="Password must not contain any spaces";
}
if (errorclear == true)
{
// document.getElementById("loginsucess").innerHTML=
//"Login Succesfull! Here is the information" + "<br>" +" Email: " +email+"<br>"+"Password: "+password;
     } 
if (errorclear == false)
{
event.preventDefault();
 document.getElementById("loginsucess").innerHTML="";
     } 
}
