<?php
#include $_SERVER['DOCUMENT_ROOT'].'/templates/noskip.php';
isset($_SESSION['userFName']) ? $fName = $_SESSION['userFName'] : $fName = "there";

$title = "Upgrade your order to colored drawing!"; 
$title2 = "Customize Your Order";
$sdescription = "Customize your order";
$description = "<b>Hey ".$fName."!</b><br><span class='text-center'> Here's a last chance to upgrade your boring pencil drawing to fully colored one!</span>";

$productID = "6";

include $_SERVER['DOCUMENT_ROOT'] . '/templates/rating/rating-total.php';


$reviews = $count;
$avgrating = $avg;



if(isset($_GET['c'])){
  $ord = $_GET['c'];
  $order_ID = $ord;
  $sql = "SELECT * FROM `orders` WHERE `order_id` = '$ord' ORDER BY `order_id` DESC LIMIT 1";
  $result = $conn->query($sql);
  $count = $result->num_rows;
  $row = $result->fetch_assoc();
  
  //If order is found input data from BG and update status to paid
  if($result->num_rows != 0) {
  
  $_SESSION['lastorder'] = $_GET['c'];
  $_SESSION['orderFName'] = $row['first_name'];
  $_SESSION['orderLName'] = $row['last_name'];
  $_SESSION['orderBirthday'] = $row['birthday'];
  $_SESSION['orderAge'] = $row['user_age'];
  $_SESSION['orderGender'] = $row['user_sex'];
  $_SESSION['orderPartnerGender'] = $row['pick_sex'];
  $_SESSION['BGEmail'] = $row['order_email'];
  
  $_SESSION['fbfirepixel'] = 1;
  $_SESSION['fborderID'] = $_GET['c'];
  $_SESSION['fborderPrice'] = $row['order_price'];
  $_SESSION['fbproduct'] = $row['order_product'];

  $_SESSION['fbSource'] = $row['fbSource'];


    $FBPixel = $FBPixel1;
  
  
  }
  
  
  
  
}else{

if(isset($_SESSION['lastorder'])){
$lastOrderID = $_SESSION['lastorder'];
$sql = "SELECT * FROM `orders` WHERE `order_id` = '$lastOrderID' ORDER BY `order_id` DESC LIMIT 1";
$result = $conn->query($sql);
$count = $result->num_rows;
$row = $result->fetch_assoc();

//If order is found input data from BG and update status to paid
if($result->num_rows != 0) {


$_SESSION['lastorder'] = $_GET['c'];
$_SESSION['orderFName'] = $row['first_name'];
$_SESSION['orderLName'] = $row['last_name'];
$_SESSION['orderBirthday'] = $row['birthday'];
$_SESSION['orderAge'] = $row['user_age'];
$_SESSION['orderGender'] = $row['gender'];
$_SESSION['orderPartnerGender'] = $row['partner_gender'];
$_SESSION['BGEmail'] = $row['order_email'];

$_SESSION['fbfirepixel'] = 1;
$_SESSION['fborderID'] = $lastOrderID;
$_SESSION['fborderPrice'] = $row['order_price'];
$_SESSION['fbproduct'] = $row['order_product'];


  $FBPixel = $FBPixel1;

}
}
 
}
$FirePixel = $_SESSION['fbfirepixel'];
?>
<style>
#topbar-sticky, #main-nav{
    display:none!important;
}
#main-body{
    padding-top:10px!important;
}
    </style>
<div class="container-fluid" data-layout="container" style="padding:0!important;padding-top:20px!important;">
    <section class="py-0 light" id="banner">
        <div class="container p-0 p-xl-4">


