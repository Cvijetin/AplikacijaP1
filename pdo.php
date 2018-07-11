<?php
try {
	$db = new PDO('mysql:host=localhost;dbname=cvidakovic_1', 'cvidakovic', '82180');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
$db->query("set names utf8");

?>