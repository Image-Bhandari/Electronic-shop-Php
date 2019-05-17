<?php
	require 'link.php';//includes the database link
	//selects the specified table and select the query
	$list_users='SELECT * FROM tbl_users';
	$list=$pdo->query($list_users);

	$list_admins='SELECT * FROM tbl_admin_users';
	$listAD=$pdo->query($list_admins);

	if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['submit'])){ //as the submit button is pressed.
		foreach ($listAD as $item) { //for each arrays that are contained in listAd identified by variable items
		if($_POST['email'] === $item['email'] &&( password_verify($_POST['password'],$item['password']))) {//checking if the details are of admin
			    session_start();//starting a session of user if details are true
				$_SESSION['loggedin']=true; // session boolean as true
				$_SESSION['type']='admin';
				$_SESSION['user_id']=$item['user_id'];
				header('location:indexAdmin.php'); // redirecting to admin page
				}
				else{
					foreach ($list as $item) {//checking if the details are of user accounts.
					if($_POST['email'] === $item['email'] && (password_verify($_POST['password'],$item['password']))) {
			    	session_start();
					$_SESSION['loggedin']=true;
					$_SESSION['type']='user';
					$_SESSION['user_id']=$item['user_id'];
				header('location:userIndex.php');//redirecting to user index page. 
				}
			}	

			}
		}	
		}}	
		else{
			session_unset();
			
			echo 'Sorry, Wrong Details.';
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
			<form method="post" action="">
				<label>E-MAIL</label>
				<input type="text" name="email">
				<label>PASSWORD</label>
				<input type="PASSWORD" name="password">
				<input type="SUBMIT" name="submit" value="Sign In">
				
			</form>
			<label><a href="signUp.php">Don't Have An Account? ... Click here</a></label>
			
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
