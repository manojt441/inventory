<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$stockName 		= $_POST['stockName'];
  // $productImage 	= $_POST['productImage'];
  $quantity 			= $_POST['quantity'];
  $unit 					= $_POST['unit'];
  $threshold 			= $_POST['threshold'];

	
				
    $sql = "INSERT INTO stock (stock_name, quantity, unit, threshold, status) 
    VALUES ('$stockName', '$quantity', '$unit', '$threshold', 1)";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Added";	
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while adding the members";
    }	

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST