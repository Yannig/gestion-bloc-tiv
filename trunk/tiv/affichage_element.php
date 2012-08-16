<?php
if(array_key_exists("element", $_GET)) {
  $element = $_GET["element"];
}
$title = "Liste des ".$element."s du club";
include_once('head.inc.php');
require_once('definition_element.inc.php');
require_once('connect_db.inc.php');

if(!isset($real_element)) $real_element = $element;
$element_class = get_element_handler($real_element, $db_con);
unset($real_element);

if($element === "inspection_tiv") {
  $element_class->setDate($date_tiv);
}

print $element_class->getHTMLTable("liste_$element", $element);
?>