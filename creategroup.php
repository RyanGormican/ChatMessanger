<?php
session_start();
if(isset($_SESSION["email"]) && $_SESSION["type"] == "moderator")
	{
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$name = $_SESSION['name'];
$id = $_SESSION['id'];
$db->close();
  }
else
{
header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang = "en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" type = "text/css" href="assignment.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
<script src='signup.js'></script>
    <title>
     Create a group
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
<h2> Create a Group <i class="fa-solid fa-user-group"></i> </h2>
<form id = "creategroup" action="creategroup.php" method = "post" enctype="multipart/form-data">
<input type="hidden" name="submitted" value="1"/>
  <table class = "messengerWindow2">
<tr>
<td colspan = "2">
 <?php echo $error;?>
</td>
</tr>
      <tr>
        <td class = "borderelement2">    
   <i class="fa-solid fa-signature"></i>  Group name:
       </td>
      <td class = "borderelement2" id = "nameborder">
        <input type="text" id="groupname"  name="name">
       </td>
      </tr>
      <tr>
         <td class = "borderelement2">
<i class="fa-solid fa-pencil"></i> Group description:
</td> 
    <td class = "borderelement2" id = "descriptionborder">
    <textarea id="groupdescription" class = "description"  name="description"></textarea>
</td>
</tr>
<tr>
   <td class = "borderelement2">
<i class="fa-solid fa-language"></i> Language Type:
</td>
 <td class = "borderelement2" id = "typeborder">
<label class = "a"  id = "typebordermes"></label>
<select name="language" >
  <option value="Empty"></option>
  <option value="English">English</option>
  <option value="French">French</option>
  <option value="German">German</option>
</select>
</td>
</tr>
<tr> 
   <td class = "borderelement2">
   <i class="fa-solid fa-book"></i>  Profiency:
    </td>
    <td class = "borderelement2" id = "profiencyborder">
<label class = "a"  id = "profiencybordermes"></label>
   <select name="profiencyfrom" >
  <option value="Empty"></option>
  <option value="Beginner">Beginner</option>
  <option value="Intermediate">Intermediate</option>
  <option value="Novice">Novice</option>
  <option value="Expert">Expert</option>
  <option value="Scholar">Scholar</option>
</select>
to 
   <select name="profiencyto" >
  <option value="Empty"></option>
  <option value="Beginner">Beginner</option>
  <option value="Intermediate">Intermediate</option>
  <option value="Novice">Novice</option>
  <option value="Expert">Expert</option>
  <option value="Scholar">Scholar</option>
</select>
</td>
</tr>

    </table>
  <h2> 
       <a href="viewgroups.php" >Back  </a>   
      <input type="submit" value ="Create Group"> 
  </h2>
  </form>
<br>
</div>
</body>
</html>
