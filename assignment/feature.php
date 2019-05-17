<!--This files includes the information about feature product-->
<?php
	require 'link.php';//link the database file
	if(isset($_GET['fid'])){//checks the variable fid and send it to the server
			$insert = "INSERT INTO tbl_featured (category_id,product_id,product_name,product_price,product_description)
	SELECT category_id,product_id,product_name,product_price,product_description FROM tbl_products WHERE product_id =:fid";
	$prp=$pdo->prepare($insert);//executes the value
	
	if ($prp->execute($_GET)) {
		header('location:indexAdmin.php');		

}}






?>