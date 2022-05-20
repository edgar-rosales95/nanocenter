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
			text-align: center;			
		}
		h3{
			text-align:absolute;
			color:#00FF66;
		}
		h4{
			text-align:center;
			color:#00FF66;
		}
		.sidenav-main {
			display: grid;
  			width: 100%;
			height: 70%;
  			background: #ffffff;
  			overflow-x: hidden;
			grid-template-columns: 1fr 1fr;
			grid-gap: 20px;
			border: 1px solid black;
		}
			.sidenav-left {
  			background: #ffffff;
			margin: 10px;
			border: 5px solid green;
			text-align: center;
		}
			.sidenav-right {
  			background: #ffffff;
			margin: 10px;
			border: 5px solid green;
			text-align: center;
		}
		footer{
			text-align:center;
		}
		#bottom{
			text-align:center;
			position:fixed;
			bottom: 0;
			left: 0;
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
	<h3><a href="NanoCenter.php" style="color:#ffffff">Home</a>
	<h2> Our Products </h2>

<div class="sidenav-main">
	
	<div class="sidenav-left"><h2>Products</h2>
	<br>

<?php

date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("display_errors", 1);


function get_connection() {
    static $connection;

    if (!isset($connection)) {
        // Connect to the cmps3420 database using username demo3420, password 3420.
        $connection = mysqli_connect('localhost', 'nanocenter', 'retneconan3420S22','nanocenter')
            or die(mysqli_connect_error());
    }
    if ($connection === false) {
        echo "Unable to connect to database<br/>";
        echo mysqli_connect_error();
    }

    return $connection;
}


// Get a connection, prepare a query, and execute it
$db = get_connection();
$query = $db->prepare("SELECT pname, price FROM Product");
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
?>

<form action="hellodb.php" method="POST">
    <label>Enter something: <input type="text" name="something"></label>
<?php
// Now let's build a select option dropdown from the rows
echo "<select name='dropdown'>";

foreach($rows as $row) {
    $rowid = $row['pname'];
    $rowdata = $row['price'];
    echo "<option value='$rowid'>$rowdata</option>";
}

echo "</select>";
?>
    <input type="submit">
</form>

<?php
if (isset($_POST["something"])) {
    echo "You entered " . htmlspecialchars($_POST['something']) . " <br>";
}

if (isset($_POST["dropdown"])) {
    for($i = 0; $i < count($rows); $i++) {
        if ($rows[$i]['pname'] == $_POST['dropdown']) {
            echo "You entered " . $_POST['dropdown'] . " <br>";
        }
    }
}

?>


</div>
<div class="sidenav-right"><h2>Choose a Product</h2></div>
	
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

