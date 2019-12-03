<?
/* 
// original
$uri = explode('/', $_SERVER['REQUEST_URI']);
$view = "views/";
*/

// from ica.art
// in process
$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);
$show = isset($_GET["show"]);   // show one event, hide others
// if ($show) 
//    die();
$view = "views/";

/* ------------------------------------------------------
        handle url:
        + /dev > gyroscope (plus hide the clock)
        + /thx > download
        + everything else > object-fullscreen
------------------------------------------------------ */

// show the things
require_once("views/head.php");
require_once("views/title.php");    
require_once("views/main.php");

if ($uri[1] == "subscribe") {
    require_once("views/subscribe.php");    
} else {
    require_once("views/menu.php");
}
require_once("views/calendar.php");
require_once("views/foot.php");
?>
