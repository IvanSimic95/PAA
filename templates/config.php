<?php
include $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
debug_backtrace() || include $_SERVER['DOCUMENT_ROOT'].'/templates/error/403.php';

date_default_timezone_set('Europe/Zagreb');
$customJS = $customCSS = $SuccessProduct = $breadcrumbsDisable = $bCheck = $bCheck0 = $bCheck1 = $FBmeta = $TalkJS = $ChatPopup = $loadAjaxChat = $UserFBC = $UserFBP = "";

//Variables used globally
$v = include $_SERVER['DOCUMENT_ROOT'].'/templates/vars.php';
#file_put_contents($_SERVER['DOCUMENT_ROOT'].'/templates/vars.php', '<?php return ' . var_export($v, true) . ';');  //Code for saving variables to vars.php
if(isset($_GET['logout'])){
  session_start();
  $_SESSION = array();
  session_destroy();

  setcookie("loggedIn", "", time()-3600);
  setcookie("orderID", "", time()-3600);
  setcookie("userEmail", "", time()-3600);

  header("Location: /home?loggedOut=success");
  die();
  }
  




//START Order Messages
$processingWelcome = "We are now processing your *Order #%ORDERID%*\n\nYour order will be delivered to your email in %PRIORITY% hours or less.\n\nIf this is your first order your new account will be created automatically\n\nIn order to automatically login to your account just <%EMAILLINK%|Click Here!>\n\n_With Love!_\nPsychic Artist";


//Complete Soulmate, Twin Flame & Future Spouse Text added Before and After Order Text
$generalOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$generalOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";

//Complete Future Baby Text added Before and After Order Text
$babyOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$babyOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";

//Complete Reading Text added Before and After Order Text
$readingOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$readingOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";

//Complete Past Life Text added Before and After Order Text
$pastOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$pastOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";


//Order Processing & Order Complete Notifications
$OrderProcessingMessage = "Your Order status is now set to *Processing*!";

$OrderCompleteMessage = "Your Order status is now set to *Complete*!";
$ContinueConvoMsg = "If you want to chat with Melissa, simply reply to this conversation!";
//END Order Messages


$mg1 = "key-3999017a921e";
$mg2 = "d9b70798a";
$mg3 = "e02ecc7877b";
$mgkey = $mg1.$mg2.$mg3;


//Check if server is localhost or guru and save DB info
$domain = $_SERVER['SERVER_NAME'];
if($domain == "paa.test"){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "pa";
  $base_url = "https://paa.test";
}else{
	$servername = "localhost";
	$username = "psychicartist_user";
	$password = "Jepang123Iva";
	$db = "psychicartist_db";
  $base_url = "https://psychic-artist.com";
}


/////////////////////////////////////////////////////////////////////////////
////////////////////////FUNCTIONS - DO NOT EDIT\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');
$conn->set_charset('utf8mb4');


// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }

/////////////////////////////////////////////////////////////////////////////
////////////////////////FUNCTIONS - DO NOT EDIT\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$s = "select * from settings"; 
$sth = $conn->prepare($s);
$sth->execute();
$data = $sth->get_result(); // get result first
$r = $data->fetch_all(MYSQLI_ASSOC); // then fetch all


//Define Main Variables
$webTitle = $r[0]['value'];
$webDescription = $r[1]['value'];
$webLogo = "https://".$domain.$r[2]['value'];
$webVersion = $r[3]['value'];
$FBToken = $r[5]['value'];

$title = $webTitle;
$sdescription = $webDescription;
$pimage = $webLogo;


$pixelActive = 0;


$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $userip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $userip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $userip = $_SERVER['REMOTE_ADDR'];
}



function normalizeChars($s) {
  $replace = array(
      'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
      'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
      'Þ'=>'B',
      'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
      'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
      'Ğ'=>'G',
      'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
      'Ł'=>'L',
      'Ñ'=>'N', 'Ń'=>'N',
      'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
      'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
      'Ț'=>'T',
      'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
      'Ý'=>'Y',
      'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
      'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
      'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
      'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
      'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'D', 'ð'=>'d',
      'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
      'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
      'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
      'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
      'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
      'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
      'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
      'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
      'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
      'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
      'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
      'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
      'ק'=>'q',
      'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
      'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
      'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
      'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
      'в'=>'v', 'ו'=>'v', 'В'=>'v',
      'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
      'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
      'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
  );
  return strtr($s, $replace);
}


