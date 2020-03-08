<?php 
session_start();
    if(isset($_SESSION['reloadPage'])) {
        unset($_SESSION['reloadPage']);
           //no outputting code above header
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Location: http://inetfish.com/");
    }
print get_client_ip(); 

// Function to get the client IP address 
function get_client_ip() {



	$ipaddress = '';
    #if (isset($_SERVER['HTTP_CLIENT_IP']))
    #{$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    #print " 1-" &  $_SERVER['HTTP_CLIENT_IP'];
    #}
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    {    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
         print  "2- " & $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
    {  $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
       print "3-" & $__SERVER['HTTP_X_FORWARDED'];
    }
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	{        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    print "4- " & $_SERVER['HTTP_FORWARDED_FOR'];
	}
    else if(isset($_SERVER['HTTP_FORWARDED']))
    {
	    $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    print "5- " &   $_SERVER['HTTP_FORWARDED'];
    }

     else if(isset($_SERVER['X-Real-IP']))
	         {
	             $ipaddress = $_SERVER['X-Real-IP'];
                 print "5- " &   $_SERVER['X-Real-IP'];
               }

    else if(isset($_SERVER['REMOTE_ADDR']))
    {
	    $ipaddress = $_SERVER['REMOTE_ADDR'];
	    print "6- " . $ipaddress = $_SERVER['REMOTE_ADDR'];

    }
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}?>
