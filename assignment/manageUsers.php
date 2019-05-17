<!--This files includes the information about managing the user-->
<?php

	require 'link.php';//includes the database file
	$userD='SELECT * FROM tbl_users';
	$user_details=$pdo->query($userD);
	$adminD='SELECT * FROM tbl_admin_users';
	$admin_details=$pdo->query($adminD);

	if (isset($_GET['deid'])) {
		$stmt = $pdo->prepare("DELETE FROM tbl_users WHERE user_id = :deid");
		if ($stmt->execute($_GET)) {
			$_GET['msg'] = 'User Deleted SuccessFully';
		}
	}

	if(isset($_GET['cuid'])){//checks the variable cuid and send it the server
		$insert = "INSERT INTO tbl_admin_users(user_id,email,password,gender,dob)
		SELECT user_id, email,password,gender,dob FROM tbl_users WHERE user_id = :cuid";//inserts the value ina dmin table
		$prp=$pdo->prepare($insert);
		$prp->execute($_GET);//execute and send the data to the server
		$stmt = $pdo->prepare("DELETE FROM tbl_users WHERE user_id = :cuid");//delete the user from table
		if ($stmt->execute($_GET)) {
			$_GET['msg'] = 'User Deleted SuccessFully';//display the message
	}}

	if (isset($_GET['delad'])) {//anaylse the variable delad is set or not
		$stmt = $pdo->prepare("DELETE FROM tbl_admin_users WHERE admin_id = :delad");//delete the admin
		if ($stmt->execute($_GET)) {
			$_GET['msg'] = 'Admin Deleted SuccessFully';
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


			

			<address>
				<p>We are open 9-5, 7 days a week. Call us on
					<strong>01604 11111</strong>
				</p>
			</address>



		</header>
		<section></section>
		<main>
			<h1>Welcome to Ed's Electronics</h1>
			<ul class ="products">
				<li><h3>Note:</h3></li>
				<li><h5><p> Here are the list of current users with their logins. <u>By clicking on Edit you can edit the details, clicking on delete you may delete the account of any user and by clicking on make admin, you may give the rights of admin to the user.</u> </p>
			</h5></li></ul>

			<h2>ADMIN LIST</h2>
			<table border="2">
	<tr>
		<th>Admin id</th>
		<th>User id</th>
		<th>Email</th>
		<th>Password</th>
		<th>Gender</th>
		<th>D.O.B</th>
		<th>Action</th>
	</tr>
	<?php
		
		foreach ($admin_details as $admins) {?>
			<tr>
				<!--Displays the selected column-->
			<td><?php echo $admins['admin_id'];?></td>	
			<td><?php echo $admins['user_id'];?></td>
			<td><?php echo $admins['email'];?></td>
			<td><?php echo $admins['password'];?></td>
			<td><?php echo $admins['gender'];?></td>
			<td><?php echo $admins['dob'];?></td>
			<td>
				<a href="manageUsers.php?delad=<?php echo $admins['admin_id']?>">Delete</a>
			</td>
		</tr>
		
		<?php }?>
	
	</table>
				
				<h2>USER LIST</h2>
			<table border="2">
	<tr>
		<th>User id</th>
		<th>Email</th>
		<th>Password</th>
		<th>Gender</th>
		<th>D.O.B</th>
		<th>Action</th>
	</tr>
	<?php
	
		foreach ($user_details as $users) {?>
			<tr>
				<!--display the specified column-->
			<td><?php echo $users['user_id'];?></td>
			<td><?php echo $users['email'];?></td>
			<td><?php echo $users['password'];?></td>
			<td><?php echo $users['gender'];?></td>
			<td><?php echo $users['dob'];?></td>
			<td>
				<a href="manageUsers.php?deid=<?php echo $users['user_id']?>">Delete</a><!--Deleting a user-->
				OR
				<a href="manageUsers.php?cuid=<?php echo $users['user_id']?>">MakeAdmin</a> <!--OPtion for making an user admin-->


			</td>
		</tr>
		
		<?php }?>
	
</table>
			
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
