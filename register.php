<html>
<head>
	<title> Nanocenter Register</title>
	<style type="text/css">
		label{
			width:100px;
			display:inline-block;
		}
	</style>
</head>

<h1> Create Your Account</h1>

<form action = "register.php" method ="post">
	<label>First name:</label> 	<input type = "text" name ="firstname"><br>
	<label>Last name:</label> 	<input type = "text" name ="lastname"><br>
	<label>Username:</label> 	<input type = "text" name ="username"><br>
	<label>Passsword:</label> 	<input type = "password" name ="password"><br>
	<label>Phone number:</label> 	<input type = "text" name ="phone"><br>
	<label>Address:</label> 	<input type = "text" name ="address"><br>
	 		<input type = "submit" name "Register">

</form>
</html>
<?php
if (isset($_POST["Register"])){
	echo var_dump($_POST);

	$db = get_connection();

	$insert = $db->prepare("Insert into Customer (Fname, Lname, address, phone, username, password)
		Values(?, ?, ?, ?, ?, ?)");

	$insert->bind_param("sssi", $_POST["firstname"], $_POST["lastname"],
		$_POST["address"], $_POST["phone"], $_POST["username"], $_POST["password"]);

	$inser->execute();
}
?>
