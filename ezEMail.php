<?php
#require_once '/root/ZendFramework-1.12.3/library/Zend/Mail.php';
#require_once '/root/ZendFramework-1.12.3/library/Zend/Mime.php';
#require_once '/root/ZendFramework-1.12.3/library/Zend/Mail/Transport/Smtp.php';
require_once '/var/www/html/code/ZendFramework-1.12.3/library/Zend/Mail.php';
require_once '/var/www/html/code/ZendFramework-1.12.3/library/Zend/Mime.php';
require_once '/var/www/html/code/ZendFramework-1.12.3/library/Zend/Mail/Transport/Smtp.php';
class ezEMail {
	
	//Using default mailgun
	static private $_serverName = 'smtp.mailgun.org';
	static private $_userName = 'postmaster@ezhealthtrack.com';
	static private $_password = '7x28b9udi8-9';
	
	function ezEMail($config = null){
		//Read the configuration
		if($config != null){
			$this->_serverName = $config->getServerName();
			$this->_password = $config->getPassword();
			$this->_userName = $config->getUserName();
		}
	}

	static function sendSMTPMessage($to, $from,$fromName, $subject, $message,$type="text/html"){
                try {
		$headers = array(
					'From'  => $from,
					'To'	=> $to,
					'Subject' => $subject
					);
		$config = array(
				'auth' => "login",
				'username' => ezEMail::$_userName,
				'password' => ezEMail::$_password,
				'ack' => false
				);
		$transport = new Zend_Mail_Transport_Smtp(ezEMail::$_serverName, $config);
		
		$mailer = new Zend_Mail();
		
		$mailer->setBodyText($message);
		$mailer->setFrom($from,$fromName);
		$mailer->addTo($to);
		$mailer->setSubject($subject);
		
		$mailer->send($transport);
                } catch (Zend_Exception $ze){
			//Log the response
			return false;
		}
		return true;
	}
	
	//Test email if all is working
	static function testEmail($smtp = false){
		if($smtp){
			return ezEMail::sendSMTPMessage("rajeshananda@gmail.com",
					"support@ezhealthtrack.com",
					"support",
					"Welcome to ezHealthTrack",
					"Looking forward to maintaining your family health");
				
		}else {
			return ezEMail::sendMessage("rajeshananda@gmail.com", 
						   "Support<support@ezhealthtrack.com>", 
						   "Welcome to ezHealthTrack", 
						   "Looking forward to maintaining your family health");
		}
	} //End of Method testEmail

	/**
	 * Send the email
	 * @param ArrayString $to
	 * @param String $from
	 * @param String $subject
	 * @param String $message
	 * @param enum $type
	 */
	static function sendMessage($to, $from, $subject, $message,$type="text/html") {
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'key-6z7o7w581db3agjwgbl9i5ojw8gaauh5');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/ezhealthtrack.com/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('from' => $from,
		'to' =>  $to,
		'subject' => $subject,
		'text' => $message ));
	
		$result = curl_exec($ch);
	
		curl_close($ch);
	
		return $result;
	}
	
} //End Of Class


//$result = ezEMail::testEmail(true);
//echo "result = ". $result."\n";
