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
$name = $_SESSION['name'];
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
class Database
{
	function addconnection()
	{
		$database = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
		return $database;
	}
}
?>
<?php 
class groupInstance
{
	private $group_id;
	private $user_id;
	private $message;
	private $created_on;
	protected $connect;

	public function setChatId($group_id)
	{
		$this->group_id = $group_id;
	}

	function getChatId()
	{
		return $this->group_id;
	}

	function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	function getUserId()
	{
		return $this->user_id;
	}

	function setMessage($message)
	{
		$this->message = $message;
	}

	function getMessage()
	{
		return $this->message;
	}

	function setCreatedOn($created_on)
	{
		$this->created_on = $created_on;
	}

	function getCreatedOn()
	{
		return $this->created_on;
	}

	public function __construct()
	{
		$database_object = new Database;
		$this->addconnection = $database_object->addconnection();
	}

	function save_chat()
	{
		$query = "
		INSERT INTO GroupMessage
			(profileid, text, created_on) 
			VALUES (:profileid, :text, :created_on)
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':userid', $this->user_id);

		$statement->bindParam(':msg', $this->message);

		$statement->bindParam(':created_on', $this->created_on);

		$statement->execute();
	}

	function fetch_groupmessages()
	{
		$q1 = "SELECT * FROM GroupMessage WHERE GroupMessage.groupid = '$room'";

		$results = $this->addconnection->prepare($query);
		$results->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}
	
?>
<?php

class chattersInstance
{
	private $user_id;
	private $user_name;
	private $user_email;
	private $user_password;
	private $user_profile;
	private $user_status;
	private $user_created_on;
	private $user_verification_code;
	private $user_login_status;
	public $connect;

	public function __construct()
	{
		$database_object = new Database;
		$this->addconnection = $database_object->addconnection();
	}

	function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	function getUserId()
	{
		return $this->user_id;
	}

	function setUserName($user_name)
	{
		$this->user_name = $user_name;
	}

	function getUserName()
	{
		return $this->user_name;
	}

	function setUserEmail($user_email)
	{
		$this->user_email = $user_email;
	}

	function getUserEmail()
	{
		return $this->user_email;
	}

	function setUserPassword($user_password)
	{
		$this->user_password = $user_password;
	}

	function getUserPassword()
	{
		return $this->user_password;
	}

	function setUserProfile($user_profile)
	{
		$this->user_profile = $user_profile;
	}

	function getUserProfile()
	{
		return $this->user_profile;
	}

	function setUserStatus($user_status)
	{
		$this->user_status = $user_status;
	}

	function getUserStatus()
	{
		return $this->user_status;
	}

	function setUserCreatedOn($user_created_on)
	{
		$this->user_created_on = $user_created_on;
	}

	function getUserCreatedOn()
	{
		return $this->user_created_on;
	}

	function setUserVerificationCode($user_verification_code)
	{
		$this->user_verification_code = $user_verification_code;
	}

	function getUserVerificationCode()
	{
		return $this->user_verification_code;
	}

	function setUserLoginStatus($user_login_status)
	{
		$this->user_login_status = $user_login_status;
	}

	function getUserLoginStatus()
	{
		return $this->user_login_status;
	}



	function get_user_data_by_email()
	{
		$query = "
		SELECT * FROM chat_user_table 
		WHERE user_email = :user_email
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_email', $this->user_email);

		if($statement->execute())
		{
			$user_data = $statement->fetch(PDO::FETCH_ASSOC);
		}
		return $user_data;
	}

