<?php

include_once 'include/config.php';
@extract($_REQUEST);
$abc = $_SERVER['REQUEST_URI'];
$abc_br = explode("/", $abc);
include_once 'include/customerID.php';
$toOrgUrl = $custID;
$toBesentUrl = $abc_br[0] . "/";
$url = $abc_br[2];
$filename999 = mb_substr($url, 0,-4);
$filename = rtrim($filename999,".");
echo $filename;

define('SITE_DEM_PATH', $toBesentUrl);
    if ($filename == 'index') {		
       include_once("index.php");	   
        exit;
    }
    $propertysel = "select * from propertyTable where propertyURL='$filename' && status='Y'";
    $propertyquery = $conn->query($propertysel);
    $propertydata = $propertyquery->fetch_assoc();
    if (!empty($propertydata['propertyURL'])) {
        include_once("property-details.php");
        exit;
    }
    $serviceaptsel = "select * from city_url where cityUrl='$filename'";
	$staticselquery = $conn->query($serviceaptsel);
    $serviceaptdata = $staticselquery->fetch_assoc();
    if (!empty($serviceaptdata['cityUrl']) && $serviceaptdata['propertyCounter'] == 'Y') {
        include_once("service-apartments.php");
        exit;
    }
    $staticsel = "select * from static_pages where page_url='$filename' and status='Y' and type='desktop' and customerID ='$toOrgUrl'";
	$staticselquery = $conn->query($staticsel);
	$no_of_row = $staticselquery->num_rows;
	$staticpagedata = $staticselquery->fetch_assoc();
    if ($numb == "0") {
        
    } else {
        $page = $staticpagedata['page'];
         //echo $page;		 
        include_once("$page.php");
        exit;
    }

    if ($filename == 'franchise') {
        include_once("franchise.php");
        exit;
    }
    if ($filename == 'book-now') {
        include_once("book-now.php");
        exit;
    }
?>