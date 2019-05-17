<!--This files includes the information about editing the product-->
<?php
	require 'link.php';//includes the database file

	if(isset($_POST['add'])){//analyse the variable add is set or not

		$insert ='UPDATE tbl_products SET 
		(product_name = :product_name,
		 product_price =:product_price,
		 product_description=:product_description,
		  category_id = :category_id) 
			WHERE product_id =:pid;';//update the table product
		//$prp=$pdo->prepare($insert);
		unset($_POST['add']);//destroy the variable add		
		$_POST['pid']=$_GET['pid'];//send the id to server which isnot visible
		$prp->execute($_POST);
		if ($stmt->execute($_POST)) {//execute the value
	    	
		header('location:indexAdmin.php');
		}
	}
	$list_category='SELECT * FROM tbl_category';//selects the value from category
	$list=$pdo->query($list_category);
	$list_products='SELECT * FROM tbl_products WHERE product_id=:pid'; //querying for the appropriate table 
	$stmt=$pdo->prepare($list_products);//prepairing the query statement
	$stmt->execute($_GET); // executing the method
	$listP=$stmt->fetch();
	?>
<html>
	<head>
		<title>Ed's Electronics</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="electronics.css" />
	</head>

	<body>
		<header>
			<h1>Ed's Electronics</h1>


			

			<address>
				<p>We are open 9-5, 7 days a week. Call us on
					<strong>01604 11111</strong>
				</p>
			</address>



		</header>
		<section></section>
		<main>
			<h1>Welcome to Ed's Electronics</h1>
			<form action="" method="post">
				<!--to make the form of product table-->
				<label>PRODUCT NAME</label> <input type="text" name="product_name" value="<?php echo $listP['product_name'];?>" />
				<label>PRODUCT PRICE</label> <input type="text" name="product_price" value="<?php echo $listP['product_price'];?>" />
				<label>PRODUCT DESCRIPTION</label> <textarea name="product_description"><?php echo $listP['product_description']?></textarea>
				<label> CATAGORY TYPE</label>				
					<select name="category_id">
					<?php foreach ($list as $item) {
						echo '<option value='.$listP['category_id'].'>'.$item['category_name'].'</option>';
					} ?>
				 </select>

				<input type="submit" name="add" value="submit" />
			</form>
			
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
