<?php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$html = file_get_contents(');

$dom = new DOMDocument();
@$dom->loadHTML($html);

// grab all the on the page
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");

$no = 1;
for ($i = 0; $i < $hrefs->length; $i++) {
       $href = $hrefs->item($i);
       $url = $href->getAttribute('href');
       echo $no.' - '. $url.' <hr> ';
       $no++;
}
?>