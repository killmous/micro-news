<?php

ob_start();

class Header
{
	var $content;

	function __construct()
	{
		$this->content =
'<head>
	<title>Bootstrap is Cool</title>
	<meta charset="utf=8"></meta>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"></link>
	<link rel="stylesheet" href="modules/pagehelp.css"></link>
</head>
';
	}

	function write()
	{
		return $this->content;
	}

}

ob_end_flush();

?>