<div class="card mb-3 col-12 offset-0 col-xl-8 offset-xl-2">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-4.png);"></div>
            <!--/.bg-holder-->
            <div class="card-header bg-light rounded-3" style="text-align:center;">
            <h3 class="gradient mb-0"><?php echo $title2; ?></h3>
                </div>
            <div class="card-body position-relative p-2 p-xl-3" style="text-align:center;">
              <div class="row">
                <div class="col-lg-12">
                
                  
               

                  <div class="progress mt-3 col-12 offset-0 col-xl-10 offset-xl-1 mb-3" style="height: 40px; max-width:100%;margin:0 auto;">
                            <div class="progress-bar bg-warning progress-bar-striped fw-bold fs-1 progress-bar-animated" role="progressbar" style="background-color: #cf2bbd !important;width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" title="Step 1">Step 1 of 3</div>
                        </div>

                       
                </div>
              </div>
            </div>
          </div>
          <div class="row g-0">
       
            <div class="col-12 offset-0 col-xl-8 offset-xl-2">
            <div class="alert alert-info border-2 d-flex align-items-center col-12 offset-0" role="alert">
                    <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
                    <p class="mb-0 flex-1" style="font-weight:600;"><?php echo $description; ?></p>
                    
                  </div>
              <div class="card mb-3">
                <div class="card-header bg-light" style="text-align:center;">
                <h3 class="gradient  mb-0">Wait! Your Portrait Isn't Complete Without This</h3>
                </div>
                  <div class="card-body col-12 offset-0" style="text-align:center;">
                    <div class="row mt-2 mt-lg-0">
                        <div class="col-5"><img class="img-fluid rounded" src="/assets/img/img01.png" alt="upsell" style="border: none!important;padding: 0!important;"></div>
                        <div class="col-2 p-0 my-auto"><img class="img-fluid rounded" src="/assets/img/arrow-color.gif" alt="upsell" style="border: none!important;padding: 0!important;"></div>
                        <div class="col-5"><img class="img-fluid rounded" src="/assets/img/img02.png" alt="upsell" style="border: none!important;padding: 0!important;"></div>
                    </div>
              
                  <form class="readings" action="/order/order-baby" method="get" style="text-align:left;">
 
 
        <input class="cookie" type="hidden" name="cookie_id" value="<?php echo $_SESSION['cookie']; ?>">
        <input class="cookie" type="hidden" name="landingpage" value="Baby1">
        <input class="btntext" type="hidden" name="btntext" value="Place an Order">

      <div class="meta_part">

       
       
          <div class="gradient mt-3 mb-3" style="font-size:18px!important;">Imagine seeing not just a pencil sketch, but a radiant, full-color portrait that truly captures the vibrancy of your drawing. The depth of their eyes, the shade of their lips, the colors that capture their essence — all brought to life.</div>
          <a href="https://www.digistore24.com/answer/yes?template=light" class="btn btn-primary btn-shadow w-100 btn-add-to-cart mb-2 mt-2 fw-bold fs-1" style="display:block;" type="submit" name="form_submit">
          <i class="fa fa-basket-shopping"></i> Purchase - <span class="updated-price">$9.99</span></a>

      
      </div>
     
      <a href="https://www.digistore24.com/answer/no">
      <div class="nothanks w-100 rounded-3 mb-4">No, Thanks!</div>
      </a>

      <p style="letter-spacing: -0.25px;font-size: 14px;line-height: 1.2;margin-top: 20px;text-align:center;">
									<span style="color: #09c100;font-weight:700;">$</span> Get a 60 day money back guarantee if you aren't satisfied.
								</p>

      </form>

       
                  </div>
              </div>
            </div>
        
      
          </div>
          
          </div>
    </section>
</div>

<?php
$customCSSPreload = '<link rel="preload" href="/assets/css/baby.css" as="style">';
$customCSS = '<link href="/assets/css/baby.css" rel="stylesheet">';
$customJS = <<<EOT

<script src="https://www.digistore24.com/service/digistore.js"></script><script>digistoreUpsell()</script>
<script src="/assets/js/infinite-ajax-scroll.min.js"></script>
<script>
$(document).ready(function(){
 let ias = new InfiniteAjaxScroll('.contents', {
            item: '.item',
            next: '.next',
            pagination: '.pagination',
            trigger: '.load-more',
            logger: false
 });

});
    </script>
EOT;
?>

<?php

if($FirePixel == 1){
  $orderID = $_SESSION['fborderID']; 
  $orderPrice = $_SESSION['fborderPrice'];
  $product = $_SESSION['fbproduct'];

$FBPurchasePixel = <<<EOT

<script>
fbq('init', '$FBPixel');
fbq('track', 'Purchase', {
  value: $orderPrice , 
  currency: 'USD',
  content_type: 'product', 
  content_ids: '$product'
}, 
{eventID: '$orderID'});
</script>

<!-- Twitter conversion tracking event code -->
<script type="text/javascript">
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='https://static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
  // Insert Twitter Event ID
  twq('event', 'tw-ojcyv-ojcyw', {
    value: $orderPrice, // use this to pass the value of the conversion (e.g. 5.00)
    conversion_id: '$orderID' // use this to pass a unique ID for the conversion event for deduplication (e.g. order id '1a2b3c')
  });
</script>
<!-- End Twitter conversion tracking event code -->

EOT;
echo $FBPurchasePixel;
$_SESSION['fbfirepixel'] = 0;
}

?>