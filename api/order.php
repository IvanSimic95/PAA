<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

$errorDisplay = "";


isset($_POST['custom'])? $orderID               = $_POST['custom']          : $errorDisplay .= " Missing Order ID <br>";
isset($_POST['email']) ? $order_email           = $_POST['email']           : $errorDisplay .= " Missing Email <br>";
isset($_POST['first_name'])  ? $fname           = $_POST['first_name']      : $errorDisplay .= " Missing First Name <br>";
isset($_POST['last_name'])  ? $lname            = $_POST['last_name']       : $errorDisplay .= " Missing Last Name <br>";
isset($_POST['order_id'])  ? $DigiOrderID       = $_POST['order_id']        : $errorDisplay .= " Missing Digi24 Order ID <br>";
isset($_POST['zipcode'])  ? $zip                    = $_POST['zipcode']             : $errorDisplay .= " Missing ZIP <br>";
isset($_POST['country_code'])  ? $country                   = $_POST['country_code']             : $errorDisplay .= " Missing Country <br>";

empty($errorDisplay) ?  $testError = FALSE : $testError = TRUE;
if($testError == TRUE){
echo $errorDisplay;
}else{
$name = $fname." ".$lname;

  //Find Correct Order
  $sql = "SELECT * FROM `orders` WHERE `order_id` = '$orderID' ORDER BY  `order_id` DESC LIMIT 1";
  $result = $conn->query($sql);
  $count = $result->num_rows;

  //If order is found input data from BG and update status to paid
  if($result->num_rows != 0) {
    
    $row = $result->fetch_assoc();
    $orderStatus = $row['order_status'];
    $userID = $row['user_id'];

        if($orderStatus=="pending" OR $orderStatus=="paid"){
            $sql = "UPDATE `orders` SET `order_email`='$order_email', `buygoods_order_id`='$DigiOrderID', `order_status`='paid', `zip`='$zip', `country`='$country' WHERE order_id='$orderID'";
            $result = $conn->query($sql);



            echo "Order Status is updated to Paid! <br>";
            echo "Additional order data is saved!";
        }else{
            echo "Order Status is already: ".$orderStatus;
            echo "<br> No Changes were made to order data.";
        }


  }

}