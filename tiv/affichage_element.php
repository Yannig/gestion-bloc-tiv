<?php
$title = "Liste des ".$element."s du club";
require_once('definition_element.inc.php');
require_once('connect_db.inc.php');

$columns = get_columns_from_element($element);

include('table_creator.inc.php');
?>