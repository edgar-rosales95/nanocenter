<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Change quantity</title>
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
		.Changequantity{
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
	<div class="Changequantity">
		<h1>Change Quantity</h1>

<form action="Changequantity.php" method = "POST"> 
            <label for="productid">Product ID</label>		<input type="text" name ="productid">
            <label for="quantity">New Quantity</label>		<input type="text" name ="quantity">
			<input type="submit" value="Update" name= "submit">
	   

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





if (isset($_POST["Changequantity"])){
    unset($_POST["Changequantity"]);
//	echo var_dump($_POST);

    $db = get_connection();	


	$insert = $db->prepare("update Product set quantity = ? where productid = ?");

	$insert->bind_param("ii", $_POST["quantity"], $_POST["productid"]);

        $insert->execute();

	


}
?>
