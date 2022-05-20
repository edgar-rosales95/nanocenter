<?php

session_start();

?>

<html>
<head>
	<title> Nanocenter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			background-color:#000000;
			color:white;
			font-size:25px;
		}
		.navbar {
			left: 0;
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
			position: fixed;
			left: 0;
			text-align:center;	
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
		.image-resize {
			width: 800;
			height: 1400;
		}
		.sidenav-main {
			display: grid;
  			width: 100%;
			height: 40%;
  			background: #000000;
  			overflow-x: hidden;
			border: 1px solid black;
		}
			.sidenav-left {
  			background: #000000;
			margin: 10px;
			border: 5px solid green;
			text-align: center;
		}
	</style>
</head>
<body>
	<h1> Employee</h1>
<div class="navbar">
	<h3>
  	<a href="productmanagement.php" style="color:#ffffff"><i class="fa fa-fw fa-home"></i>Product managment </a>
	<a href="Employee.php"><i class="fa fa-fw fa-user"></i>Home</a>
	</h3>
</div>

</div>
<main>
<div class="sidenav-main">
	
	<div class="sidenav-left"><h2>Products</h2>
<?php

require_once "getconnection.php";
//var_dump ($_SESSION);

$db = get_connection();

$einfo = $db->prepare("SELECT * FROM Worker where SSN = ?");

$einfo->bind_param("i", $_SESSION["wSSN"]);

if ($einfo->execute()) {
    $result = $einfo->get_result();
    if ($edata = $result->fetch_assoc()) {
        echo "Employee data:<br>";
		echo "First Name: ";
        echo $edata["Fname"] . "<br>";
		echo "Last Name: ";
		echo $edata["Lname"] . "<br>";
		echo "Date of Birth: ";
		echo $edata["DOB"] . "<br>";
		echo "Address: ";
		echo $edata["Address"] . "<br>";
		echo "Salary: ";
		echo " $ " . $edata["Salary"] .  "<br>";
    }
}

?>
</main>
</div>

<br>
 	<div id="slider">
		<figure>
			<img src="images/employees/peeps_listening_presentation.jpg" class="image-resize">
			<img src="images/employees/peeps_working_laptop.jpg" class="image-resize">
			<img src="images/employees/peeps_working_laugh.jpg" class="image-resize">
			<img src="images/employees/peeps_working_presntation.jpg" class="image-resize">
			<img src="images/employees/peeps_listening_presentation.jpg" class="image-resize">
		</figure>
	</div>
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
	<div id="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
</footer>
</body>
</html>




