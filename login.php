<html>
<head>
	<title> Nanocenter Register</title>
	<style type="text/css">
		label{
			text-align:center;
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
			text-align:center;
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
<h1>nanoCenter</h1>
<br>
<hr>
<h3><a href="NanoCenter.html" style="color:#ffffff">Home</a></h3>
<center>
	<div style="border:5px double white; text-align:center; width:30%">
		<h3>Login</h3>
	</div>
</center>
</table>
<form action = "login.php" method ="post">
	<label style="text-align: center;">Username:</label> 	<input type = "text" name ="username"><br>
	<label style="text-align: center;">Passsword:</label> 	<input type = "password" name ="password"><br>
<br>
					<input type = "submit" name = "Register">
<br>
<footer>
	<div id="bottom">&copy; nanoCenter</div>
</footer>
</form>
</body>
</html>
