<?php

ob_start();

class HomePage
{
	var $content;

	function __construct()
	{
		$this->content =
'<div class="container" style="padding-top: 5px;">
	<div class="jumbotron">
		<h1>Enter two words</h1><br />
		<form id="form" method="post">
			<input class="form-control input-lg" type="text" Placeholder="Word 1" />
			<input class="form-control input-lg" type="text" Placeholder="Word 2" />
			<a class="btn btn-lg btn-primary" style="margin-top: 10px;">See Similarity</a>
		</form>
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