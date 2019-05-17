<?php
	session_start();//starts the session
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){//check the session
	require 'link.php';//includes the database
	//selects the specified table and select the query
	$list_category='SELECT * FROM tbl_category';
	$list=$pdo->query($list_category);
	$product_desc='SELECT * FROM tbl_products';
	$desc=$pdo->query($product_desc);
	$list_feature='SELECT * FROM tbl_featured';
	$listF=$pdo->query($list_feature);
	$list_rev='SELECT * FROM tbl_uploaded_review';
	$listR=$pdo->query($list_rev);

	}
	else{
		header('location:signIn.php');	
	}

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
				<li>Category
					<ul>
						<?php 
						foreach($list as $item){
							echo '<li>'.'<a href="productDetails.php?det='.$item['category_id'].'">'.$item['category_name'].'</a>'.'</li>';
						}
						?>
					</ul>
				</li>
				<li></li>
				<li><a href="signIn.php">Log Out</a></li>

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

			<ul class="products">
				
				<?php 
						foreach($desc as $item){
							echo '<li>'.'<a href ="review.php?p_id='.$item['product_id'].'">'.'<h3>'.$item['product_name'].'</h3>'.'<p>'.$item['product_description'].'</p>'.'<div class="price">'.'$'.$item['product_price'].'</div>'.'</a>'.'</li>';//display the values about product table
							echo '<hr />';
						}
						?>
				
			</ul>

			<hr />

			<h4>Product reviews</h4>
			<ul class="reviews">
				<?php 
						foreach($listR as $item){ //loop through array
							require 'link.php';
							$product_desc='SELECT * FROM tbl_products WHERE product_id='.$item['product_id'];//select the product if from the table
							$listP=$pdo->query($product_desc);
							foreach ($listP as $row) {						
							echo '<li>'.'<h3>'.'Product ID:'.$item['product_id'].'</h3>'.'<h3>'.$row['product_name'].'</h3>'.'<p>'.$item['review_text'].'</p>'.'</li>';//display the product id, product name and review text
							echo '<hr />';
						}}
						?>
				
			</ul>
		</main>

		<aside>

			<h1><a href="#">Featured Product</a></h1>
			<ul>
				<?php
				foreach($listF as $item){
				echo '<li>'.'<a href ="review.php?p_id='.$item['product_id'].'">'.$item['product_name'].'</a>'.'</li>//displays the product id and product name';
			}?>
			</ul>

		</aside>

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