//BREADCRUMBS CHECK & DISABLE
$bCurrent = $_SERVER['REQUEST_URI'];
$splitBread = explode('/',$bCurrent);
$breadC = unserialize($r[4]['value']);

$bSearch0 = $splitBread[0]; 
$bSearch1 = $splitBread[1]; 

if (in_array($bSearch0, $breadC)){$bCheck0 = 1;$bCheck0 = 0; }
if (in_array($bSearch1, $breadC)){$bCheck1 = 1;} else {$bCheck1 = 0; }
if($bCheck0 > 0 OR $bCheck1 > 0)$breadcrumbsDisable = 1;

if(isset($errorPage))$breadcrumbsDisable = 1;

if($domain == "pa.test"){
  // testing
  $min_allowDebugFlag = true;
  $min_errorLogger    = true;
  $min_enableBuilder  = true;
  $min_cachePath      = '/tmp';
  $min_serveOptions['maxAge'] = 0; // see changes immediately
} else {
  // production
  $min_allowDebugFlag = false;
  $min_errorLogger    = false;
  $min_enableBuilder  = false;
  $min_cachePath      = '/tmp';
  $min_serveOptions['maxAge'] = 86400;
}




//Error Reporting - None
//error_reporting(0); //Disable Error Reporting
//ini_set('display_errors', FALSE); //Hide all errors on frontend

//Error Reporting - All
#error_reporting(E_ALL);
#ini_set('display_errors', FALSE);

//Error Log Path
ini_set("log_errors", TRUE); //Log errors to file
ini_set("error_log", $_SERVER['DOCUMENT_ROOT']."/logs/php-error.log");//Path to php error log

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Check if session is set, if not set a new one
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
  session_start();
  }
  
  //Check if user cookie ID is set, if not set a new one
  $randomNumber = rand(155654654,955654654);
  if(!isset($_SESSION['cookie'])) {
  $_SESSION['cookie'] = $randomNumber;
  }

  $randomNumber2 = rand(155534654,955654654);
  if(!isset($_SESSION['cookie2'])) {
  $_SESSION['cookie2'] = $randomNumber2;
  }

  $randomNumber3 = rand(1135654654,955654654);
  if(!isset($_SESSION['cookie3'])) {
  $_SESSION['cookie3'] = $randomNumber3;
  }
  //Check if funnel page is set, if not set a new one
  if(!isset($_SESSION['funnel_page'])) {
  $_SESSION['funnel_page'] = "main";
  }
  

  if(isset($_GET['affid'])){
    $_SESSION['affid'] = $_GET['affid'];
  }

  if(isset($_GET['click_id'])){
    $_SESSION['click_id'] = $_GET['click_id'];
  }
  
  if(isset($_GET['subid1'])){
    $_SESSION['subid1'] = $_GET['subid1'];
  }
  
  if(isset($_GET['subid2'])){
    $_SESSION['subid2'] = $_GET['subid2'];
  }
  


//Save to order log function
function formLog($array) {
  $dataToLog = $array;
  $data = implode(" | ", $dataToLog);
  $data .= PHP_EOL;
  $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/order.log";
  $success = file_put_contents($pathToFile, $data, FILE_APPEND);
  if ($success === TRUE){
    //echo "log saved";
  }
}

//Save to order log function
function formErrorLog($array) {
  $dataToLog = $array;
  $data = implode(" | ", $dataToLog);
  $data .= PHP_EOL;
  $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/order-error.log";
  $success = file_put_contents($pathToFile, $data, FILE_APPEND);
  if ($success === TRUE){
    //echo "log saved";
  }
}

//Save to order log function
function SuperLog($array, $logname) {
  $dataToLog = $array;
  $data = implode(" | ", $dataToLog);
  $data .= PHP_EOL;
  $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/".$logname.".log";
  $success = file_put_contents($pathToFile, $data, FILE_APPEND);
}

//Function to check if user is from US
$formDate = "";
    $langs = array();
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        // break up string into pieces (languages and q factors)
        preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
        if (count($lang_parse[1])) {
            // create a list like "en" => 0.8
            $langs = array_combine($lang_parse[1], $lang_parse[4]);
            // set default to 1 for any without q factor
            foreach ($langs as $lang => $val) {
                if ($val === '') $langs[$lang] = 1;
            }
            // sort list based on value	
            arsort($langs, SORT_NUMERIC);
        }
    }
    if (array_key_first($langs)=="en-US")$formDate = "US";

