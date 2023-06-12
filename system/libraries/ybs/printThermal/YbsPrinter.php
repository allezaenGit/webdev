<?php

namespace ybs\printThermal;

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

use ybs\printThermal\PrintConnectors\Platform;

class YbsPrinter extends Printer{
	
	const SEPARATOR_BITIMAGE 	= "#0__0#";	
	const SEPARATOR_BITIMAGECOL = "#x__x#";
	const SEPARATOR_ALIGMENT 	= ".787765.";	 
	private $platform;
	
	
    public function bitImage(EscposImage $img, int $size = Printer::IMG_DEFAULT,int $aligment = Printer::JUSTIFY_CENTER)
    {	
		
			
		if($this->platform == Platform::CLIENT_ANDROID){
			parent::setJustification($aligment);
			parent::bitImage($img,$size);
		}else{
			$this->pathImage = $img->filename;
			$this -> connector -> write(self::SEPARATOR_BITIMAGE .  $aligment . self::SEPARATOR_ALIGMENT  .  $img->filename . self::SEPARATOR_BITIMAGE);
		}	
		
    }
	
	
	
	public function bitImageColumnFormat(EscposImage $img, int $size = Printer::IMG_DEFAULT,int $aligment = Printer::JUSTIFY_CENTER)
    {
		
		if($this->platform == Platform::CLIENT_ANDROID){
			parent::setJustification($aligment);
			parent::bitImageColumnFormat($img,$size);
		}else{
			
			$this->pathImage = $img->filename;
			$this -> connector -> write(self::SEPARATOR_BITIMAGECOL  . $aligment . self::SEPARATOR_ALIGMENT .  $img->filename .  self::SEPARATOR_BITIMAGECOL );
		}	
    }
	
	
	/**
     * receipt image direct
     */
	public function  bitImageDirect(EscposImage $img, int $size = Printer::IMG_DEFAULT){
			parent::bitImage($img,$size);
	}
	
	public function  bitImageColumnFormatDirect(EscposImage $img, int $size = Printer::IMG_DEFAULT){
			parent::bitImageColumnFormat($img,$size);
	}
	

	
	
    public function close($finalize=true)
    {
		if(!$finalize) {
			$this -> connector ->finalizeDirect();
		}else{
			
			
        $this -> connector -> finalize();
		}
 }
	
	
	public function setPlatform($platform){
		$this->platform = $platform;
	}
	
}
