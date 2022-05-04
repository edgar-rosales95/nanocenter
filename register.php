<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Nanocenter Register</title>
	<style type="text/css">
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
		.register{
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
        		position: fixed;
        		bottom: 0;
        		width: 100%;
        		color: #ffffff;
			background-color:#006600;
			padding: 15px 0;
      		}
	</style>
</head>
<body>
	<main>
	<h1>Create Your nanoCenter Account</h1>
	<hr>
	<div class="top"></div>
	<div class="register">
		<h1>Register</h1>
		<form action="">
            <label for="first Name">First Name</label>
			<input type="text">
            <label for="last Name">Last Name</label>
			<input type="text">
			<label for="username">Username</label>
			<input type="text">
			<label for="password">Password</label>
			<input type="text">
			<label for="phone number">Phone Number</label>
			<input type="text">
			<label for="address">Address</label>
			<input type="text">
			<input type="submit" value="Login">
            <p>Already have an account? <a href="login.php" style="color:#ffffff"> Login</a></p>
		</form>
		<input type= 'button' onclick='javascript:history.back();return false;' value='Previous'>
	</main>
	<footer>
		<div class="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
	</footer>
</body>
</html>
<?php
 require("getconnection.php");



if (isset($_POST["Register"])){
	echo var_dump($_POST);

	$db = get_connection();

	$insert = $db->prepare("Insert into Customer (Fname, Lname, address, phone, username, password)
		Values(?, ?, ?, ?, ?, ?)");

	$insert->bind_param("sssiss", $_POST["firstname"], $_POST["lastname"],
		$_POST["address"], $_POST["phone"], $_POST["username"], $_POST["password"]);

	$insert->execute();
}
?>
