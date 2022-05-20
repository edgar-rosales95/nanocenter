<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Shipping Orders</title>
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
			color: white;
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
		.Shiporders{
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
	<h1>Product Management</h1>
	<hr>
	<div class="top"></div>
	<div class="Shiporders">
		<h1> Shipping Orders</h1>

<form action="Shiporders.php" method = "POST"> 
            <label for="orderid">Order ID</label>		<input type="text" name ="oid">
			<input type="submit" value="Shipped" name= "submit">
	   

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


$db = get_connection();
	
	echo "Orders that need to be shipped <br>"; 
	
	$query = $db->prepare("select orderid from Orders where shipdate IS NULL");
	$query->execute();

// Getting the results will bring the results from the database into PHP.
// This lets you view each row as an associative array
	$result = $query->get_result();

	$rows = [];

	while ($row = $result->fetch_assoc()) {
		// Do something with each row: add it to an array, render HTML, etc.
		$rows []= $row;

		// This example just iterates over the columns of the rows and builds a string
		$rowtext = "";

		foreach($row as $column) {
			$rowtext = $rowtext . "$column ";
		}

		echo "$rowtext <br>";
	}
	
	$insert = $db->prepare("Update Orders set shipdate = CURRENT_DATE where orderid  = ?");

	$insert->bind_param("i", $_POST["oid"]);
        $insert->execute();

	



?>
