<?php
$sPage = $_SESSION['funnel_page'];
$pixelActive = 0;

//START - Logging Variables //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$logArray = array();
$createUser = $errorDisplay = $cookie = $getcountdown = $getformused = $user_name = $user_email = $user_dob = $order_product = $ttt = "";
$logArray['0'] = "ORDER-CREATION";
$logArray['1'] = date("d-m-Y H:i:s");
$logArray['2'] = $_SERVER['REMOTE_ADDR'];
$logArray['3'] = $_SERVER['REQUEST_URI'];
//END - Logging Variables ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//START - Check if all required variables are present ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
isset($_POST['userName'])    ? $user_name=$_POST['userName']     : $errorDisplay .= " Missing User Name /";
isset($_POST['userEmail'])   ? $user_email=$_POST['userEmail']    : $errorDisplay .= " Missing User Email /";

isset($_POST['userDob']) OR isset($_POST['userDobUS']) OR isset($_POST['dob_day']) ? $dob = "Yes"   : $errorDisplay .= " Missing User Date of Birth (Both US and EU Fields) /";
if(isset($_POST['userDob']))$user_dob = $_POST['userDob'];

if(isset($_POST['userDobUS'])){
$originalDate = $_POST['userDobUS'];
$user_dob = date("Y-m-d", strtotime($originalDate));
}

if(isset($_POST['dob_day'])){
$user_dob = $_POST['dob_day']."-".$_POST['dob_month']."-".$_POST['dob_year'];
$user_dob = $_POST['dob_year']."-".$_POST['dob_month']."-".$_POST['dob_day'];
}

isset($_POST['product'])  ? $order_product = $_POST['product']   : $errorDisplay .= " Missing Product ID /";
isset($_POST['priority']) ? $order_priority = $_POST['priority'] : $order_priority = "48";

isset($_POST['cookie_id1']) ? $cookie_id1 = $_POST['cookie_id1'] : $errorDisplay .= " Missing User Cookie ID 1 /";
isset($_POST['cookie_id2']) ? $cookie_id2 = $_POST['cookie_id2'] : $errorDisplay .= " Missing User Cookie ID 2 /";
isset($_POST['cookie_id3']) ? $cookie_id3 = $_POST['cookie_id3'] : $errorDisplay .= " Missing User Cookie ID 3 /";
isset($_POST['landingpage']) ? $landing = $_POST['landingpage'] : $errorDisplay .= " Missing Landing Page ID /";

isset($_POST['countdown']) ? $getcountdown = $_POST['countdown'] : $errorDisplay .= " Missing Countdown Variable /";
isset($_POST['formused']) ? $getformused = $_POST['formused'] : $errorDisplay .= " Missing FormUsed ID /";
isset($_POST['btncolor']) ? $fbtncolor = $_POST['btncolor'] : $errorDisplay .= " Missing Button Color /";

isset($_POST['form_submit']) ? $getButtonText = $_POST['btntext'] : $getButtonText = "Place an order";

isset($_POST['fbp']) ? $uFBP = $_POST['fbp'] : $uFBP = "";
isset($_POST['fbc']) ? $uFBC = $_POST['fbc'] : $uFBC = "";

isset($_POST['ip']) ? $addip = $_POST['ip'] : $addip = "";
isset($_POST['agent']) ? $addagent = $_POST['agent'] : $addagent = "";

isset($_POST['affid']) ? $affid = $_POST['affid'] : $affid = "";
isset($_POST['cid']) ? $cid = $_POST['cid'] : $cid = "";

isset($_POST['subid1']) ? $subid1 = $_POST['subid1'] : $subid1 = "";
isset($_POST['subid2']) ? $subid2 = $_POST['subid2'] : $subid2 = "";

$order_date = date('Y-m-d H:i:s');
$partnerGender = "male";

$cookiecombo = $cookie_id1."|".$cookie_id2."|".$cookie_id3;
$cookiec = base64_encode($cookiecombo);

$today = date("d-m-Y");
$diff = date_diff(date_create($user_dob), date_create($today));
$user_age = $diff->format('%Y');
//END - Check if all required variables are present ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

