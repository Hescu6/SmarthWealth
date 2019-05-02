<?php/*

Final Code Smartwealth
*/
?>
<?php
   session_start();
   $username = $_SESSION["userName"];
?>

<?php
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




<html>
<body>
<title>Sell/Buy 
	<?php
		echo "$stock";
	?>
	</title>

  <form action="confirmation.php" method="post">
    <table border="0">
      <tr>
        <td width="30"> <?php echo "$stock" ?></td>
        <td width="5">
		
		
		
		</td>
</script>
      </tr>   
       <tr>
        <td> Order Type </td>
        <td>		  
		<input type="radio" name="orderType" value="buy" checked> Buy<br>
		<input type="radio" name="orderType" value="sell"> Sell<br><br>   
		<input type="hidden" name="stock" value= "<?php echo "$stock"?>"/>		
      </td>
    </tr>
	
	<tr>
        <td> Quantity </td>
        <td>  
		  <input type="text" name="quantity"><br><br>
      </td>
    </tr>
	
    <tr>
      <td colspan="2" align="center"><input type="submit" value="Submit Order"></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php
mysqli_close($connect);
?>