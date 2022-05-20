<html>
<head>
	<title> Nanocenter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			background-color:#000000;
		}
		.navbar {
			position: fixed;
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
			text-align:center;	
        		position: absolute;
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
	<h1> Product Management</h1>
<div class="navbar">
	<h3>
  	<a href="Addproduct.php" style="color:#ffffff"><i class="fa fa-fw fa-home"></i>Add Product </a>
	<a href="Deleteproduct.php"><i class="fa fa-fw fa-user"></i>Delete Product</a>
	<a href="Changequantity.php"><i class="fa fa-fw fa-user"></i>Update Quantity</a>
	<a href="Shiporders.php"><i class="fa fa-fw fa-user"></i>Order Shipping</a>
	<a href="Employee.php"><i class="fa fa-fw fa-user"></i>Home</a>
	</h3>
</div>

<br>
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

