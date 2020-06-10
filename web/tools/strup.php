<?php

if(isset($_SESSION['reloadPage'])) {
        unset($_SESSION['reloadPage']);
       //no outputting code above header
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Location: http://ipbob.com/");
   }

#this page is rendered on redirect but we need the original URI
#HTTP_IPBOB_REQUEST_URI needs to be set in proxy to URI


if (isset($_SERVER['HTTP_IPBOB_REQUEST_URI']))
{       $uri = $_SERVER['HTTP_IPBOB_REQUEST_URI'];
        list($space, $app, $str) = explode("/", $uri);

	if ($str){
        #protect from appended shell commands
	list($str) = explode(";", $str);
       	$str = escapeshellcmd($str);

	$n = strtoupper($str);

	echo $n;
	}
	else{echo "invalid";}
}

if (!strpos($_SERVER['QUERY_STRING'],"simple")){
	        include 'bob.php';
}

?>
