<?php
namespace ybs\cli\template\support;

class BluePrint{
	
	public $className;
	public $path;
	public $loadIndexContent;
	public $loadModel;

	public $output;
	
	public function setClassName($data){
		$this->className = $data;
	}
	public function setPath($data){
		$this->path = $data;
	}
	public function setLoadIndexContent($data){
		$this->loadIndexContent = $data;
	}
	public function setLoadModel($data){
		$this->loadModel = $data;
	}
	

	
}