
<html>
<head><title> Orders </title></head>

<h1> MAKE AN ORDER </h1>

<h2> Select a Product </h2>

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
</html>
