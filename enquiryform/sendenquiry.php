<?php 
ob_start();
session_start();
error_reporting(1);
$errors='';
require_once "classes/recaptchalib.php";
require_once('classes/mailprocess.php');
$t2hobj = new mailprocess;
$post=$_POST;
//print_r($post);
$to= ''; 
$sms='';
$website = $_SERVER['HTTP_HOST'];

$secret = "6Lfh6hgUAAAAAEMH1Z6l0glmWzGPybUxfDbjNavD";
// empty response
$response = null;
// check secret key
$reCaptcha = new ReCaptcha($secret);
$link='enquiry.php';

if(@$_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);

	if ($response != null && $response->success) {
		$dataarray=array('crmid'=>'87','values'=>$post,'to'=>$to,'website'=>$website,'sms'=>$sms);
		$t2hobj->savetodb($dataarray,$sms);
		$_SESSION['errmsg']='<div class="eror"><div class="alert alert-success"><strong>Success!</strong> Enquiry Delivered SuccessFully<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div></div>';
		header("Location:$link");
	}
	else{
		$_SESSION['errmsg']='<div class="eror"><div class="alert alert-danger"><strong>Error!</strong> Error Occured Please Retry!!!<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>';
		header("Location:$link");
	}
}else{
	$_SESSION['errmsg']='<div class="eror"><div class="alert alert-danger"><strong>Error!</strong> Select Captcha!!!<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>';
	header("Location:$link");
}


?>