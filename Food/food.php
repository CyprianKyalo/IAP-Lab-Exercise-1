<?php
include_once 'util.php';
include_once 'connect.php';

class Food{
	protected $orderID;
	protected $fdname;
	protected $quantity;
	protected $price;

	function __construct($db){
		$this->conn = $db;
	}

	public function orders(){
		$query = "SELECT ordereditems.orderID, fooditems.foodname, ordereditems.Quantity, ordereditems.Price, orders.Status FROM foods.ordereditems INNER JOIN foods.fooditems ON ordereditems.foodID = fooditems.foodID INNER JOIN foods.orders ON ordereditems.orderID = orders.orderID ORDER BY orderID";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
}
?>