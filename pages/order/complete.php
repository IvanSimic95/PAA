<?php


if(isset($_GET['user_ID'])){
  include_once $_SERVER['DOCUMENT_ROOT'].'/pages/order/complete-info.php';
}else{



if(isset($_SESSION['orderID'])){
$orderID = $_SESSION['orderID'];

if(isset($_SESSION['userID'])){
  $userID = $_SESSION['userID'];
  }else{ 
  $sqlU = "SELECT * FROM `orders` WHERE `order_id` = $orderID";
  $resultU = $conn->query($sqlU);
    if($resultU->num_rows == 0) {
        $errorDisplay .= " User ID Not Found /";
        $logArray[] = "User ID Not Found";
     }else{
        $row = $resultU->fetch_assoc();
        $userID = $row["user_id"];
        $logArray[] = "User ID found using Order ID";
    }
  }
}else{
  include_once $_SERVER['DOCUMENT_ROOT'].'/pages/order/complete-user.php';
}

}

?>