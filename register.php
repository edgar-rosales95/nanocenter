<html>
<head>
	<title> Nanocenter Register</title>
	<style type="text/css">
		label{
			color:#00FF66;
			width:100px;
			display:inline-block;
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
		h4{
			color:#00FF66;
		}
		h5{
			color:#00FF66;
		}
		footer{
			text-align:center;
		}
		#bottom {
			text-align:center;	
        		position: absolute;
        		bottom: 0;
        		width: 100%;
        		color: #ffffff;
			background-color:#006600;
			padding: 15px 0;
      		}
	</style>
</head>
<body>
<h1> Create Your nanoCenter Account</h1>
<br>
<hr>
<h3><a href="NanoCenter.html" style="color:#ffffff">Home</a></h3>
<br>
<h4>Register Account</h4>
<form action = "register.php" method ="post">
	<label>First name:</label> 	<input type = "text" name ="firstname"><br>
	<label>Last name:</label> 	<input type = "text" name ="lastname"><br>
	<label>Username:</label> 	<input type = "text" name ="username"><br>
	<label>Passsword:</label> 	<input type = "password" name ="password"><br>
	<label>Phone number:</label> 	<input type = "text" name ="phone"><br>
	<label>Address:</label> 	<input type = "text" name ="address"><br>
<br>
					<input type = "submit" name = "Register">
<br>
<footer>
	<div id="bottom">&copy; NanoCenter</div>
</footer>
</form>
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