empty($errorDisplay) ?  $testError = FALSE : $testError = TRUE;
if($testError == TRUE){ //IF there was error recoreded fetching main variables show error page
    $title = "Error: Can't create your Order";
    $titlePage = "Can't create your Order";
    $sdescription = $errorDisplay;
    $logArray['0'] = "ORDER-ERROR";
    $errorID  = md5($errorDisplay.$order_date);
    $logArray['4'] = $errorID;
    $logArray['5'] = $errorDisplay;
    $logArray['6'] = $user_name." - ".$user_email." - ".$user_dob." - ".$order_product;
    include $_SERVER['DOCUMENT_ROOT'].'/templates/error/error-log.php';
    SuperLog($logArray, "error");
}else{ //IF there was NO error recoreded fetching main variables save to DB and redirect to payment page
    $_SESSION['funnel_page'] = "success";
    $title = "Redirecting you to payment page...";

    $titlePage = "Redirecting you...";
    $sdescription = "You are being redirected to the Payment Processor.";
    $logArray['0'] = "ORDER-CREATION";
    $logArray['1'] = $cookie_id1;
    $logArray['2'] = $user_name;
    $logArray['3'] = $user_email;
    $logArray['4'] = $user_dob;
    $logArray['5'] = $order_priority;

    $order_product_id = $order_product;
    $product_codename = $order_product;
    switch ($order_product_id) {
    case "1":
    $order_product = "soulmate";
    $order_product_nice = "Soulmate Drawing & Reading";
    
                switch ($order_priority){
                    case "48":
                    $cbproduct = "542328";
                    $order_price = "29.99";
                    break;
                
                    case "24":
                    $cbproduct = "542789";
                    $order_price = "39.99";
                    break;
                
                    case "12":
                    $cbproduct = "542800";
                    $order_price = "49.99";
                    break;
                }
    break;
    
    case "2":
    $product = "twinflame";
    $order_product_nice = "Twin Flame Drawing & Reading";

    switch ($order_priority){
        case "48":
        $cbproduct = "548549";
        $order_price = "29.99";
        break;
    
        case "24":
        $cbproduct = "548606";
        $order_price = "39.99";
        break;
    
        case "12":
        $cbproduct = "548820";
        $order_price = "49.99";
        break;
    }

    break;
    
    case "3":
    $product = "futurespouse";
    $order_product_nice = "Future Spouse Drawing & Reading";

    switch ($order_priority){
        case "48":
        $cbproduct = "548821";
        $order_price = "29.99";
        break;
    
        case "24":
        $cbproduct = "548822";
        $order_price = "39.99";
        break;
    
        case "12":
        $cbproduct = "548823";
        $order_price = "49.99";
        break;
    }
    break;


    
    case "4":
    $product = "past";
    $order_product_nice = "Past Life Drawing & Reading";

    switch ($order_priority){
        case "48":
        $cbproduct = "549268";
        $order_price = "29.99";
        break;
    
        case "24":
        $cbproduct = "549269";
        $order_price = "39.99";
        break;
    
        case "12":
        $cbproduct = "549271";
        $order_price = "49.99";
        break;
    }
    break;
    }
    $logArray['7'] = $order_product;

    //Full name -> First and Last Name
    $parser = new TheIconic\NameParser\Parser();
    $name = $parser->parse($user_name);

    $fName = $name->getFirstname();
    $lName = $name->getLastname();


    //Find User Gender
    function findGender($name) {
    $apiKey = 'Whc29bSnvP3zrQG3hYCwXKMoYu5h4ZQukS6n'; //Your API Key
    $getGender = json_decode(file_get_contents('https://gender-api.com/get?key=' . $apiKey . '&name=' . urlencode($name)));
    $data = [[
        "gender" => $getGender->gender,
        "accuracy"  => $getGender->accuracy
        ]];
    return $data;
    }

    
    $findGenderFunc = findGender($fName);
    $userGender = $findGenderFunc['0']['gender'];
    $userGenderAcc = $findGenderFunc['0']['accuracy'];

    if($userGender=="male"){$partnerGender = "female";}
    if($userGender=="female"){$partnerGender = "male";}

    $order_date = date('Y-m-d H:i:s');

    //$baseRedirect = base64_encode("https://".$domain."/offer/personal-reading");
    $baseRedirect = base64_encode("https://".$domain."/order/success/main");

    $fbCampaign = $_SESSION['fbCampaign'];
    $fbAdset = $_SESSION['fbAdset'];
    $fbAd = $_SESSION['fbAd'];

    $signedUpAt = time();

    $sql5 = "SELECT * FROM users WHERE email = '".$user_email."'";
    $result5 = $conn->query($sql5);
    if ($result5){
        $row5 = mysqli_num_rows($result5);
            if ($row5 > 0){
                $createUser = 0;
                $row2 = $result5->fetch_assoc();
                $userID = $row2['id'];
                $logArray['9'] = "Existed: ".$userID;
            }else{
                $createUser = 1;
            }
    }

    if($createUser == 1){
        $sql65 = "INSERT INTO users (first_name, last_name, full_name, email, age, dob, gender, partner_gender, affid, clickid)
        VALUES ('$fName', '$lName', '$user_name', '$user_email', '$user_age', '$user_dob', '$userGender','$partnerGender', '$affID', '$clickID')";

        
        if ($conn->query($sql65) === TRUE) {
            $userID = mysqli_insert_id($conn);
            $logArray['9'] = "Created: ".$userID;
        } else {
                /*** * 
         * 
         *@var $sql65 $sql65 
         */
            $logArray['9'] = "Error: " . $sql65->error . "<br>" . $conn->error;; 
        }
        

    }
    
    $sql = "INSERT INTO orders (cookie_id, user_id, user_age, birthday, first_name, last_name, user_name, order_status, order_date, order_email, bg_email, order_product, product_codename, product_nice, order_priority, order_price, buygoods_order_id, user_sex, genderAcc, pick_sex, landing_page, form, countdown, button, btncolor, fbp, fbc, ip, agent, affid, clickid, fbCampaign, fbAdset, fbAd)
            VALUES ('$cookie_id1', '$userID', '$user_age', '$user_dob', '$fName', '$lName', '$user_name', 'pending', '$order_date', '$user_email', '', '$order_product', '$product_codename', '$order_product_nice', '$order_priority', '$order_price', '', '$userGender', '$userGenderAcc', '$partnerGender', '$landing', '$getformused', '$getcountdown', '$getButtonText', '$fbtncolor', '$uFBP', '$uFBC', '$addip', '$addagent', '$affid', '$cid', '$fbCampaign', '$fbAdset', '$fbAd')";

    if ($conn->query($sql) === TRUE) {
    $logArray['10'] = "Success"; 
    } else {
    $logArray['10'] = "Error: " . $sql . "<br>" . $conn->error;; 
    }

    $lastRowInsert = mysqli_insert_id($conn);
$subidfull5 = $lastRowInsert."|".$domain."|".$cookie_id1."|".$cookie_id2."|".$cookie_id3;
$subid5 = base64_encode($subidfull5);

    //Save data to orders log
    $sql2 = "INSERT INTO orders_log (user_id, order_id, time, notice) VALUES ('$userID', '$lastRowInsert', '$order_date', 'Order Created!')";
    if ($conn->query($sql2) === TRUE) {
        $logArray['11'] = "Success"; 
    }else {
                   /*** * 
         * 
         *@var $sql2 $sql2 
         */
        $logArray['11'] = "Error: " . $sql2->error . "<br>" . $conn->error;
    }

    #$finalLink = 'https://www.buygoods.com/secure/checkout.html?account_id=6490&screen=checkout_clean&product_codename='.$order_product_id.$order_priority.'&subid='.$cookiec.'&subid2='.$lastRowInsert.'&subid3='.$order_product.'&subid4='.$uFBP.'&subid5='.$uFBC.'&external_order_id='.$lastRowInsert.'&redirect='.$baseRedirect;
    

    $finalLink = "https://partist1.pay.clickbank.net/?cbitems=".$cbproduct."&name=".$user_name."&email=".$user_email."&cookie_ID=".$cookie_id1."&order_ID=".$lastRowInsert."&main_ID=".$lastRowInsert."&user_ID=".$userID."&encdata=".$cookiec;
    $finalLink = "https://www.checkout-ds24.com/product/".$cbproduct."?custom=".$lastRowInsert."&email=".$user_email."&first_name=".$fName."&last_name=".$lName;
    # $finalLink = "https://partistaff_partist1.pay.clickbank.net/?cbskin=39040&cbtimer=1593&cbfid=52316&cbitems=".$cbproduct."&name=".$user_name."&email=".$user_email."&cookie_ID=".$cookie_id."&order_ID=".$lastRowInsert."&main_ID=".$lastRowInsert."&encdata=".$subid5;


    $_SESSION['userID']    = $userID;
    $_SESSION['userEmail'] = $user_email;

    $_SESSION['userName']  = $user_name;
    $_SESSION['userFName'] = $fName;
    $_SESSION['userLName'] = $lName; 

    $_SESSION['userDOB']   = $user_dob;
    $_SESSION['userAge']   = $user_age;

    $_SESSION['orderID']   = $lastRowInsert;

    $_SESSION['userGender']= $userGender;
    $_SESSION['userPGender']=$partnerGender;



    $sql = "UPDATE `orders` SET `link`='$finalLink' WHERE order_id='$lastRowInsert'" ;
    if ($conn->query($sql) === TRUE) {
        $logArray['12'] = "Success"; 
    } else {
        $logArray['12'] = "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

    


    SuperLog($logArray, "order");

}
?>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        <div class="row flex-center min-vh-80 py-6 text-center">
            <div class="col-sm-12 col-md-12 col-lg-10 col-xxl-8 min-vh-90">
                <div class="card py-6">
                    <div class="card-body p-4 p-sm-5">
                        <div class="fw-bold display-6"><?php echo $titlePage; ?></div>
                        <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">
                            <?php echo $sdescription; ?></p>


                        <div class="loadericon"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    setTimeout(function() {
        window.location.href = "<?php echo $finalLink; ?>";
    }, 1000);
});
</script>