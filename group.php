<?php
session_start();
if(isset($_SESSION["email"]))
	{
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$id = $_SESSION['id'];
$named = $_SESSION['name'];
$db->close();
 if(isset($_GET['a']) ){
    $_SESSION['info']=$_GET['a'];
 }
$name = $_GET['b'];
$room = $_GET['a'];
 }
else
{
header("Location: index.php");
}
?>


<?php
if (isset($_POST['submit'])){
$db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
 
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
  
$named= mysqli_real_escape_string(
      $link, $_REQUEST['profilename']);
$message = mysqli_real_escape_string(
      $link, $_REQUEST['text']);
date_default_timezone_set('America/Regina');
$theTime=date('y-m-d h:ia');

$q1 = "INSERT INTO messenges (profilename, time,text,groupedid) VALUES ('$named', '$theTime', '$message', '$room')";
if(mysqli_query($link, $q1)){
    ;
} else{
    echo "ERROR: Message not sent!!!";
}
 // Close connection
mysqli_close($link);
}
?>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" type = "text/css" href="project.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
<body class = "background">
<div class = "messengerWindowsignup"> 
<style>
	
*{
    box-sizing:border-box;
}


 
</style>
<body onload="show_func()">
<div class ="messengerWindow2">
    <main>
     
          
            
                <h2><?php echo $name; ?> </h2>
        
      
 
<script>
function show_func(){
 
 var element = document.getElementById("chathist");
    element.scrollTop = element.scrollHeight;
  
 }
 </script>
  
<form id="myform" action="Group.php" method="POST" >
<div class="inner_div" id="chathist">
<?php
$db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
 
$query = "SELECT * FROM messenges WHERE groupedid = '$room'";
 $run = $db->query($query);
 $i=0;
  
 while($row = $run->fetch_array()) :
 if($i==0){
 $i=5;
 $first=$row;
 ?>
 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
 <?php echo $row['text']; ?></span> <br/>
 <div>
   <span style="color:black;float:left;
   font-size:10px;clear:both;">
    <?php echo $row['profilename']; ?>,
        <?php echo $row['time']; ?>
   </span>
</div>
</div>
<br/><br/>
 <?php
 }
else
{
if($row['profilename']!=$first['profilename'])
{
?>
 <div id="triangle" class="triangle"></div>
 <div id="message" class="message">
 <span style="color:white;float:left;">
   <?php echo $row['text']; ?>
 </span> <br/>
 <div>
  <span style="color:black;float:right;
          font-size:10px;clear:both;">
  <?php echo $row['profilename']; ?>,
        <?php echo $row['time']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}
else
{
?>
 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
  <?php echo $row['text']; ?>
 </span> <br/>
 <div>
 <span style="color:black;float:left;
         font-size:10px;clear:both;">
 <?php echo $row['profilename']; ?>,
      <?php echo $row['time']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}
}
endwhile;
?>
</div>
    <footer>
        <table>
        <tr>
           <th>
            <input  class="input1" type="text"
                    id="profilename" name="profilename"
                    placeholder="From">
           </th>
           <th>
            <textarea id="text" name="text"
                rows='3' cols='50'
                placeholder="Type your message">
            </textarea></th>
           <th>
            <input class="input2" type="submit"
            id="submit" name="submit" value="send">
           </th>               
        </tr>
        </table>               
    </footer>
</form>
</main>   
</div>
	</div>
</body>
</html>
