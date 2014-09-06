<?php
$to = $_GET["t"];
$from = $_GET["f"];
$word = $_GET["w"];
mb_internal_encoding("UTF-8");
include 'array.php';
include 'simple_html_dom.php';
function urlOk($url) {
    $headers = @get_headers($url);
    if($headers[0] == 'HTTP/1.1 200 OK') return true;
    else return false;
}
if(urlOk("http://".$from.".wikipedia.org/wiki/".$word))
{
	$html = file_get_html("http://".$from.".wikipedia.org/wiki/".$word);
        $ret = $html->find('li[class=interwiki-'.$to.']'); 
	if( $ret != null)
	{
		echo " <meta charset='UTF-8'>";
		$ret = $ret[0]->find('a');
		$html = file_get_html("http:".$ret[0]->href);
		$ret = $html->find('h1[id=firstHeading]');
		$ret = $ret[0]->find('span');
		echo preg_replace("/\([^)]+\)/","",$ret[0]);
	}
	else
	{
	echo "Sorry, could not find a translation for the requested language";
	}
}
else
{
	echo "Sorry, can not find word.";
}
