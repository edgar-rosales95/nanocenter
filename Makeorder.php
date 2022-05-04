<html>
<head>
	<title>Create Orders</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			background-color:#000000;
		}
		h1{	
			text-align:center;
			color:#00FF66;
		}
		h2{
			color:#00FF66;		
		}
		h3{
			text-align:absolute;
			color:#00FF66;
		}
		h4{
			text-align:center;
			color:#00FF66;
		}
		.sidenav {
			height:70%;
  			width: 300px;
  			position: left;
  			z-index: 1;
  			top: 20px;
  			left: 20px;
  			background: #ffffff;
  			overflow-x: hidden;
  			padding: 1px 0;
		}
		footer{
			text-align:center;
		}
		#bottom{
			text-align:center;
			position:fixed;
			bottom: 0;
			width: 100%;
			color:#ffffff;
			background-color:#006600;
			padding:15px 0;
		}
</style>
</head>
	<body>
	<h1> MAKE AN ORDER </h1>
<br>
<hr>
	<h3><a href="NanoCenter.html" style="color:#ffffff">Home</a>
	<h2> Select a Product </h2>

<div class="sidenav">
	<h4>Products</h4
</div>

<footer>
	<div id="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
</footer>
</body>
</html>
<?php
$db = get_connection();
$query = $db->prepare("SELECT pname from Product");
$query->execute();

$result = $query ->get_result();

$rows =[];

while ($row = $result->fetch_assoc()){
	$row []= $row;

	$rowtext = "";

	foreach($row as $column) {
		$rowtext = $rowtext . "$column ";
	}

	echo " $rowtext <br>";
}

?>
