<?php

$suggestedSrcAttributes = [];
$title = $album['title'] . " " . $album['artist'];

$title = str_replace(" ", "+", $title);
$query_string = "https://www.google.com/search?q=$title&sca_esv=dc724815bbf34a06&hl=it&biw=1136&bih=809&udm=2&sxsrf=AE3TifPnHAOPrhbXWPvBmUst-f08BfK6RQ%3A1761847569586&ei=EakDaazDI7WO9u8P6L2UqAM&ved=0ahUKEwjsj6LUwcyQAxU1h_0HHegeBTUQ4dUDCBQ&uact=5&oq=Back+to+Black&gs_lp=Egtnd3Mtd2l6LWltZyINQmFjayB0byBCbGFjazILEAAYgAQYsQMYgwEyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgsQABiABBixAxiDATIFEAAYgARInQZQAFgAcAB4AJABAJgBlAGgAZQBqgEDMC4xuAEDyAEA-AEC-AEBmAIBoAKYAZgDAJIHAzAuMaAHjQWyBwMwLjG4B5gBwgcDMi0xyAcD&sclient=gws-wiz-img";

$scrape_content = file_get_contents($query_string);
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($scrape_content);
libxml_clear_errors();
$imgtags = $dom->getElementsByTagName('img');
foreach ($imgtags as $tag) {
  $suggestedSrcAttributes[] = $tag->getAttribute('src');
}
