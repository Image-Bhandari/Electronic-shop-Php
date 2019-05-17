<?php
	require 'link.php';//includes the database file

	if(isset($_POST['submit'])){//when button is clicked

		$insert = "INSERT INTO tbl_users(email,password,gender,dob) 
										VALUES(:email, :password, :gender , :dob);";//inserting data to table
		$prp=$pdo->prepare($insert);//prepairing query
		$crypt=password_hash($_POST['password'],PASSWORD_DEFAULT);//hashing passwords
		$prp->bindValue(':password',$crypt);//encrypting passwords
		$prp->bindValue(':email',$_POST['email']);
		$prp->bindValue(':gender',$_POST['gender']);	//binding values 
		$prp->bindValue(':dob',$_POST['dob']);
		unset($_POST['cpassword']);
		$prp->execute();
		header('location:signIn.php');	//redirecting			
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
			<form method="POST" action="">  <!--USING POST METHOD, SECURE THAN GET-->
				<label>Email</label>
				<input type="Email" name="email">
				<label>PASSWORD</label>
				<input type="PASSWORD" name="password">
				<label> CONFIRM PASSWORD</label>
				<input type="PASSWORD" name="cpassword">
				<label> DATE OF BIRTH </label>
				<input type="date" name="dob">
				<label>MALE</label>
				<input type="radio" name="gender" value="M">
      			<label>FEMALE</label>
      			<input type="radio" name="gender" value="F">
				<input type="SUBMIT" name="submit" value="Sign In">

			</form>
			</main>
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
