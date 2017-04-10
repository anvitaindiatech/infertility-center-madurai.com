<?php 
require 'vendor/autoload.php';
use Mailgun\Mailgun;

class mailprocess{
	public $success;
	public $Host;
	public $User;
	public $Pass;
	public $domain;
	public $api;
	public $from;

	function __construct(){
		$this->success   = false;
		$this->Host      = 'smtp.mailgun.org';
		$this->domain    = 'tours2health.org';
		$this->api       = 'key-82ae49a8f7b55495b763a2912def802c';
		$this->User      = 'postmaster@tours2health.org';
		$this->Pass      = 'e8efd6a179b0d19136927627e02d51a8';
		$this->from      = 'info@infertility-center-madurai.com';
		$this->cc        = 'guruhospital@sify.com';
		$this->bc        = 'anvita.edb@gmail.com';
		$this->adminemail= 'info@guruhospitals.com';

	}
	function render($val='')
	{
			$details = debug_backtrace();
			$file = $details[0]['file'];
			$line = $details[0]['line'];

			if ($val!='') {
				$val=print_r($val,true);
				$val=str_replace('<', '&lt;', $val);
				$val=str_replace('>', '&gt;', $val);
				$val=str_replace('[', '<b style="color:#FF715C;">[', $val);
				$val=str_replace(']', ']</b>', $val);
				$val=str_replace('Array', '<b style="color:#d7503c;">array</b>', $val);
				$val=str_replace('stdClass Object', '<b style="color:#d7503c;">OBJECTSTD</b>', $val);
				$val=str_replace('=&gt;', '<b style="color:#d7503c;">=></b>', $val);
				$val=str_replace('OBJECTSTD</b>', '</b><details style="display:block;" open><summary style="outline:0;color:red;">stdClass Object</summary><div>', $val);
				$val=str_replace('array</b>', '</b><details style="display:block;" open><summary style="outline:0;color:#d7503c;">Array</summary><div>', $val);
				$val=str_replace(')', ')</div></details>', $val);
			}else{
				$val='<div style="padding:5px;color:rgb(255, 89, 89);">empty <b>array</b> or <b>string</b>!</div>';
			}
			echo '<pre style="font-size: 13px;font-style:normal;font-family: monospace;background: #0C1D33;color: #68F595;word-wrap: break-word;position: relative;z-index: 999999999999;margin-bottom:5px;text-align:left;">';
			echo "<div style='padding: 7px 10px 0 10px;'>$val</div>";
			echo '<div style="
			    padding: 7px 10px;
			    background-color: rgba(255, 255, 255, 0.04);
			    color: #6A81A0;font-size: 11px;text-align:left;
			" 
	     onMouseOver="this.style.color=\'#FFFFFF\'"
	     onMouseOut="this.style.color=\'#6A81A0\'">'.$file.' on line '.$line.'</div></pre><div style="clear:both;"></div>';
	}
	public function setUp($to = 'to_address', $subject  = '<u>SUBJECT TEXT</u>', $contents = '<u>BODY CONTENT</u>', $person   = '' )
	{
				$this->_to       = $to;
				$this->_subject  = $subject;
				$this->_contents = $contents;
				$this->_person   = $person;
				# Prepare Template
				$this->_template();
				return $this;

	}
	### Create template
		private function _template()
		{
			$cl_br = 'style="height:10px;"';
			$linkStyle = 'text-decoration:none;padding:2px 0;color:#3590ea;display:inline-block;';
			$_head ='
				<html>
			<head>
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
			</head>
			<body>
			<div style="background: #fff; padding: 25px 50px; font-family: \'Open Sans\'; font-size: 13px;min-width: 320px;">
				<div style="color: #fff;height: 80px;max-height: 80px;min-height: 80px;padding: 5px 0px;"> 
					<br>
					<div style="clear:both;"></div>
				</div>';
			$_body ='
			<div style="color: #999; padding-top: 30px;background: #fff;border: 1px solid rgba(0, 0, 0, 0.11);">
				<div style="color: #048DC0;padding: 7px 10px 7px 35px;font-size: 18px;font-weight: bold;border-left: 5px solid #1AB6D9;">
					'.$this->_subject.'
				</div>
				<div style="background: #FFF; color: #666; padding: 10px 30px 20px 30px; border-bottom: 1px solid #e2e2e2;">
					<!--<p style="color:#000;font-size:15px;line-height: 0;">Dear<b>'.$this->_person.'</b>,</p>-->
					<p style="color: #000;font-size: 16px;line-height: 3;">Hello,</p>
					'.$this->_contents.'
				</div>';
			$_footer ='
				<div style="clear:both;height: 0;">&nbsp;</div>
				</div>
				</div>
			</div>';
			$_footer .='
			</body>
			</html>';
			$this->_template = $_head . $_body . $_footer;
			//$this->render($this->_template);
		}
		### test mail
	public function view()
		{
			e($this->_template);
			$this->_test = true;
			exit();
		}
	function sendMail($to = '', $subject = '', $contents = '', $person = ''){
		return $this->setUp($to, $subject, $contents, $person); 
	}
	public function send(){

		
	}

//All Send Function
	function savetodb($val,$smsto){
		$vall=$this->clientemail($val);
		$val1=$this->adminemail($val);
		$val2=$this->addtocrm($val);
		$val3=$this->sendsms($smsto,$val);
		$val4=$this->addtolms($val);
	}

//Send Client Email
	function clientemail($val){
		extract($val);
                //$this->render($values['cemail']);exit;
		$clientContent ="<p>Thanks Mr/Mrs <b>{$values['cname']}</b> for your Enquiry</b>. We are happy to serve you at anytime.</p><p>We will contact you soon to know more details.</p>";
		$clientMail = $this->sendMail($values['cemail'], 'Thanks for the Enquiry', $clientContent, $values['cname']);
		// $clientMail = $clientMail->send();
		# Instantiate the client.
		$mgClient = new Mailgun($this->api);
		$domain = $this->domain;
		$result = $mgClient->sendMessage($domain, array(
		    'from'    => $this->from,
		    'to'      => $values['cemail'],
		    'subject' => 'Thanks for the Enquiry',
		    'text'    => $this->_template,
		    'html'    => $this->_template
		));
		//$this->render($result);exit;
	}

//Send Admin Email
	function adminemail($val){
		extract($val);
		$adminContent ="<p>Enquiry from {$website}<br><b>Name : {$values['cname']}</b><br><b>Email : {$values['cemail']}</b><br><b>Country : {$values['selectedCountry']}</b><br><b>Phone : {$values['cphonecode']}{$values['cphoneno']}</b><br><b>Message : {$values['cmessage']}</b> ";
		$clientMail = $this->sendMail($this->adminemail, "New Enquiry From {$website}", $adminContent, $values['cname']);
		//$clientMail = $clientMail->send();
		$mgClient = new Mailgun($this->api);
		$domain = $this->domain;
		$result = $mgClient->sendMessage($domain, array(
		    'from'    => $this->from,
		    'to'      => $this->adminemail,
		    'cc'      => $this->cc,
		    'bcc'      => $this->bc,
		    'subject' => "New Enquiry From {$website}",
		    'text'    => $this->_template,
		    'html'    => $this->_template
		));
		//$this->render($result);exit;
	}

//Send SMS
 function sendsms($sms = '',$val)

