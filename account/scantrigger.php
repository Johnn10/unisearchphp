<?php
$lines = file('../crawler/indexes.txt', FILE_SKIP_EMPTY_LINES);

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($lines as $line) {
	$line = urlencode($line);
	$myfile = fopen("../crawler/logs/scanurls.log", "w") or die("Unable to open file!");
	$txt = "index.php?urltocrawl=$line \n";
	fwrite($myfile, $txt);
	fclose($myfile);
	$scanurl="index.php?urltocrawl=$line";
	fopen("$scanurl", 'r');
}
?>