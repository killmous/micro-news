<?php

ob_start();

class HomePage
{
	var $content;

	function __construct()
	{
		$this->content =
'<div class="container">
	<div class="jumbotron">
		<p>I\'m a homepage</p>
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