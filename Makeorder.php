<html>
<head>
	<title>Create Orders</title>
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
		footer{
			text-align:center;
		}
		#bottom{
			text-align:center;
			position:absolute;
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

<footer>
	<div id="bottom">&copy; NanoCenter</div>
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
