<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>

<?php
include_once 'util.php';
include_once 'connect.php';
include_once 'food.php';

$database = new DBConnector();
$db = $database->connectToDB();

$ord = new Food($db);

$orders = $ord->orders();
?>

<h1 style="text-align: center; font-size: 40px;">Orders</h1>
<div class="users">
<table>
	<thead>
		<tr>
			<th>OrderID</th>
			<th>Food Name</th>
			<th>Quantity</th>
			<th>Total Price</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
			<?php 

			foreach ($orders as $key => $value) {
				?><tr>
					<td><?php echo $value["orderID"]?></td>
					<td><?php echo $value["foodname"]?></td>
					<td><?php echo $value["Quantity"]?></td>
					<td><?php echo $value["Price"]?></td>
					<td id="status"><?php echo $value["Status"]?></td>
				  </tr>
		<?php
			}
		?>
	</tbody>
</table>
</div>
</body>
</html>