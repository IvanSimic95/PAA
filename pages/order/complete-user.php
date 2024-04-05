
<?php
$showError = 0;
$dashboardRedirect = $errorDisplay = $showError = $showErrorText = "";
$DBsaved = 0;
$title = "Order complete! | Psychic Artist"; 
$sdescription = "You can now proceed to your user dashboard by clicking the button below!";
$galert = "Your Orders have been Created!";


?>
<style>
#topbar-sticky{
    top:50px!important;
    z-index:6666!important;
}
#main-nav{
    top:95px!important;
}
</style>

<div class="container-fluid" data-layout="container" style="padding:0!important;padding-top:20px!important;">
    <section class="py-0 light" id="banner">
        <div class="container p-0 p-xl-4">

          <div class="row g-0">
       
            <div class="col-12 offset-0 col-xl-8 offset-xl-2">
      <?php if($showError == 0){ ?>
      <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
      <div class="bg-success me-3 icon-item d-none d-sm-flex"><span class="fas fa-check-circle text-white fs-3"></span> </div>
      <p class="mb-0 flex-1"><?php echo $galert; ?></p>
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
              <div class="card mb-3">
                <div class="card-header bg-light topbar-gradient <?php if($DBsaved == 0){ ?>p-4<?php }else{ ?>p-3<?php }?>" style="text-align:center;">
                <h3 class="mb-0 fw-semibold fs-3" style="color:#fff;">Order Complete!</h3>
            
                </div>
                  <div class="card-body col-12 offset-0 col-xl-10 offset-xl-1 mt-0" style="text-align:center; min-height:25vh;">

      <div class="alert alert-success border-2 d-flex align-items-center mt-2" role="alert">
      <p class="mb-0 flex-1">Your order is now paid for & you will receive an email with your order details and dashboard login link. Your order will be delivered to your email!</p>
      </div>

      <div class="alert alert-info border-2 d-flex align-items-center mt-2" role="alert">
      <p class="mb-0 flex-1">If you need help contact us at contact@soulmate-drawing.com</p>
      </div>

      <div class="alert alert-warning border-2 d-flex align-items-center mt-2" role="alert">
      <p class="mb-0 flex-1">Please note that your Purchase Will Be Reflected as "Digistore24"</p>
      </div>
   
               

     </div>
              </div>
            </div>
        
      
          </div>
          
          </div>
    </section>
</div>
<style>
ol {
    list-style: disc!important;
    padding-left: 1.5rem!important;
}
  </style>
<?php
//$customCSSPreload = '<link rel="preload" href="/assets/css/baby.css" as="style">';
//$customCSS = '<link href="/assets/css/baby.css" rel="stylesheet">';
if($formDate == "US"){
  $dobfield = "userDobUS";
  $dobmsg = "Make sure to enter your Date in MM/DD/YYYY Format!";
  $validDob = "validDOBus";
}else{ 
  $dobfield = "userDob";
  $dobmsg = "Make sure to enter your Date in DD-MM-YYYY Format!";
  $validDob = "validDOB";
}
$customJS = <<<EOT
<!-- Begin of Digistore24 Trusted Badge Code -->
<script type="text/javascript" src="https://www.digistore24.com/trusted-badge/31114/8VFurRVFl9tYlfi/thankyoupage"></script>
<!-- End of Digistore24 Trusted Badge Code -->
<script>
$("#userName, #userDobUS, #userDob, #userEmail, #SelectGender, #SelectPGender").on("change keyup paste", function(){
  $('#SaveChanges').prop('disabled', false);
  $('#SaveChanges').slideDown("slow");

  $('#SkipChanges').html('<i class="fa fa-ban"></i> Don\'t Save!');


});

$(document).ready(function(){
  $('#userDobUS').mask('00/00/0000');
  $('#userDob').mask('00-00-0000');
});
</script>
EOT;


?>