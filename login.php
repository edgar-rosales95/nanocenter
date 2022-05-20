<html lang="en">
<head>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Nanocenter Login</title>
	<style type="text/css">
		br{
			line-height: 10px;
		}
		body{
			background-color:#000000;
		}
		h1{	
			text-align:center;
			color:#00FF66;
		}
		h3{
			color:#00FF66;
		}
		.top{
			margin-top: 100px;	
		}
		.login{
			color:#00FF66;
			margin:auto;
			background:#2b2a33;
			max-width:350px;
			padding:10px;
			border-radius:4px;
		}
		input[type=text]{
			display:inline-block;
			width:100%;
			padding:10px;
			box-sizing:border-box;
			border-radius:4px;
			border: .5px solid;
			margin: 10px 0;
		}
		input[type=submit]{
			width:100%;
			padding:10px;
			margin:10px 0;
			border-radius:4px;
			border:none;
			background:orange;
			font-size;20px;
			cursor:pointer;
		}
		footer{
			text-align:center;
			color:#ffffff;
			background-color:#006600;
			padding 15px 0;
		}
		.bottom{	
        		position: absolute;
        		bottom: 0;
				left: 0;
        		width: 100%;
        		color: #ffffff;
			background-color:#006600;
			padding: 15px 0;
      		}		
	</style>
</head>
<body>
	<main>
	<h1>Login to nanoCenter</h1>
	<hr>
	<div class="top"></div>
	<div class="login">
		<h1>Login</h1>
		<form action="login.php" method= "POST">
			<label for="username">Username</label>	<input type="text" name= "username"> 
			<label for="password">Password</label><br><br>	<input type="password" name= "password" style="width:350px; height:35px;"><br><br>
			<input type="submit" name= "Login" value="Login">
			<br>
			<p>Don't have an account? <a href="register.php" style="color:#ffffff">Create Account</a></p>
		</form>
		<input type= 'button' onclick='javascript:history.back();return false;' value='Previous'>	
	</main>
	<footer>
		<div class="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
	</footer>
</body>
</html>


<?php

require_once "getconnection.php";

if (isset($_SESSION["error"])) {
	echo $_SESSION["error"];
	unset($_SESSION["error"]);
	die();
}

if (isset($_POST['Login'])) {
	unset($_POST['Login']);
	$db = get_connection();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$validation = $db ->prepare("select * from Customer where username = ?");
	$validation -> bind_param('s', $username);

	if($validation ->execute()){
		$login_result = $validation -> get_result();

		$loginInfo = $login_result -> fetch_assoc();


		if($loginInfo === False) {

			$_SESSION['error'] = "error: username and or passowrd was not found";
		}

		else {
			$isGood = password_verify($password, $loginInfo["password"]);

			if ($isGood) {
				session_start();

				$_SESSION["Customer_id"] = $loginInfo["ID"];
				$_SESSION["username"] = $loginInfo["username"];



				header("Location: NanoCenter.php");
			}
			else {
				$_SESSION["error"] = "Error: the username and/or password was not found";
				header("Location: home.html");
			}
		}
	}
}	

	else {
		echo "Error getting result: login info not found";
		die();
	}

?>
