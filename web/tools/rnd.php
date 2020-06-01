<?php 
session_start();
    if(isset($_SESSION['reloadPage'])) {
        unset($_SESSION['reloadPage']);
           //no outputting code above header
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Location: http://ipbob.com/");
	
    }

$urlInfo = parse_url($url);

#this page is rendered on redirect but we need the original URI
#HTTP_IPBOB_REQUEST_URI needs to be set in proxy to URI
if (isset($_SERVER['HTTP_IPBOB_REQUEST_URI']))
{       $uri = $_SERVER['HTTP_IPBOB_REQUEST_URI'];
	list($space, $app, $min, $max) = explode("/", $uri);

	$min = intval($min);
	$max = intval($max);

	if ($min == $max) { $min = 0; $max = 100; }

	if (!is_int($min)) { $min=0;}
	if (!is_int($max)) { $max=100;}

} else {
	$min=0;
	$max=100;
}

print "<br />";

print get_rnd($min,$max); 

print "<br /><br />";
print "&nbsp;~^~~~~<br />";
print "&nbsp;&nbsp;/&nbsp;~&nbsp;&nbsp;&nbsp;~&nbsp;\\<br />";
print "&nbsp;(&nbsp;@&nbsp;&nbsp;@&nbsp;)<br />";
print "&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;{}&nbsp;&nbsp;&nbsp;|<br /> ";
print "&nbsp;&nbsp;|&nbsp;^==^&nbsp;|<br /> ";
print "&nbsp;&nbsp;&nbsp;\------/<br />";
print "&nbsp;&nbsp;o--|--o<br />";
print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;|<br /> ";
print "&nbsp;&nbsp;&nbsp;&nbsp;_|&nbsp;|_<br />";
		

//  Function to get random number 
function get_rnd($min, $max) {

	$rnd = rand($min,$max);

	return $rnd;	
}?>
