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
        list($space, $app, $url) = explode("/", $uri);

	if ($url){
        #protect from appended shell commands
	list($url) = explode(";", $url);
       	$url = escapeshellcmd($url);

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$data = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode>=200 && $httpcode<300){
	  echo $httpcode;
	} else {
	  echo $httpcode;
	}
	}
	else{echo "invalid";}
}

if (!strpos($_SERVER['QUERY_STRING'],"simple")){
	        include 'bob.php';
}

?>