$rcountdown = rand(1,10);
if($rcountdown <= 3){
  $countdownRandom = "no";
  }
if($rcountdown > 3){
  $countdownRandom = "yes";
  }
    


//Disable notifications in menu
$notificationsOn = "no";


//START Order Messages
$processingWelcome = "We are now processing your *Order #%ORDERID%*\n\nYour order will be delivered to your email in %PRIORITY% hours or less.\n\nIf this is your first order your new account will be created automatically\n\nIn order to automatically login to your account just <%EMAILLINK%|Click Here!>\n\n_With Love!_\nPsychic Artist";


//Complete Soulmate, Twin Flame & Future Spouse Text added Before and After Order Text
$generalOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$generalOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";

//Complete Future Baby Text added Before and After Order Text
$babyOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$babyOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";

//Complete Reading Text added Before and After Order Text
$readingOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$readingOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";

//Complete Past Life Text added Before and After Order Text
$pastOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I’ve seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$pastOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\nPsychic Artist";


//Order Processing & Order Complete Notifications
$OrderProcessingMessage = "Your Order status is now set to Processing!";

$OrderCompleteMessage = "Your Order status is now set to Complete!";
$ContinueConvoMsg = "If you want to chat with Melissa, simply reply to this conversation!";
//END Order Messages



//SESSION DATA FOR TESTING ONLY, REMOVE LATER
//$_SESSION['id'] = "1";
//$_SESSION['name'] = "Ivan Simic";
//$_SESSION['fname'] = "Ivan";
//$_SESSION['email'] = "ivan.simic2903@gmail.com";
//$_SESSION['orders'] = "14";
//$_SESSION['loggedIn'] = "yes";
//SESSION DATA FOR TESTING ONLY, REMOVE LATER
if(!isset($customTrigger)){
  $customTrigger="";
}

//Check if user logged in, if yes save variables
if(isset($_SESSION['id'])){
$userID = $_SESSION['userID'];
$userName = $_SESSION['name'];
$userFName = $_SESSION['fname'];
$userEmail = $_SESSION['email'];
$userOrders = $_SESSION['orders'];

$ChatPopup = <<<EOT
<a href="/dashboard/support">
<div id="chat-popup" class="py-2 px-0 light topbar-gradient rounded-3 chat-hide"> 
            <div id="sidebar-menu" class="text-white">
                    <ul>
                        <li> <a href="/dashboard/support" class="text-decoration-none d-flex align-items-start">
                            <div class="fa fa-comment-question pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link position-relative">
                                Live Chat   
                                <span style="" id="notifier-badge-popup" class="position-absolute badge rounded-pill bg-danger">1</span>
                                </div>
                                <div class="link-desc">You have unread messages!</div>
                            </div>
                        </a> </li>   
</ul>
</div>
</div>
</a>
EOT;

$signature = hash_hmac('sha256', strval("PA".$userID), 'sk_test_dmh9xKYFEPiN2BxC0Z9GuAlrdEe6kRKL');

$TalkJS = <<<EOT
<script>
  Talk.ready.then(function() {
  var me = new Talk.User({
  id: 'PA$userID',
  role: 'PAcustomer',
  name: '$userFName',
  email: '$userEmail',
  photoUrl: 'https://avatars.dicebear.com/api/adventurer/$userEmail.svg',
  custom: { email: '$userEmail' }
});

window.talkSession = new Talk.Session({
appId: 't2X08S4H',
me: me,
signature: "$signature"
});

$('#talkjs-container').hide;


window.talkSession.unreads.on('change', function (unreadConversations) {
  var amountOfUnreads = unreadConversations.length;
  var oldtitle = document.title;
  amountOfUnreads += document.title;

    $('#notifier-badge')
      .text(amountOfUnreads)
      .toggle(amountOfUnreads > 0);

      $('#notifier-badge-popup')
      .text(amountOfUnreads)
      .toggle(amountOfUnreads > 0);
  
    if (amountOfUnreads > 0) {
      document.title = '(' + amountOfUnreads + ')';
      $('#chat-popup').removeClass('chat-hide');
    } else {
      document.title = oldtitle;
      $('#chat-popup').addClass('chat-hide');
    }
  });
});
</script>
EOT;


$loadAjaxChat = <<<EOT
$.ajaxSetup({
  cache: Boolean
});
        // specify loading spinner
        var spinner = "<img src='https://i.imgur.com/pKopwXp.gif' alt='loading...' />";
        // specify the server/url you want to load data from

        var loadLink = "https://$domain/templates/ajax/load-chat.php?id=$userID";
        var windowHeight = '&height=';
        windowHeight += $("#offcanvas-bddy-h").height()
        $("#result").html(spinner).load(loadLink);
EOT;

$TalkJSpop = <<<EOT
  var me = new Talk.User({
  id: 'PA$userID',
  role: 'PAcustomer',
  name: '$userFName',
  email: '$userEmail',
  photoUrl: 'https://avatars.dicebear.com/api/adventurer/$userEmail.svg',
  custom: { email: '$userEmail' }
});
window.talkSession = new Talk.Session({
appId: 't2X08S4H',
me: me,
signature: "$signature"
});
window.talkSession.unreads.on('change', function (unreadConversations) {
  var amountOfUnreads = unreadConversations.length;
  var oldtitle = document.title;
  amountOfUnreads += document.title;

    $('#notifier-badge')
      .text(amountOfUnreads)
      .toggle(amountOfUnreads > 0);

      $('#notifier-badge-popup')
      .text(amountOfUnreads)
      .toggle(amountOfUnreads > 0);
  
    if (amountOfUnreads > 0) {
      document.title = '(' + amountOfUnreads + ')';
      $('#chat-popup').removeClass('chat-hide');
    } else {
      document.title = oldtitle;
      $('#chat-popup').addClass('chat-hide');
    }
  });
EOT;

}else{ //If not logged in make those variables empty
$userID = "";
$userName = "";
$userEmail = "";
$userOrders = "0";
} 


