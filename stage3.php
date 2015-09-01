<?php
$to = $_GET["t"];
$from = $_GET["f"];
$word = $_GET["w"];
echo '<link rel="stylesheet" type="text/css" href="style.css">';
//mb_internal_encoding("UTF-8");


include 'array.php';
include 'simple_html_dom.php';
function urlOk($url) {
    return filter_var($url, FILTER_VALIDATE_URL);
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
//print_r(preg_replace("/\([^)]+\)/","",$ret[0]));
		//$ret = $ret[0]->find('span');

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
echo "<br><br><a href='wikitranslate.php'> Return Home </a>";
?>
