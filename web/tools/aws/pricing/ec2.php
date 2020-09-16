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
	list($space, $app, $function, $service, $type, $size, $model) = explode("/", $uri);

	$model = 'Linux On Demand cost';

	print get_price_daily($type,$size,$model); 

if (!strpos($_SERVER['QUERY_STRING'],"simple")){
        include '../../bob.php';
}
	
}

//  Function to get price 
function get_price_daily($type, $size, $model) {

	#check if file exists
	if (file_exists('data.csv')){

	#Load the CSV into an array and replace the key with a name instead of index number	
	$csv = array_map('str_getcsv', file('data.csv'));
	    array_walk($csv, function(&$a) use ($csv) {
		          $a = array_combine($csv[0], $a);
			      });

	#find the instance type in the array
	$needle = $type.".".$size;
	$index = array_search($needle,array_column($csv, 'API Name'));

	#return the requested column value/data
	return $csv[$index][$model];

	}
}?>
