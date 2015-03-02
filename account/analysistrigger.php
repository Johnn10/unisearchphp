<?php
ini_set('max_execution_time', 300);
include ("../crawler/ganon.php");
include ("../databaseconnector.php");

$datas = $database->select("universities","*");
// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($datas as $data) {
	$line = urlencode($data["uni_website"]);
	$uniid=$data["uni_id"];
	$myfile = fopen("../crawler/logs/scan.log", "w+") or die("Unable to open file!");
	$txt = "../crawler/analyzer.php?urltocrawl=$line&uniid=$uniid \n";
	fwrite($myfile, $txt);
	fclose($myfile);
	$scanurl="http://localhost/unisearch/crawler/analyzer.php?urltocrawl=$line&uniid=$uniid";
	fopen($scanurl,"r");
}
?>