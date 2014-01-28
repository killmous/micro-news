<?php

ob_start();

class Navbar
{
	var $content;

	function __construct()
	{
		$this->content =
'<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="?p=home">Bootstrap</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="?p=home">Home</a>
				</li>
				<li>
					<a href="?p=about">About</a>
				</li>
			</ul>
		</div>
	</div>
</div>';
	}

	function write()
	{
		return $this->content;
	}
}

?>