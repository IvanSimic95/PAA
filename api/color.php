<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

$errorDisplay = "";


isset($_POST['custom'])? $orderID               = $_POST['custom']          : $errorDisplay .= " Missing Order ID <br>";
isset($_POST['email']) ? $order_email           = $_POST['email']           : $errorDisplay .= " Missing Email <br>";
isset($_POST['first_name'])  ? $fname           = $_POST['first_name']      : $errorDisplay .= " Missing First Name <br>";
isset($_POST['last_name'])  ? $lname            = $_POST['last_name']       : $errorDisplay .= " Missing Last Name <br>";
isset($_POST['order_id'])  ? $DigiOrderID       = $_POST['order_id']        : $errorDisplay .= " Missing Digi24 Order ID <br>";
$rnumber = "1";
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

       
            $sql = "UPDATE `orders` SET `color`='$rnumber' WHERE order_id='$orderID'";
            $result5 = $conn->query($sql);
            if ($result5){


              if($push == 1){
                $pushTitle = "Color Upgrade for order #".$orderID;
                $pushMessage = "Price: $9.67";
              curl_setopt_array($ch = curl_init(), array(
                CURLOPT_URL => "https://api.pushover.net/1/messages.json",
                CURLOPT_POSTFIELDS => array(
                  "token" => "aayvxh42e8rfzhuxssiiwo7ko3pcej",
                  "user" => "u24izth113b2jc8jwt4g68vvzppk12",
                  "title" => $pushTitle,
                  "message" => $pushMessage,
                ),
                CURLOPT_SAFE_UPLOAD => true,
                CURLOPT_RETURNTRANSFER => true,
                ));
                curl_exec($ch);
                curl_close($ch);
              }

            echo "Order Color Added";
        }else{
            echo "There was an error";
        }


  }

}