	function save_data()
	{
		$query = "
		INSERT INTO chat_user_table (user_name, user_email, user_password, user_profile, user_status, user_created_on, user_verification_code) 
		VALUES (:user_name, :user_email, :user_password, :user_profile, :user_status, :user_created_on, :user_verification_code)
		";
		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_name', $this->user_name);

		$statement->bindParam(':user_email', $this->user_email);

		$statement->bindParam(':user_password', $this->user_password);

		$statement->bindParam(':user_profile', $this->user_profile);

		$statement->bindParam(':user_status', $this->user_status);

		$statement->bindParam(':user_created_on', $this->user_created_on);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function is_valid_email_verification_code()
	{
		$query = "
		SELECT * FROM chat_user_table 
		WHERE user_verification_code = :user_verification_code
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		$statement->execute();

		if($statement->rowCount() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function enable_user_account()
	{
		$query = "
		UPDATE chat_user_table 
		SET user_status = :user_status 
		WHERE user_verification_code = :user_verification_code
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_status', $this->user_status);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function update_user_login_data()
	{
		$query = "
		UPDATE chat_user_table 
		SET user_login_status = :user_login_status 
		WHERE user_id = :user_id
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_login_status', $this->user_login_status);

		$statement->bindParam(':user_id', $this->user_id);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_user_data_by_id()
	{
		$query = "
		SELECT * FROM chat_user_table 
		WHERE user_id = :user_id";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_id', $this->user_id);

		try
		{
			if($statement->execute())
			{
				$user_data = $statement->fetch(PDO::FETCH_ASSOC);
			}
			else
			{
				$user_data = array();
			}
		}
		catch (Exception $error)
		{
			echo $error->getMessage();
		}
		return $user_data;
	}


	function update_data()
	{
		$query = "
		UPDATE chat_user_table 
		SET user_name = :user_name, 
		user_email = :user_email, 
		user_password = :user_password, 
		user_profile = :user_profile  
		WHERE user_id = :user_id
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_name', $this->user_name);

		$statement->bindParam(':user_email', $this->user_email);

		$statement->bindParam(':user_password', $this->user_password);

		$statement->bindParam(':user_profile', $this->user_profile);

		$statement->bindParam(':user_id', $this->user_id);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function fetch_chatter()
	{
		$query = "
		SELECT * FROM Profile WHERE profile_id = '$id'  
		";

		$statement = $this->addconnection->prepare($query);

		$statement->execute();

		$data = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}

}



?>



<!DOCTYPE html>
<html>
<head>
	<title> Group chat </title>
    <link href="vendor-front/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="vendor-front/jquery/jquery.min.js"></script>
    <script src="vendor-front/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor-front/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="vendor-front/parsley/dist/parsley.min.js"></script>
    <link href="vendor-front/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="project.css"/>
</head>
<body class = "background">
<div class = "messengerWindowsignup"> 
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-header">
	<h2>
	<?php echo $name ?> 
	</h2></div>
<div class="messages">
<?php
$group_room = new groupInstance; 
$group_chatters = new chattersInstance;
$groupmes = $group_room->fetch_groupmessages();
$chattermes = $group_chatters->fetch_chatter(); 
foreach($groupmes as $group)
{
if(isset($_SESSION['id']))
{
$fromuser='$id';
$row_class = 'row justify-content-start';
$background_class = 'text-dark alert-light';
}
else
{
$from = $group['user_name'];
$row_class = 'row justify-content-end';
$background_class = 'alert-success';

echo '	<div class="'.$row_class.'"><div class="col-sm-10"><div class="shadow-sm alert '.$background_class.'"><b>'.$from.' - </b>'.$chat["msg"].'<br />	<div class="text-right"> <small><i>'.$chat["created_on"].'</i></small</div></div></div></div>';
}
?>
</div>
</div>

				<form method="post" id="chat_form" data-parsley-errors-container="#validation_error">
					<div class="input-group mb-3">
						<textarea class="form-control" id="chat_message" name="chat_message" placeholder="Enter your message" data-parsley-maxlength="1000" data-parsley-pattern="/^[a-zA-Z0-9\s]+$/" required></textarea>
						<div class="input-group-append">
							<button type="submit" name="send" id="send" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
						</div>
					</div>
					<div id="validation_error"></div>
				</form>
			</div>
			<div class="col-lg-4">
				<?php

				$login_user_id = '';

				foreach($_SESSION['user_data'] as $key => $value)
				{
					$login_user_id = $value['id'];
				?>
				<?php
				}
				?>
<div class="card mt-3">
</div>
</div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function()
{
		var conn = new WebSocket('wss://localhost:8080');
		conn.onopen = function(e) {
		    console.log("Connection established!");
		};

		conn.onmessage = function(e) {
		    console.log(e.data);

		    var data = JSON.parse(e.data);

		    var row_class = '';

		    var background_class = '';

		    if(data.from == 'Me')
		    {
		    	row_class = 'row justify-content-start';
		    	background_class = 'text-dark alert-light';
		    }
		    else
		    {
		    	row_class = 'row justify-content-end';
		    	background_class = 'alert-success';
		    }

		    var html_data = "<div class='"+row_class+"'><div class='col-sm-10'><div class='shadow-sm alert "+background_class+"'><b>"+data.from+" - </b>"+data.msg+"<br /><div class='text-right'><small><i>"+data.dt+"</i></small></div></div></div></div>";
		    $('#messages_area').append(html_data);
		    $("#chat_message").val("");
		};
		$('#chat_form').parsley();
		$('#messages_area').scrollTop($('#messages_area')[0].scrollHeight);
		$('#chat_form').on('submit', function(event){
			event.preventDefault();
			if($('#chat_form').parsley().isValid())
			{
				var user_id = $('#login_user_id').val();
				var message = $('#chat_message').val();
				var data = {
				userId : user_id,
				msg : message
				};
				conn.send(JSON.stringify(data));
				$('#messages_area').scrollTop($('#messages_area')[0].scrollHeight);
			}
		});
	});
	}
</script>
</html>