function time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 } 

 $RbaseUrl = "https://".$_SERVER['SERVER_NAME'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

 if(isset($_GET['b'])){
  $btncolor = $_GET['b'];
}else{
  $rcolor = rand(1,2);
  $btncolor = "normal";
  if($rcolor == 1)$btncolor = "green";
  if($rcolor == 2)$btncolor = "normal";
}
$cFBC = "_fbc";
$cFBP = "_fbp";

if(isset($_COOKIE[$cFBC])){
  $UserFBC = $_COOKIE[$cFBC];
}else{
  $UserFBC = "";
}

if(isset($_COOKIE[$cFBP])){
  $UserFBP = $_COOKIE[$cFBP];
}else{
  $UserFBP = "";
}


$cookie_aff = "affid";
$cookie_clickid = "clickid";


if(isset($_COOKIE[$cookie_aff])){

  $affID = $_COOKIE[$cookie_aff];

}else{

  if(isset($_GET['affid'])){
    $affIDSet = $_GET['affid'];
    setcookie($cookie_aff, $affIDSet, time() + (86400 * 30), "/");
  }else{
    $affIDSet = "0";
    setcookie($cookie_aff, $affIDSet, time() + (86400 * 30), "/");
  }

  $affID = $affIDSet;

}


if(isset($_COOKIE[$cookie_clickid])){

  $clickID = $_COOKIE[$cookie_clickid];

}else{

  if(isset($_GET['clickid'])){
    $clickIDSet = $_GET['clickid'];
    setcookie($cookie_clickid, $clickIDSet, time() + (86400 * 30), "/");
  }else{
    $clickIDSet = "0";
    setcookie($cookie_clickid, $clickIDSet, time() + (86400 * 30), "/");
  }

  $clickID = $clickIDSet;

}


if(isset($_GET['utm_campaign'])){
  if($_GET['utm_campaign'] != "website"){
$fbTrack = 1;

$fbVariable = $_GET['utm_campaign'];
$ex = explode(" ",$fbVariable);

$fbCampaign = $ex["0"];
$fbAdset = $ex["1"];
$fbAd = $ex["2"];

//Set fb ads session variables
$_SESSION['fbCampaign'] = $fbCampaign;
$_SESSION['fbAdset'] = $fbAdset;
$_SESSION['fbAd'] = $fbAd;
 }

}else{
$fbTrack = 0;

  $fbCampaign = "";
  $fbAdset = "";
  $fbAd = "";

  if(!isset($_SESSION['fbCampaign'])){
    $_SESSION['fbCampaign'] = $fbCampaign;
  }

  if(!isset($_SESSION['fbAdset'])){
    $_SESSION['fbAdset'] = $fbAdset;
  }

  if(!isset($_SESSION['fbAd'])){
    $_SESSION['fbAd'] = $fbAd;
  }


}


if(isset($_SESSION['userID'])){           //Check if user logged in
if(isset($_GET['notifRead'])){            //Check if notifRead is in URL
  if($_GET['notifRead']=="yes"){          //Check if notifRead is set to yes
    if(isset($_GET['notifID'])){          //Check if notifID is set in URL
      if($_GET['notifID']=="all"){        //Check if notifID is set to ALL

        $nUserID = $_SESSION['userID'];
        $sql = "UPDATE `notifications` SET `unread`='0' WHERE `user_id`='$nUserID'" ;
        if ($conn->query($sql) === TRUE) {
        //  $showError = 0;
        header("Location: ".$RbaseUrl);
        die();
        } else {
        // $showErrorText = "Error: " . $sql->error . "<br>" . $conn->error;
        }

        }else{                            //If notifID is not set to all fetch ID and update just that one notification

        $notifID = $_GET['notifID'];
        $sql = "UPDATE `notifications` SET `unread`='0' WHERE `id`='$notifID'" ;
        if ($conn->query($sql) === TRUE) {
          //  $showError = 0;
        header("Location: ".$RbaseUrl);
        die();
        } else {
          // $showErrorText = "Error: " . $sql->error . "<br>" . $conn->error;
        }


        }
      }
    }
  }
}

//START FUNCTION FOR INDEX.PHP
if (isset($_SERVER['PATH_INFO'])) {//Check URL Path to figure out what template to use
    //Check if URL Ends with "/"
    if (str_ends_with($_SERVER['PATH_INFO'], '/')) {
    $path = substr($_SERVER['PATH_INFO'], 0, -1); //If / is found at the end remove it and then Map the URL to variable $path
    }else{ 
    $path = $_SERVER['PATH_INFO']; //Map the URL to variable $path
    }
}else{
$path = "/home";//Default URL is pointing to home template
}
$splitURL = explode('/',$path);
$template = $_SERVER['DOCUMENT_ROOT'].'/pages/'.$path.'.php';
//END FUNCTION FOR INDEX.PHP

//START FUNCTION FOR INDEX.PHP ADDON FOR VIEW ORDERS
if(isset($splitURL[1])){//If variable is set proceed
    if($splitURL[1]=="dashboard"){
        if(isset($splitURL[2])){
           if($splitURL[2]=="order"){
            $path="dashboard/order";
            $template = $_SERVER['DOCUMENT_ROOT'].'/pages/'.$path.'.php';
              if(isset($splitURL[3])){
              $viewOrder = $splitURL[3];
              }
           }
        }
    }
}
//END FUNCTION FOR INDEX.PHP ADDON FOR VIEW ORDERS

//START FUNCTION FOR INDEX.PHP ADDON FOR SUCCESS PAGE
if(isset($splitURL[1])){//If variable is set proceed
  if($splitURL[1]=="order"){
      if(isset($splitURL[2])){
         if($splitURL[2]=="success"){
          $path="/order/success";
          $template = $_SERVER['DOCUMENT_ROOT'].'/pages/'.$path.'.php';
            if(isset($splitURL[3])){
            $SuccessProduct = $splitURL[3];
            }
         }
      }
  }
}
//END FUNCTION FOR INDEX.PHP ADDON FOR SUCCESS PAGE

//START FUNCTION FOR INDEX.PHP ADDON FOR ORDER PAGE
if(isset($splitURL[1])){//If variable is set proceed
  if($splitURL[1]=="order"){
      if(isset($splitURL[2])){
         if($splitURL[2]=="order"){
          $title = "Order Error";
         }
      }
  }
}
//END FUNCTION FOR INDEX.PHP ADDON FOR SUCCESS PAGE



include_once $_SERVER['DOCUMENT_ROOT'].'/templates/js-trigger.php';
?>