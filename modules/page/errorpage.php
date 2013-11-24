<?php

ob_start();

class ErrorPage
{
	var $content;

	function __construct()
	{
		$this->content = 
'
<div class="container">
	<div class="errormain">
		<h1>404 Error</h1>
		<h2>Page not found</h2>
	</div>
</div>
';
	}

	function write()
	{
		return $this->content;
	}
}

ob_end_flush();

?>
