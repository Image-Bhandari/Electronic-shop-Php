<!--This files includes the information about adding the product-->
<?php
	require 'link.php';//includes the database file

	if(isset($_POST['add'])){//anaylse the variable add is set or not

		$insert = "INSERT INTO tbl_products(product_name, product_price,product_description, category_id) 
									VALUES(:product_name,:product_price,:product_description, :category_id);";
									//inserting into table products
		$prp=$pdo->prepare($insert);//prepairinf the query
		unset($_POST['add']);	//removing 	unwanted element from query
		$prp->execute($_POST); //execting the query
		header('location:addProduct.php');//redirecting to the same page
	}
	$list_category='SELECT * FROM tbl_category';//querying the data into a variable
	$list=$pdo->query($list_category);//prepairing the statement
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
				<!--form for adding product-->
				<label>PRODUCT NAME</label> <input type="text" name="product_name" />
				<label>PRODUCT PRICE</label> <input type="text" name="product_price" />
				<label>PRODUCT DESCRIPTION</label> <textarea name="product_description"></textarea>
				<label> CATAGORY TYPE</label>				
					<select name="category_id">
					<?php foreach ($list as $item) {//Loop through every key that are set
						echo '<option value='.$item['category_id'].'>'.$item['category_name'].'</option>';//displays the category id and category name
					} ?>
				 </select>

				<input type="submit" name="add" value="submit" />
			</form>
			
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
