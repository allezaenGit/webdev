<?php

function AutoLoad($class){
	@include_once APPPATH . $class .".php";
}

spl_autoload_register("AutoLoad");

?>

