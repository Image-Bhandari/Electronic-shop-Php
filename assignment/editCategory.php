<!--This files includes the information about editing the category-->
<?php
	require 'link.php';//includes the database file

	if(isset($_POST['update'])){//checks the variable update is set or not
		$stmt = $pdo->prepare("UPDATE `tbl_category` SET `category_name` = :category_name WHERE `category_id` = :edit;");//update the category table using category id
    	unset($_POST['update']);//destroy the variable update
    	$_POST['edit']=$_GET['edit'];
    	$stmt->execute($_POST);//execute the passed value
    		if ($stmt->execute($_POST)) {//sends data to server which isnot visibles
    	 	header('location:category.php');
    }
  
  }
$ediit = $pdo->prepare("SELECT * FROM tbl_category WHERE category_id=:edit");//selects the category id from category table
$ediit->execute($_GET);//send the data to the server
$name_edit = $ediit->fetch();

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
				<form method="POST" action="">
				<label>CATEGORY NAME </label>
				<input type="text" name="category_name" value="<?php echo $name_edit['category_name']?>">
				<input type="SUBMIT" name="update" value="UPDATE">

			</form>
			

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
