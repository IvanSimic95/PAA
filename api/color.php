<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/templates/config.php';

$errorDisplay = "";


isset($_POST['custom'])? $orderID               = $_POST['custom']          : $errorDisplay .= " Missing Order ID <br>";
isset($_POST['order_id'])  ? $DigiOrderID       = $_POST['order_id']        : $errorDisplay .= " Missing Digi24 Order ID <br>";
$rnumber = "1";
empty($errorDisplay) ?  $testError = FALSE : $testError = TRUE;
if($testError == TRUE){
echo $errorDisplay;
}else{

  //Find Correct Order
  $sql = "SELECT * FROM `orders` WHERE `order_id` = '$orderID' ORDER BY  `order_id` DESC LIMIT 1";
  $result = $conn->query($sql);
  $count = $result->num_rows;

  //If order is found input data from BG and update status to paid
  if($result->num_rows != 0) {
    
    $row = $result->fetch_assoc();
    $orderStatus = $row['order_status'];
    $userID = $row['user_id'];

       
            $sql = "UPDATE `orders` SET `color`='$rnumber' WHERE order_id='$orderID'";
            $result5 = $conn->query($sql);
            if ($result5){




            echo "Order Color Added";
        }else{
            echo "There was an error";
        }


  }

}
