<?php
namespace ybs\telegram;


if (!defined('Connector'))
    exit('No direct script access allowed');

class KeyboardDefault{
	public $button;
	private $row;
	public function __construct(){
		$this->button=array();
		$this->row = array();
	}
	
	public function addButton($title,$request_contact=false,$request_location=false){
		
		$title = urlencode($title);            
		$title = htmlentities($title);
		
		$content['text'] =  $title;
		
		$content['request_contact'] = $request_contact;
		
		$content['request_location'] = $request_location;
		
		$this->button[] = $content;
	}
	
	public function addRow($button=null){
		if(!$button) $button = $this->button;
		$this->row[] = $button;
		$this->button = array();
		
	}
	
	
	public function getKeyboard(){
		
		$keyboard = [
			"keyboard" => $this->row,
			'resize_keyboard' => true, 
			'one_time_keyboard' => true,
		];
		return  json_encode($keyboard);	
	}
	
	public function clear (){
		$this->button=array();
		$this->row = array();
	}
	
	
	
}