<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Nanocenter Register</title>
	<style type="text/css">
		label{
			display: block;
			padding-top: 25px;
			height: 15px;
			width: 350px;
		}
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
	<h1>Create Your nanoCenter Account</h1>
	<hr>
	<div class="top"></div>
	<div class="register">
		<h1>Register</h1>

<form action="register.php" method = "POST"> 
            <label for="first Name">First Name</label>		<input type="text" name ="firstname">
            <label for="last Name">Last Name</label>		<input type="text" name ="lastname">
            <label for="username">Username</label>		<input type="text" name ="username">
	    <label for="password">Password</label><br>		<input type="password" name ="password" style="width:350px; height:35px;"><br><br>
	    <label for="phone number">Phone Number</label>	<input type="text" name ="phone">
	    <label for="address">Address</label>		<input type="text" name = "address">
			<input type="submit" value="Register" name= "Register">
	   

	 <p>Already have an account? <a href="login.php" style="color:#ffffff"> Login</a></p>
		</form>
		<input type= 'button' onclick='javascript:history.back();return false;' value='Previous'>
	</main>
		<script>
	var favicon_images = [
					'nanoCenter1.png',
					'nanoCenter1.png',
					'nanoCenter2.png',
					'nanoCenter2.png'
                ],
    image_counter = 0; // To keep track of the current image

setInterval(function() {
    // remove current favicon
    if(document.querySelector("link[rel='icon']") !== null)
        document.querySelector("link[rel='icon']").remove();
    if(document.querySelector("link[rel='shortcut icon']") !== null)
        document.querySelector("link[rel='shortcut icon']").remove();
        
    // add new favicon image
    document.querySelector("head").insertAdjacentHTML('beforeend', '<link rel="icon" href="' + favicon_images[image_counter] + '" type="image/gif">');
    
    // If last image then goto first image
    // Else go to next image    
    if(image_counter == favicon_images.length -1)
        image_counter = 0;
    else
        image_counter++;
}, 200);
</script>
	<footer>
		<div class="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
	</footer>
</body>
</html>
<?php
require_once "getconnection.php";





if (isset($_POST["Register"])){
    unset($_POST["Register"]);
//	echo var_dump($_POST);

    $db = get_connection();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (strlen($username) == 0 || strlen($password) == 0){
	    $_SESSION['error'] = "Username and/or password cannot be empty!";
	    header("Location: register.php");
    }

	


	$insert = $db->prepare("Insert into Customer (Fname, Lname, address, phone, username, password)
		Values(?, ?, ?, ?, ?, ?)");

	$insert->bind_param("sssiss", $_POST["firstname"], $_POST["lastname"],
		$_POST["address"], $_POST["phone"], $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));

        $insert->execute();

	


}
?>
