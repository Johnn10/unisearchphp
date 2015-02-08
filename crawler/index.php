<?php

// It may take a whils to crawl a site ...
set_time_limit(1000000000);

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
		foreach ($node('title') as $element) {

			$sitetitle = $element -> getInnerText();

			echo $sitetitle, "<br>\n";
			//var_dump($element->links_found);

			$string = $sitetitle;
			$pieces = preg_split( "/(-|\|)/", $string);
			
			try {

				if (sizeof($pieces) > 0) {
					for ($i = 0; $i < sizeof($pieces); $i++) {
						if (strpos(strtolower($pieces[$i]), "university")) {
							$unisave = trim($pieces[$i]);
							$uniurl = trim($DocInfo -> url);
							var_dump($pieces);
							//creating map url to google (NO API KEY)
							$uniloc = "https://www.google.co.ke/maps/place/" . urlencode($unisave);
							$domainanalysis = parse_url($uniurl);
							$uniurl = $domainanalysis['host'];
							//if ($urltocrawl!= $DocInfo -> url) {
								//do nothing
							//} else {
								//save
						$last_user_id = $database->insert("universities", ["uni_name" => $unisave,"uni_address" => $uniurl,"uni_website" => $uniloc ]);

							//}
							break;
						}
					}
				}

			} catch(Exception $c) {

			}
			/*foreach ($owned_urls as $url) {
			 //if (strstr($string, $url)) { // mine version
			 if (strpos($string, $url) !== FALSE) { // Yoshi version
			 echo "Match found";
			 return true;
			 }
			 }*/
			//echo "Not found!";
			//return false;

		}

		// Find all images
		//foreach($html->find('title') as $element)
		//   echo $element->innertext . '<br>';
		//echo $html->plaintext;
		// Print the URL and the HTTP-status-Code
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
$crawler -> setTrafficLimit(10000 * 1024);

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