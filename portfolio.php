<?php/*
Final Code Smartwealth
*/
?>

<?php
session_start();
$_SESSION["userName"] = "Shakir";
$username = $_SESSION["userName"];
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

$query = "SELECT price.*, sum(CASE WHEN users.name = '$username' ";
$query .="THEN transactions.shares_bought ELSE 0 END) AS shares, ";
$query .="ROUND(SUM(CASE WHEN users.name= '$username' THEN (transactions.price_transaction* transactions.shares_bought) ELSE 0 END)/ SUM( CASE WHEN users.name= '$username' THEN transactions.shares_bought ELSE 0 END),2) AS price";
$query .=" FROM price LEFT OUTER JOIN transactions ON transactions.stock = price.stock";
$query .=" LEFT OUTER JOIN users ON users.id = transactions.id GROUP BY stock;";

$result = mysqli_query($connect, $query);


$performquery = "SELECT ROUND(users.buying_power - sum(transactions.shares_bought * price_transaction),2)+ ROUND(sum(transactions.shares_bought * transactions.price_transaction),2) AS Pval,";
$performquery .="ROUND(users.buying_power - sum(transactions.shares_bought * price_transaction),2) AS buypwr ";
$performquery .=",ROUND(sum(transactions.shares_bought * transactions.price_transaction),2) AS stkVal, ";
$performquery .="((users.buying_power - SUM(transactions.shares_bought * price_transaction))+SUM((transactions.shares_bought * transactions.price_transaction))) - users.initial_buypower AS gains,";
$performquery .="((((users.buying_power - SUM(transactions.shares_bought * price_transaction))+SUM((transactions.shares_bought * transactions.price_transaction))) - users.initial_buypower)* 100)/initial_buypower as gainsavg ";
$performquery .="FROM users LEFT OUTER JOIN transactions ON users.id = transactions.id WHERE users.name ='$username'";

$perform = mysqli_query($connect, $performquery);

if (!$result){
	die("database query failed.");
	}
	
	
?>

<html>
    <head>
        <title>Portfolio</title>
    </head>
    <body>
	
	<h2> <?php echo "$username" ?>'s Portfolio </h2>
		
	<h3> Performance </h3>
    
	<table>
        <thead>		
            <tr>
                <td><b>Portfolio Value</b></td>
                <td><b>Buying Power</b></td>
				<td><b>Market Value</b></td>
				<td><b>Gain Loss</b></td>
				
				
            </tr>
			
	
	
	<?php
            while($row = mysqli_fetch_assoc($perform)) {
            ?>
                <tr>
				
                    <td><center><?php echo $row["Pval"]?></center></td>
                    <td><center><?php echo $row["buypwr"]?></center></td>
					<td><center><?php echo $row["stkVal"]?></center></td>
					<td><center>$<?php echo $row["gains"]?> ~ %<?php echo $row["gainsavg"]?></center></td>
					<td>
					
					</td>
                </tr>

            <?php
            }
            ?>
	
	
    <table>
	<h3> Positions </h3>
        <thead>		
            <tr>
                <td><b>Stock</b></td>
                <td><b>Current Price</b></td>
				<td><b>Position</b></td>
				<td><b>Action</b></td>
				
				
            </tr>
			
	
	
	<?php
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
				
                    <td><center><?php echo $row["stock"]?></center></td>
                    <td><center><?php echo $row["price_real"]?></center></td>
					<td><center><?php echo $row["shares"]?> @ <?php echo $row["price"]?></center></td>
					<td>
					
					<form action="transaction.php" method="post">
						<input type="hidden" name="stock" value= "<?php echo $row["stock"]?>"/>
						<input type="submit" value="Buy/Sell" />
					</form>
					
					
					</td>
                </tr>

            <?php
            }
            ?>
        </thead>
        <tbody>
            </tbody>
            </table>
    </body>
</html>
<?php
mysqli_close($connect);
?>
