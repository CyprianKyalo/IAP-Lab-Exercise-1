<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once 'util.php';
include_once 'db_connect.php';
include_once 'food.php';

//Instantiate DB & connect
$database = new DBConnector();
$db = $database->connectToDB();

$ord = new Food($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$ord->fdname = $data->fdname;
$ord->quantity = $data->quantity;


$result = $ord->order();
$num = $result->rowCount();

if($num > 0){
	$orders = array();
	$orders['data'] = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$ordered_item = array(
			'OrderID' => $orderID,
			'Total Cost' => $Price
		);

		array_push($orders['data'], $ordered_item);
	}
	echo json_encode($orders);
}else{
	echo json_encode(	
		array('message' => 'No Order Created')
	);
}

?>