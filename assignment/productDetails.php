<!--This files includes the information about product detail-->
<?php
	session_start();//starts the session
	require 'link.php';//include the database 
	//select the specified table and specify the query
	$list_category='SELECT * FROM tbl_category';
	$list=$pdo->query($list_category);
	$product_desc='SELECT * FROM tbl_products';
	$desc=$pdo->query($product_desc);
	$list_feature='SELECT * FROM tbl_featured';
	$listF=$pdo->query($list_feature);


	if(isset($_GET['det'])){//analyse the variable det and send it the server
		$select = "SELECT * FROM tbl_products WHERE category_id = :det";//selects the category id which is set as foreign key in the product table
		$prp=$pdo->prepare($select);//prepare the statement
		$prp->execute($_GET);//execute and send it to the server
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
							echo '<li>'.'<a href="productDetails.php?det='.$item['category_id'].'">'.$item['category_name'].'</a>'.'</li>';//displays category id and category name
						}
						?>
					</ul>
				</li>
				<!-- <li><a href="category.php">Add Category</a></li> -->
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

			<ul class="products">
				
				<?php 
						foreach($prp as $item){
							//displays the product id, product name, product description and product price
							echo '<li>'.'<a href ="signIn.php">'.'<h3>'.$item['product_name'].'</h3>'.'<p>'.$item['product_description'].'</p>'.'<div class="price">'.$item['product_price'].'</div>'.'</a>'.'</li>';
							echo '<hr />';
						}
						?>
				
			</ul>

			<hr />

			
		</main>


		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
