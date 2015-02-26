<?php

// It may take a while to crawl a site ...
set_time_limit(100000);

// Inculde the phpcrawl-mainclass
include ("libs/PHPCrawler.class.php");

//include ("../medoo.min.php");
//include("simple_html_dom.php");

include ("ganon.php");

include '../medoo.min.php';
$urltocrawl = urldecode($_GET['urltocrawl']);
// Extend the class and override the handleDocumentInfo()-method
class MyCrawler extends PHPCrawler {
	
	function handleDocumentInfo($DocInfo) {

	// Or initialize via independent configuration
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => 'unisearch',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
]);
		// Just detect linebreak for output ("\n" in CLI-mode, otherwise "<br>").
		if (PHP_SAPI == "cli")
			$lb = "\n";
		else
			$lb = "<br />";
		$node = str_get_dom($DocInfo -> content);
				
		$plaintext=strtolower($node->getPlainText());
				$courses =  $database->select("courses","*");
foreach($courses as $course) {
	$count = $database->count("university_course", [
	"uni_id" => $_GET["uniid"],
	"course_id" => $course["course_id"]
]);
If($count==0){
    $place = strpos($plaintext, strtolower($course["course_name"]));
    if (!empty($place)) {
        $last_user_id = $database->insert("university_course", [
	"uni_id" => $_GET["uniid"],
	"course_id" => $course["course_id"]
]);
        exit;
    } else {
        echo "Not Found";
    }
}
}
		echo "Page requested: " . $DocInfo -> url . " (" . $DocInfo -> http_status_code . ")" . $lb;

		//var_dump($DocInfo);
		// Print the refering URL
		echo "Referer-page: " . $DocInfo -> referer_url . $lb;

		// Print if the content of the document was be recieved or not
		if ($DocInfo -> received == true)
			echo "Content received: " . $DocInfo -> bytes_received . " bytes" . $lb;
		else
			echo "Content not received" . $lb;

		// Now you should do something with the content of the actual
		// received page or file ($DocInfo->source), we skip it in this example

		echo $lb;

		flush();
	}

}

// Now, create a instance of your class, define the behaviour
// of the crawler (see class-reference for more options and details)
// and start the crawling-process.

$crawler = new MyCrawler();

// URL to crawl
$crawler -> setURL($urltocrawl);

// Only receive content of files with content-type "text/html"
$crawler -> addContentTypeReceiveRule("#text/html#");

// Ignore links to pictures, dont even request pictures
$crawler -> addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i");

// Store and send cookie-data like a browser does
$crawler -> enableCookieHandling(true);

// Set the traffic-limit to 1 MB (in bytes,
// for testing we dont want to "suck" the whole site)
$crawler -> setTrafficLimit(1000 * 1024);

// Thats enough, now here we go
$crawler -> go();

// At the end, after the process is finished, we print a short
// report (see method getProcessReport() for more information)
$report = $crawler -> getProcessReport();

if (PHP_SAPI == "cli")
	$lb = "\n";
else
	$lb = "<br />";

echo "Summary:" . $lb;
echo "Links followed: " . $report -> links_followed . $lb;
echo "Documents received: " . $report -> files_received . $lb;
echo "Bytes received: " . $report -> bytes_received . " bytes" . $lb;
echo "Process runtime: " . $report -> process_runtime . " sec" . $lb;
?>