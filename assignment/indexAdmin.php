<!--This files includes the information about index page of admin-->
<?php
	session_start();//starts the session
	require 'link.php';//includes the database link
	//selects the value from specified table and specify the query
	$list_category='SELECT * FROM tbl_category';
	$list=$pdo->query($list_category);
	$product_desc='SELECT * FROM tbl_products';
	$desc=$pdo->query($product_desc);
	$list_rev='SELECT * FROM tbl_uploaded_review';
	$listR=$pdo->query($list_rev);

if (isset($_GET['delid'])) {//analyse the variable delid and send it to the server
	$stmt = $pdo->prepare("DELETE FROM tbl_products WHERE product_id = :delid");//delete the product
	if ($stmt->execute($_GET)) {//execute the passed value in the server
		header('location:indexAdmin.php');
	}}
?>

<!doctype html>
<html>
	<head>
		<title>Ed's Electronics</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="electronics.css" />
	</head>

	<body>
		<header>
			<h1>Ed's Electronics</h1>


			<ul>
				<li>
				</li>
				<hr />
				<li><a href="category.php">Add Category</a></li>
				<li><a href="addProduct.php">Add Product</a></li>
				<li><a href="manageUsers.php">Manage Users</a></li>
				<li><a href="editReview.php">Add Review</a></li>
				<li><a href="pendingCart.php">To Deliver</a></li>

			</ul>

			<address>
				<p>We are open 9-5, 7 days a week. Call us on
					<strong>01604 11111</strong>
				</p>
			</address>



		</header>
		<section></section>
		<main>
			<h1>Welcome to Ed's Electronics</h1>

			<p>We stock a large variety of electrical goods including phones, tvs, computers and games. Everything comes with at least a one year guarantee and free next day delivery.</p>

			<hr />

			<h2>Product list</h2>

			<ul class="products" name="verify">
				
				<?php 
					//includes the review file, edit product file, feature product file and displays it
						foreach($desc as $item){ 
							echo '<li>'.'<a href ="review.php?p_id='.$item['product_id'].'">'.'<h3>'.$item['product_name'].'</h3>'.'<p>'.$item['product_description'].'</p>'.'<div class="price">'.$item['product_price'].'</div>'.'</a>'.'<a href="editProducts.php?pid='.$item['product_id'].'">'.'EDIT'.'</a>'.'<hr />'.'<a href="feature.php?fid='.$item['product_id'].'">'.'Add As Featured'.'</a>'.'<hr />'.'<a href="indexAdmin.php?delid='.$item['product_id'].'">'.'DELETE_Product'.'</a>'.'</li>';
							echo '<hr />';
						}
						?>
				
			</ul>

			<hr />
			<h4>Product reviews</h4>
			<ul class="reviews">
				<?php 
						foreach($listR as $item){ 
							require 'link.php';
							$product_desc='SELECT * FROM tbl_products WHERE product_id='.$item['product_id'];
							//selects the product id from product table
							$listP=$pdo->query($product_desc);
							//selects  the query
							foreach ($listP as $row) {						
							echo '<li>'.'<h3>'.'Product ID:'.$item['product_id'].'</h3>'.'<h3>'.$row['product_name'].'</h3>'.'<p>'.$item['review_text'].'</p>'.'</li>';
							//displays the prodcut name, review text and product id
							echo '<hr />';
						}}
						?>
				
			</ul>
		</main>

		

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
