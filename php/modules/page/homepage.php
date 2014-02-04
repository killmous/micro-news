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
		<form id="simForm" method="post">
			<input class="form-control input-lg" type="text" Placeholder="Word 1" name="word1" />
			<input class="form-control input-lg" type="text" Placeholder="Word 2" name="word2" />
		</form>
		<div class="row">
			<div class="col-md-4">
				<a class="btn btn-lg btn-primary" onclick="javascript: document.forms[\'simForm\'].submit();" style="margin-top: 10px;">See Similarity</a>
			</div>
		</div>
	</div>
</div>';
	}

	function write()
	{
		$sim = '';
		if(array_key_exists("word1", $_POST) && array_key_exists("word2", $_POST))
		{
			if(strlen($_POST["word1"]) !== 0 && strlen($_POST["word2"]) !== 0)
			{
				
			}
		}
		return $this->content . $sim;
	}
}

ob_end_flush();

?>