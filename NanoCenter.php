<html>
<head>
	<title> Nanocenter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			background-color:#000000;
		}
		.navbar {
  			width: 100%;
  			background-color:#006600;
  			overflow: auto;
		}
		.navbar a {
  			float: center;
  			padding: 12px;
  			color: white;
  			text-decoration: none;
  			font-size: 17px;
		}
		.navbar a:hover {
  			background-color: #014a01;
		}
		h1{	
			text-align:center;
			color:#00FF66;
		}
		h3{
			text-align:center;
		}
		h5{
			color:#00FF66;
		}
		footer{
			text-align:center;
		}
		#bottom {
			text-align:center;	
        		position: fixed;
        		bottom: 0;
        		width: 100%;
        		color: #ffffff;
			background-color:#006600;
			padding: 15px 0;
		}
#slider{
			overflow: hidden;
		}
		#slider figure{
			position: relative;
			width:500%;
			margin: 0;
			left 0;
		animation: 20s slider infinite;
		}
		#slider figure img{
			float: left;
			width: 20%;
		}
		@keyframes slider{
			0% {
				left: 0%;
			}
			20% {
				left: 0%;
			}
			25% {
				left: -100%;
			}
			45% {
				left: -100%;
			}
			50% {
				left: -200%;
			}
			70% {
				left: -200%;
			}
			75% {
				left: -300%;
			}
			95% {
				left: -300%;
			}
			100% {
				left: -400%;
			}
		}
	</style>
</head>
<body>
	<h1> Welcome To nanoCenter</h1>
<div class="navbar">
	<h3>
  	<a href="Makeorder.php" style="color:#ffffff"><i class="fa fa-fw fa-home"></i>Create an Order</a>
  	<a href="Cart.php"><i class="fa fa-fw fa-envelope"></i>Cart</a>
	<a href="Myaccount.php"><i class="fa fa-fw fa-user"></i>My Account</a>

	</h3>
</div>
<br>
	<div id="slider">
		<figure>
			<img src="newgpu.jpg">
			<img src="newcpu.jpg">
			<img src="newcase.jpg">
			<img src="newfans2.jpg">
			<img src="newgpu.jpg">
		</figure>
	</div>
<footer>
	<div id="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
</footer>
</body>
</html>

