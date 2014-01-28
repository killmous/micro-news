<?php

ob_start();

class HomePage
{
	var $content;

	function __construct()
	{
		$this->content =
'';
	}

	function write()
	{
		return $this->content;
	}
}

ob_end_flush();

?>