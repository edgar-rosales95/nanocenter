<html lang="en">
<head>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Nanocenter Login</title>
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
		.login{
			color:#00FF66;
			margin:auto;
			background:#ffffff;
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
	<h3><a href="NanoCenter.html" style="color:#ffffff">Home</a></h3>
	<div class="top"></div>
	<div class="login">
		<h1>Login</h1>
		<form action="">
			<label for="username">Username</label>
			<input type="text">
			<label for="password">Password</label>
			<input type="text">
			<input type="submit" value="Login">
		</form>
	</main>
	<footer>
		<div class="bottom">&copy; nanoCenter</div>
	</footer>
</body>
</html>
