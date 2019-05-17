<!--This files includes the information about adding and deleting  the category-->
<?php
	require 'link.php';//includes the database file
	$cat_desc = $pdo->prepare("SELECT * FROM tbl_category");//selects the value from category table
	$cat_desc->execute($_GET);//execute the array passed 
	$cat = $cat_desc->fetch();//fetch the data


	if(isset($_POST['submit'])){//analyse the variable submit is set or not

		$insert = "INSERT INTO tbl_category(category_name) 
										VALUES(:category_name);";//insert the value in category table
		$prp=$pdo->prepare($insert);
		unset($_POST['submit']);//unset the variable submit
		$prp->execute($_POST);//execute the method which is invisible
				
					
	}
	if (isset($_GET['delc'])) {//analyse the variable delc and send data to the server
		$stmt = $pdo->prepare("DELETE FROM tbl_category WHERE category_id = :delc");//delete the category from the table
		if ($stmt->execute($_GET)) {//send the data to the server
			$_GET['msg'] = 'Category Deleted SuccessFully';
		}
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
			<h2>Category List</h2>
			<table border="2">
	<tr>
		<th>Category ID</th>
		<th>Category Name</th>
		<th> Action </th>
	</tr>
	<?php
		
		foreach ($cat_desc as $cat) {?><!--Loop through every key that are set-->
			<tr>
			<td><?php echo $cat['category_id'];?><!--displays the category id--></td>	
			<td><?php echo $cat['category_name'];?></td><!--displays the category name-->
			<td>
				<a href="category.php?delc=<?php echo $cat['category_id']?>">Delete</a>
				Or
				<a href="editCategory.php?edit=<?php echo $cat['category_id']?>">Edit</a>
			</td>
		</tr>
		
		<?php }?>
	
	</table>	

			<form method="POST" action="">
				<label>CATEGORY NAME </label>
				<input type="text" name="category_name">
				<input type="SUBMIT" name="submit" value="SUBMIT">

			</form>

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
