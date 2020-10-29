<?php 
include_once './db_connect.php';
include_once './userAccount.php';
//session_start();

    $con = new DBConnector();
	$pdo = $con->connnectToDB();

    $account = new Account();
    $account->logout($pdo);
    header("Location: Login.php");

?>