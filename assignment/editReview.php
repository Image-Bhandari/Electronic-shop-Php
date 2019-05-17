<!--This files includes the information about editing the review-->
<?php
	require 'link.php';//includes the database file
	$list_review='SELECT * FROM tbl_review';//selects the value from review table
	$listR=$pdo->query($list_review);

	if(isset($_GET['rid'])){//analyse the variable rid and send the variable to server
		$insert = "INSERT INTO tbl_uploaded_review(review_id,user_id,product_id,review_text)
		SELECT review_id,user_id,product_id,review_text FROM tbl_review WHERE review_id = :rid";
		$prp=$pdo->prepare($insert);
		$prp->execute($_GET);
		$stmt = $pdo->prepare("DELETE FROM tbl_review WHERE review_id = :rid");//delete the review from table
		if ($stmt->execute($_GET)) {//executes the value and send it to the server
			$_GET['msg'] = 'Review Added SuccessFully';
	}
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
				<li><a herf="indexAdmin.php">Home</a></li>
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


			<ul class="products">
				
				<?php 
						foreach($listR as $item){ //loop through each array 

							require 'link.php';
							echo 'REVIEW GIVEN BY USER ID : '.$item['user_id'];//view the user id
							$product_desc='SELECT * FROM tbl_products WHERE product_id='.$item['product_id'];//selects the product id from product table
							$listP=$pdo->query($product_desc);
							foreach ($listP as $row) {						
							echo '<li>'.'<h3>'.'Product ID:'.$item['product_id'].'</h3>'.'<h3>'.$row['product_name'].'</h3>'.'<p>'.$item['review_text'].'</p>'.'<a href="editReview.php?rid='.$item['review_id'].'">'.'Upload Review'.'</a>'.'</li>';
							//vewi the review text, product name, review id
							echo '<hr />';
						}}
						?>
				
			</ul>

			

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