    {
    	extract($val);
    	$content ="New Enquiry from {$website} Name : {$values['cname']},Email : {$values['cemail']},Country : {$values['selectedCountry']},<b>Phone : {$values['cphonecode']}{$values['cphoneno']},Message : {$values['cmessage']} ";
    	$postdata = http_build_query(
    	    array(
    	        'username' 	=> 'ANVITA',
    	        'password' 	=> 'Yf5q@$r^',
    	        'sender' 	=> 'MDGURU',
    	        'to' 		=> $sms,
    	        'message' 	=> urlencode($content)
    	    )
    	);
    	$opts = array('http' =>
    	    array(
    	        'method'  => 'POST',
    	        'header'  => 'Content-type: application/x-www-form-urlencoded',
    	        'content' => $postdata
    	    )
    	);
    	$context  = stream_context_create($opts);
		$result = file_get_contents('http://alotsolutions.in/API/WebSMS/Http/v1.0a/index.php', false, $context);	
    }
    function addtocrm($val){
    	extract($val);
    	$crmid=$crmid;
    	file_get_contents("http://crm.tours2health.com/insertenquiry.php?name=".urlencode($values['cname'])."&email=".urlencode($values['cemail'])."&country=".urlencode($values['selectedCountry'])."&phone=".urlencode($values['cphonecode'].$values['cphoneno'])."&message=".urlencode($values['cmessage'])."&accid={$crmid}");
    } 
    function addtolms($val){
    	extract($val);
    	$crmid=$crmid;
    	file_get_contents("http://faythcrm.com/insertenquiry.php?name=".urlencode($values['cname'])."&email=".urlencode($values['cemail'])."&country=".urlencode($values['selectedCountry'])."&phone=".urlencode($values['cphonecode'].$values['cphoneno'])."&message=".urlencode($values['cmessage']));
    }
}
 ?>