<?php 	

require_once 'core.php';

$productId = $_POST['productId'];

$sql = "SELECT id, stock_name, quantity, unit, threshold, status FROM stock WHERE id = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);