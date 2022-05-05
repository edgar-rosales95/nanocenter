<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MariaDB + PHP essentials</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>MariaDB + PHP essentials</h1>

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

</body>
</html>
