<?php

ob_start();

require( 'page/navbar.php' );
require( 'page/homepage.php' );
require( 'page/errorpage.php' );

class Body
{
	var $content;

	function __construct( $headers )
	{
		$navbar = new Navbar();
		$head = 
'<body>
' . $navbar->write();
		$tail = 
'	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
';
		if( !array_key_exists('p', $headers ) ) {
			$home = new HomePage();
			$body = $home->write();
		}
		else
		{
			switch( $headers[ 'p' ] )
			{
			case 'home':
				$home = new HomePage();
				$body = $home->write();
				break;
			default:
				$error = new ErrorPage();
				$body = $error->write();
			}
		}

		$this->content = $head . $body . $tail;
	}

	function write()
	{
		return $this->content;
	}
}

?>
