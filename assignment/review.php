<?php
	session_start();//starts the session
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){//checks the session id
	require 'link.php';//include the database
	//anaylse the variable add is set or not
	if(isset($_GET['add'])){
		//insert the value in the table
		$insert = "INSERT INTO tbl_cart(user_id,product_id,date) 
										VALUES(:user_id,:product_id,:date);";
		$prp=$pdo->prepare($insert);//prepare to execute the value
		$_GET['user_id']=$_SESSION['user_id'];//gets the session id
		$_GET['product_id'] = $_GET['add'];
		$_GET['date']=date('y/m/d');
		unset($_GET['add']);//destroy the add variable
		var_dump($_GET);//dump the variable
		$prp->execute($_GET);
		header('location:payment.php');
	}
	//selects the value from specified table and prepare them to execute
	else{
		$list_product="SELECT * FROM tbl_products where product_id=:p_id";
	$list=$pdo->prepare($list_product);
	$list->execute($_GET);
	$list_review="SELECT * FROM tbl_review WHERE product_id=:p_id";
	$listR=$pdo->prepare($list_review);
	$listR->execute($_GET);
	}

	if(isset($_POST['addReview'])){//check the variable addreview

		$insert = "INSERT INTO tbl_review(user_id,product_id,review_text) 
										VALUES(:user_id,:product_id,:review);";//insert the values in review table
		$prp=$pdo->prepare($insert);
		unset($_POST['addReview']);//destroy the variable
		$_POST['user_id']=$_SESSION['user_id'];
		$_POST['product_id'] = $_GET['p_id'];
		$prp->execute($_POST);
	}}
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


			

			<address>
				<p>We are open 9-5, 7 days a week. Call us on
					<strong>01604 11111</strong>
				</p>
			</address>



		</header>
		<section></section>
		<main>
			<h1>Welcome to Ed's Electronics</h1>
						<?php 
						foreach($list as $item){
							echo '<ul class="products">'.'<li>'.'<h3>'.$item['product_name'].'</h3>'.'<p>'.$item['product_description'].'</p>'.'<div class="price">'.$item['product_price'].'</div>'.'<a href = "review.php?add='.$item[product_id].'">'.' ADD TO CART'.' </a>'.'</li>'.'</ul>';
							//displays the product name, product description,price
							
						}
						?>
							<!--social media link-->
						<!--Facebook for Developers. 2019. Share Button - Social Plugins - Documentation - Facebook for Developers. [ONLINE] Available at: https://developers.facebook.com/docs/plugins/share-button/. [Accessed 12 January 2019].-->
						<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%2Fassignment%2Freview.php%3Fp_id%3D6&layout=button_count&size=small&mobile_iframe=true&width=68&height=20&appId" width="68" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
						<a href="http://www.facebook.com/sharer/sharer.php?u=https://localhost<?php echo $url;?>">Share </a>
					
			<form method="post" action="">
				<label>REVIEW HERE: </label>
				<textarea name="review"></textarea>
				<input type="submit" name="addReview" value="Upload">
				
			</form>
		
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
