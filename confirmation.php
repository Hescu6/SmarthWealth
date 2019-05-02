<?php/*
Final Code Smartwealth
*/
?>

<?php
   session_start();
	$username = $_SESSION["userName"];
?>

<?php
   $orderType = $_POST['orderType'];
   $quantity = $_POST['quantity'];
   $stock = $_POST['stock'];
?>
  
   
   


<?php
$connect = mysqli_connect("localhost","portfolio_cms", "psw", "portfoliodb");
            if (mysqli_connect_errno()) {
                die("Database connection failed" .
				mysqli_connect_error().
				" (".mysqli_connect_errno() . ")"
				);
			}
?>


<?php



$buyquery = "INSERT INTO transactions (id, stock, shares_bought, price_transaction, shares_sold)";
$buyquery .= "VALUES ((SELECT id FROM users WHERE name = '$username'),'$stock','$quantity',(SELECT price_real FROM price WHERE stock = '$stock'),NULL);";

$sellquery = "INSERT INTO transactions (id, stock, shares_bought, price_transaction, shares_sold)";
$sellquery .= "VALUES ((SELECT id FROM users WHERE name = '$username'),'$stock','$quantity'*-1,(SELECT price_real FROM price WHERE stock = '$stock'),NULL);";

?>

<?php

if (strcmp($orderType,"buy")== 0){
		$result = mysqli_query($connect, $buyquery);
	}else{
		$result = mysqli_query($connect, $sellquery);
	}
?>


<html>
    <head>
        <title><center>CONGRATULATIONS</center></title>
    </head>
    <body>
	
	<h1> <center><?php echo "$username" ?>, you was was filled. </center><br></h2>
	<center><a href="portfolio.php">Go Back to your Portfolio</a></center>
		
	
    </body>
</html>
<?php
mysqli_close($connect);
?>

