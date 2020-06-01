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


#
#For ping to work it, the command is required to be presnet on the Os/conainer.
#

if (isset($_SERVER['HTTP_IPBOB_REQUEST_URI']))
{       $uri = $_SERVER['HTTP_IPBOB_REQUEST_URI'];
	list($space, $app, $url) = explode("/", $uri);

	#protect from appended shell commands
	list($url) = explode(";", $url);

	$url = escapeshellcmd($url);
			
	$cmd = "/bin/ping -c 3 $url";

	$str = exec($cmd,$out,$result);
	
	
	#print "str".$str."<br />";
	#print "out:".$out[0]."<br />";
	#print "result:".$result."<br />";

	if ($str){
		$ret = "pass";
	}else{
		$ret = "fail";
	}

}else { $ret = "invalid";}

print $ret;

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
		
