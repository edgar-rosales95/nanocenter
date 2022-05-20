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
	<h1> Employee</h1>
<div class="navbar">
	<h3>
  	<a href="productmanagement.php" style="color:#ffffff"><i class="fa fa-fw fa-home"></i>Product managment </a>
	<a href="Employee.php"><i class="fa fa-fw fa-user"></i>Home</a>
	</h3>
</div>

</div>

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
        echo $edata["Fname"] . " " . $edata["Lname"] . " " . $edata["DOB"] .  " " . $edata["Address"] .  " $ " . $edata["Salary"] .  "<br>";
	    echo "Employee data:<br>";
	    echo $edata["Fname"] . " " . $edata["Lname"] . "<br>";
    }
}

?>



<br>
<footer>
	<div id="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
</footer>
</body>
</html>




