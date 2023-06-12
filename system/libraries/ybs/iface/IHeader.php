<?php
namespace ybs\iface;

interface IHeader{
	static function Generate();
	static function getSignature($curlFormat=false);
	
}