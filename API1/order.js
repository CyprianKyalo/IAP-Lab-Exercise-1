/*<?php
include_once '../util.php';
include_once '../db_connect.php';
$con = new DBConnect;
$pdo = $con->connectToDB();

class Order{
	protected $conn;
	protected $food_name;
	protected $quan;
	protected $cost;
	protected $foodID;

	function __construct($db){
		$this->conn = $db;
	}

	function Order($pdo){
		$query = "SELECT foodID FROM fooditem WHERE foodname = ?";
		$stmt = $this->conn->prepare();
		$stmt->execute();
		$data = $stmt->fetch();
		$foodID = $data['foodID'];

		$query = "INSERT INTO orders (foodID, quantity) VALUES (?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam('1', $foodID);
		$stmt->bindParam('2', $quan);
 
		$stmt->execute();
	}
}
?>*/

	$('#order-submit-btn').click(function(event){
		event.preventDefault();

		var name_of_food = $('#food-name').val();
		var no_of_units = $('#no-of-units').val();



		alert("This feature is coming soon");
		return;
		//construct and send an HTTP POST request, url, body, header(custom), method
		$.ajax({
			url: "api.foodapi.com/order",
			type: "post",
			header:{
				"api-key" : "DFBNuyertyulkhglmn"
			},
			data:{
				"name_of_food": name_of_food,
				"no_of_units": no_of_units
			},
			success: function(data){
				//process the data
			},
			error: function(error){
				alert("An error occurred");
			}
		});
	});