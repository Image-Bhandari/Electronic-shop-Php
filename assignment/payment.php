<!--This files includes the information about payment method-->
<?php
	session_start();//starts the session
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){//check session
	require 'link.php';
	//selects the id from cart table
	$list_cart='SELECT * FROM tbl_cart WHERE user_id=:user_id';//send id which is not visible in the server
	$_POST['user_id']=$_SESSION['user_id'];//prepare to send the value
	$list=$pdo->prepare($list_cart);
	$list->execute($_POST);//execute the value


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
					foreach ($list as $row) {
						require 'link.php';
							//selects the id from product table
							$product_desc='SELECT * FROM tbl_products WHERE product_id='.$row['product_id'];
							$listP=$pdo->query($product_desc);
							//specify the query
							foreach ($listP as $item) {						
							echo '<li>'.'<h3>'.'Product ID:     '.$item['product_id'].'<br>'.'PRODUCT NAME      '.$item['product_name'].'</h3>'.'</li>';//display the product id and product name
							echo '<hr />';
						}}
				?>

			
		</ul>
		<br><br><br><br><br><br>
		<!--payment using paypal-->
		<!-- From: https://developer.paypal.com/docs/checkout/quick-start/-->
		<h3>PAYMENT OPTIONS: </h3>
		<div id="paypal-button-container"></div>
		<script src="https://www.paypalobjects.com/api/checkout.js"></script>
		<script>
            paypal.Button.render({//button for paypal
                env: 'sandbox',
                //defining the size
                style: {
                    layout: 'vertical',  
                    size:   'medium',    
                    shape:  'rect',      
                    color:  'gold'       
                },
                funding: {//choosing payment method
                    allowed: [
                        paypal.FUNDING.CARD,
                        paypal.FUNDING.CREDIT
                    ],
                    disallowed: []
                },
                commit: true,
                // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                client: {
                    sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                    production: '<insert production client id>'
                },

                payment: function (data, actions) {
                    return actions.payment.create({//create
                        payment: {
                            transactions: [//pay
                                {
                                    amount: {
                                        total: '0.01',
                                        currency: 'USD'
                                    }
                                },

                            ]
                        }
                    });
                },

                onAuthorize: function (data, actions) {//execute the action
                    return actions.payment.execute()
                        .then(function () {
                            window.alert('Payment Complete!');//message display
                        });
                }
            }, '#paypal-button-container');
        </script>
		</script>



		<h5>
		<a href="#">CASH ON DELIVERY</a><br>
		<a href="#">OTHER CREDIT OPTIONS</a><br></h5>
		</main>
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
