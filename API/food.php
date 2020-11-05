<?php
include_once 'util.php';
include_once 'db_connect.php';

class Food{
	private $conn;
	public $fdname;
	private $fdprice;
	public $quantity;


	function __construct($db){
		$this->conn = $db;
	}

	function order(){
		$query = "SELECT foodID, foodprice FROM foods.fooditems WHERE foodname = ?";
		$stmt = $this->conn->prepare($query);

		if($stmt->execute([$this->fdname])){
			$data = $stmt->fetch();
			$fdprice = $data['foodprice'];
			$fdID = $data['foodID'];
		}else{
			echo "No such food";
		}
		



		$sql = "INSERT INTO foods.orders (UserID, Address, ContactNo, Bill, DateOfOrder, Status) VALUES ('9', 'Address', '09876567', '200', CURRENT_TIMESTAMP, 'Active')";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$res = "SELECT orderID FROM foods.orders WHERE UserID = '9' && DateOfOrder = CURRENT_TIMESTAMP";
		$stmt = $this->conn->prepare($res);
		$stmt->execute();
		$data = $stmt->fetch();
		$orderID = $data['orderID'];

		$query = "INSERT INTO foods.ordereditems (orderID, foodID, Quantity, Price) VALUES (?, ?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam('1', $orderID);
		$stmt->bindParam('2', $fdID);
		$price = ($this->quantity * $fdprice);
		$stmt->bindParam('3', $this->quantity);
		$stmt->bindParam('4', $price);


		/*$query = "INSERT INTO iap_app.orders(orderID, fdname, quantity, cost) VALUES(?, ?, ?, ?)";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam('1', $this->orderID);
		$stmt->bindParam('2', $this->fdname);
		$stmt->bindParam('3', $this->quantity);
		$stmt->bindParam('4', $this->cost);*/

		if($stmt->execute()){
			$query = "SELECT ordereditems.orderID, ordereditems.Price FROM foods.ordereditems INNER JOIN foods.orders ON ordereditems.orderID = orders.orderID WHERE orders.DateOfOrder = CURRENT_TIMESTAMP";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

		//Print error if sth goes wrong
		printf("Error: %s.\n", $stmt->error);

		return false;
	}
}

?>