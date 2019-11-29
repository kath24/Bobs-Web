<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Bob's Auto parts</h1>
    <h2>Order Results</h2>
<?php
 echo "<p>Order processed at ".date('H:i, jS F Y')."<br />";
 // create short variable names

$find = $_POST['find'];

if ($find == "a") {
	echo "<p>Regular customer.</p>";
} elseif ($find == "b") {
	echo "<p>Customer referred by TV advert.</p>";
} elseif ($find == "c") {
	echo "<p>Customer referred by phone directory.</p>";
} elseif ($find == "d") {
	echo "<p>Customer referred by word of mouth.</p>";
} else {
	echo "<p>We do not know this customer found us.<p>";
}
?>
<?php
 // create short variable names
 $tireqty = $_POST['tireqty'];
 $oilqty = $_POST['oilqty'];
 $sparkqty = $_POST['sparksqty'];


 ?>
 
<form action="ordersummary.php" method="post">
    <table style="border: 0px;">
     <tr style="background:pink;">
     <td style="width: 150px; text-align: center;">Item</td>
     <td style="width: 15px; text-align: center;">Quantity</td>
     
    </tr>
    <tr>
        <td>Tires</td>
        <td><?php echo $_POST['tireqty'];?></td>
        
    </tr>
    <tr>
        <td>Oil</td>
        <td><? echo $_POST['oilqty'];?></td>
        
    </tr>
    <tr>
        <td>Sparks Plugs</td>
        <td><?  echo $_POST['sparksqty'];?></td>
        
    </tr>
	
  </table>
<?php
    $totalqty = 0;
    $totalqty =  $tireqty +  $oilqty +  $sparkqty;
    echo "<p>Total Quantity ".$totalqty."<br />";
    $totalamount = 0.00;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);


$totalamount = $tireqty * TIREPRICE
+ $oilqty * OILPRICE
+ $sparkqty * SPARKPRICE;
echo "Subtotal $".number_format($totalamount,2)."<br />";

$taxrate = 0.10; // local sales tax is 10%
$totalamount = $totalamount * (1 + $taxrate);
echo "Total including tax $".number_format($totalamount,2)."<br />";
$discount = $totalamount * .10;
$dis = $totalamount - $discount;
echo "Dsicount 10% $".number_format($discount,2)."<br />";

$totalamount = $tireqty * TIREPRICE
+ $oilqty * OILPRICE
+ $sparkqty * SPARKPRICE
- $discount; 
echo "Total amount $".number_format($totalamount,2)."<br />";
?>


</form>
</body>
</html>
