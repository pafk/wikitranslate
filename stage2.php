<?php
$to = $_GET["t"];
$from = $_GET["f"];
$word = ucfirst($_GET["w"]);
include 'array.php';
include 'simple_html_dom.php';
function urlOk($url) {
    $headers = @get_headers($url);
    if($headers[0] == 'HTTP/1.1 200 OK') return true;
    else return false;
}
function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
$finfo = null;
foreach($array as &$search)
{
	if($search[1] == $from)
	{
		$finfo = $search;
		break;
	}
}
if(urlOk("http://".$from.".wikipedia.org/wiki/".str_replace(" ", "_", $word).$finfo[2]))
{
	$html = file_get_html("http://".$from.".wikipedia.org/wiki/".str_replace(" ", "_", $word).$finfo[2]);
	$ret = $html->find('div[id=mw-content-text]'); 
	echo $ret[0]->innertext;
}
else
{
        $host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'stage3.php?t=$to&f=$from&w=$word';
	header("Location: http://$host$uri/$extra");
}
echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
echo '<script src="stage2.js"></script>';
echo '<span style="display: none;" id = "to">'.$to.'</span>';
echo '<span style="display: none;" id = "from">'.$from.'</span>';
echo '<span style="display: none;" id = "array">'.json_encode(utf8ize($array)).'</span>';
?>
