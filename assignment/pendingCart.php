<!--This files includes the information about cart item-->
<?php
	session_start();//starts the session
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){//chceks the session id
	require 'link.php';
	//selects the value from cart table
	$list_cart='SELECT * FROM tbl_cart';
	$list=$pdo->prepare($list_cart);
	$list->execute($_POST);


}
else{
	header('location:signIn.php');	
}

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

			<ul>
				<li><a href="userIndex.php">HOME</a></li>
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
			<ul>
				<?php
					foreach ($list as $row) {//loop as an array
						require 'link.php';
							echo 'ORDERED BY USER ID:    '.$row['user_id'].'   ';
							$product_desc='SELECT * FROM tbl_products WHERE product_id='.$row['product_id'];//selects the id from product table
							$listP=$pdo->query($product_desc);
							//specify the query
							foreach ($listP as $item) {						
							echo '<li>'.'<h3>'.'Product ID:     '.$item['product_id'].'<br>'.'PRODUCT NAME      '.$item['product_name'].'</h3>'.'</li>';
							//displays the product id and product name
							echo '<hr />';
						}}
				?>

			
		</ul>
		<br><br><br><br><br><br>
		<h3>PAYMENT OPTIONS: </h3>
		<button><a href="">PAYPAL</a></button>
		<button><a href="">CASH ON DELIVERY</a></button>
		<button><a href="">OTHER CREDIT OPTIONS</a></button>
		</main>
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>

