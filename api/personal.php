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
    $userID = $row['user_id'];
    $p = "personal";

    $sql44 = "SELECT * FROM `orders` WHERE `user_id` = '$userID' AND `order_product` = '$p' ORDER BY  `order_id` DESC LIMIT 1";
    $result44 = $conn->query($sql44);

    if($result44->num_rows != 0) { //Order Already Exists
        $pstatus = "paid";
        $sql55 = "UPDATE `orders` SET `order_status`='$pstatus' WHERE order_id='$orderID'";
        $result55 = $conn->query($sql55);
        if ($result55){
            echo "Existing Personal Psychic order updated";
        }else{
            echo "error updating existing Personal Psychic order";
        }
    }else{
    //Fetch User Data
    $sql22 = "SELECT * FROM `users` WHERE `id` = '$userID'";
    $result22 = $conn->query($sql22);
    $row22 = $result22->fetch_assoc();

    $user_age = $row22['age'];
    $fName = $row22['first_name'];
    $lName = $row22['last_name'];
    $user_name = $row22['full_name'];
    $user_birthday = $row22['dob'];
    $oStatus = "paid";
    $order_date = date('Y-m-d H:i:s');
    $user_email = $row22['email'];
    $order_product = "personal";
    $order_product_nice = "Personal Psychic Reading";
    $order_priority = "24";
    $cbprice = "23";
    $userGender = $row22['gender'];
    $userGenderAcc =$row22['genderAcc'];
    $partnerGender = $row22['partner_gender'];

    //Create new order
    $sql33 = "INSERT INTO orders (user_id, user_age, first_name, last_name, user_name, birthday, order_status, order_date, order_email, order_product, order_product_nice, order_priority, order_price, buygoods_order_id, user_sex, genderAcc, pick_sex) 
                        VALUES ('$userID', '$user_age', '$fName', '$lName', '$user_name', '$user_birthday', '$oStatus', '$order_date', '$user_email', '$order_product', '$order_product_nice', '$order_priority', '$cbprice', '', '$userGender', '$userGenderAcc', '$partnerGender')";

    if(mysqli_query($conn,$sql33)){
        echo "Personal Psychic Order Created";
    }else{
        echo "error creating new Personal Psychic order";
    }
    }

  }

}
