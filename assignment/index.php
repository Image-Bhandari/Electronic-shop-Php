<!--This files includes the information about index page for user-->
<?php
	require 'link.php';//link the database file
	//selects the value from specified table and specify the query  
	$list_category='SELECT * FROM tbl_category';
	$list=$pdo->query($list_category);
	$product_desc='SELECT * FROM tbl_products';
	$desc=$pdo->query($product_desc);
	$list_feature='SELECT * FROM tbl_featured';
	$listF=$pdo->query($list_feature);
	$list_rev='SELECT * FROM tbl_uploaded_review';
	$listR=$pdo->query($list_rev);

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
							echo '<li>'.'<a href="productDetails.php?det='.$item['category_id'].'">'.$item['category_name'].'</a>'.'</li>';//displays the product details
						}
						?>
					</ul>
				</li>
				<li><a href="signIn.php">Log In</a></li>

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
						foreach($desc as $item){//loop through arrays
							echo '<li>'.'<a href ="signIn.php">'.'<h3>'.$item['product_name'].'</h3>'.'<p>'.$item['product_description'].'</p>'.'<div class="price">'.'$'.$item['product_price'].'</div>'.'</a>'.'</li>';//displays the product name, description and price
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
							$product_desc='SELECT * FROM tbl_products WHERE product_id='.$item['product_id'];
							//selects the product id from product table
							$listP=$pdo->query($product_desc);
							foreach ($listP as $row) {						
							echo '<li>'.'<h3>'.'Product ID:'.$item['product_id'].'</h3>'.'<h3>'.$row['product_name'].'</h3>'.'<p>'.$item['review_text'].'</p>'.'</li>';
							//displays product id, product name, review text
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
				echo '<li>'.'<a href ="signIn.php">'.$item['product_name'].'</a>'.'</li>';
			}?>
			</ul>

		</aside>

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
