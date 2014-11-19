<?php

function validate($title, $content) {
	if (!(
		isset($title) &&
		isset($content) &&
		strlen($title) > 0 &&
		strlen($content) > 0
	))
	{
		return 'Title AND content required!';
	}
}

?>
