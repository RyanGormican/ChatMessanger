<?php
session_start();
if(isset($_SESSION["email"]))
	{
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$name = $_SESSION['name'];
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
<link rel="stylesheet" type = "text/css" href="project.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
    <title>
  View groups
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
  <h2 class = "profileBorder">
  <table>
  <tr>
  <td>
    <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
    </td>
    <td>
<i class="fa-solid fa-book-atlas"></i> <a href="testoverview.php" >  Take Test </a> 
    </td>
    </tr>
    <tr>
    <td>
       <?php
      echo $name;
          ?>
          </a> 
    </td>
    </tr>
    </table>
  </h2>
  <table class = "messengerWindow2">
<tr>
<td colspan = "2">
 <?php echo $error;?>
</td>
</tr>
      <tr>
        <td class = "borderelement2" colspan = "2">   
        <table>
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       </tr>
       </table>
       </td>
      </tr>
      <tr>
         <td class = "borderelement2" colspan ="2">
          <table>
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       </tr>
       </table>
</td> 
   
</tr>
<tr>
   <td class = "borderelement2" colspan = "2">
    <table>
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       </tr>
       </table>
</td>
</tr>
<tr> 
   <td class = "borderelement2" colspan = "2">
    <table>
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       </tr>
       </table>
    </td>
</tr>
<tr>
    <td class = "borderelement2">
    <a href="creategroup.php" > <i class="fa-solid fa-user-group"></i> Create  </a>
  </td>
 <td class = "borderelement2" id = "statusborder">
  <a href="searchgroups.php" > <i class="fa-solid fa-magnifying-glass"></i> Search  </a>   
</td> 
</tr>

    </table>
  <h2 class = "profileBorder"> 
  <table>
  <tr>
  <td>
  <i class="fa-solid fa-car"></i> 
  </td>
  <td>
   <a href="index.php"> Logout </a>
  </td>
  <td colspan = "5">
  </td>
  <td>
<i class="fa-solid fa-circle-play"></i>
  </td>
  </tr>
  </table>
  </h2>
<br>
</div>
</body>
</html>
