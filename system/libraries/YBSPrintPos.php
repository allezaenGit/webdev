<?php 
include "ybs/printThermal/YbsPrinter.php";
include "ybs/printThermal/PrintConnectors/Platform.php";
include "ybs/printThermal/PrintConnectors/YbsPrintConnector.php";

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\RawbtPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;


use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\CapabilityProfiles\StarCapabilityProfile;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;


use ybs\printThermal\YbsPrinter;			
use ybs\printThermal\PrintConnectors\Platform;
use ybs\printThermal\PrintConnectors\YbsPrintConnector;

class CI_YBSPrintPos{
	
	private $clientPlatform;
	private $serverPlatform;
	private $CI;
	public $connector;
	public $printer;
	public $profile;
	
	function __construct(){
		$this->CI = &get_instance();
		$this->clientPlatform = $this->getPlatformClient();
		$this->serverPlatform = $this->getPlatformServer();
		
	}
	
	
	/**
	* Set Printer name and localserver for direct print
	*
	* @param array $config with index "printer_name", "profile" ,"localserver"	
	*  Ex : 
	*	[ 	"printer_name" => "//192.168.1.3/mySharePrint",
	*     	"profile" => "simple",
	* 		"localserver" => "http://192.168.1.3/ybs-app/"
	*   ]
	*
	*  for profile you can use : "simple" or "default" or "POS-5890"	
	*
	*/
	public function setPrint($config){
		$this->setConnector($config);
	}
	
	
	
	private function setConnector($config){ 
				$capProf =  @$config['profile'];
				if(!$capProf) $capProf="simple";
				
				$this->profile = CapabilityProfile::load($capProf);
				
				$config['platform'] = $this->clientPlatform;
				$this->connector = new YbsPrintConnector($config);
				
				
				$this->printer = new YbsPrinter($this->connector, $this->profile);
				$this->printer->setPlatform($this->clientPlatform);
	}
	
	
	
	private function getPlatformClient(){
		$os_user = strtolower($this->CI->agent->platform());
		
		if(strpos($os_user,"linux") !==false) return Platform::CLIENT_LINUX;
		if(strpos($os_user,"darwin") !==false) return Platform::CLIENT_MAC;
		if(strpos($os_user,"windows") !==false) return Platform::CLIENT_WIN;
		if(strpos($os_user,"android")!==false ) return Platform::CLIENT_ANDROID;
		
		 throw new Exception("OS Belum terdaftar");
	}
	
	private function getPlatformServer(){
		if (PHP_OS == "WINNT") {
            return Platform::SERVER_WIN;
        }
        if (PHP_OS == "Darwin") {
            return Platform::SERVER_MAC;
        }
        return Platform::SERVER_LINUX;
	}
	
	
}