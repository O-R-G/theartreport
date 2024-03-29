<?
// path to config file
$config = $_SERVER["DOCUMENT_ROOT"];
$config = $config."/open-records-generator/config/config.php";
require_once($config);

// specific to this 'app'
$config_dir = $root."config/";
require_once($config_dir."url.php");
require_once($config_dir."request.php");
date_default_timezone_set("America/Los_Angeles");

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();
// $rr = new Request();

if($uu->id)
	$item = $oo->get($uu->id);
else {
    $children = $oo->children($root);
    foreach($children as $child) {
        $name =  strtolower($child["name1"]);
		if ($name == ".home")
    	    $item = $child;
	}
}

$media = $oo->media($item['id']);
$devhash = rand();
?>

<html>
	<head>
		<!-- <title><?if ($uu->id) { echo $item['name1'] . ' - '; }?>THE ART REPORT</title> -->
        <title><?= date("m/j/y H:i:s"); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="/static/fonts/franklingothiccondensed/frankgotcon-webfont.css?v=<? echo $devhash; ?>">
		<link rel="stylesheet" href="/static/css/global.css?v=<? echo $devhash; ?>">
		<link rel="apple-touch-icon" href="<? echo $host; ?>media/png/touchicon.png" />
		<script src="static/js/analytics.js"></script>
	</head>
<body class='mono'>
