<?php
namespace ybs\telegram;


if (!defined('Connector'))
    exit('No direct script access allowed');

class KeyboardInline{
	public $button;
	private $row;
	public function __construct(){
		$this->button=array();
		$this->row = array();
	}
	
	public function addButton($title,$callBack=null,$sharelock=null,$url=null){
		
		$title = urlencode($title);            
		$title = htmlentities($title);
		
		$content['text'] =  $title;
		
		if($callBack) $content['callback_data'] = $callBack;
		
		if($sharelock) $content['request_location'] = true;
		
		if($url) $content['url'] = $url;
		
		$this->button[] = $content;
	}
	
	public function addRow($button=null){
		if(!$button) $button = $this->button;
		$this->row[] = $button;
		$this->button = array();
		
	}
	
	
	public function getKeyboard($inline=true){
		$keyboard = ["inline_keyboard" => $this->row];
		if(!$inline) $keyboard = ["keyboard" => $this->row];
		return json_encode($keyboard);	
	}
	
	public function clear (){
		$this->button=array();
		$this->row = array();
	}
	
	
	
}