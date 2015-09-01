<?php
$to = $_GET["t"];
$from = $_GET["f"];
$word = ucfirst($_GET["w"]);
include 'array.php';
include 'simple_html_dom.php';
echo '<link rel="stylesheet" type="text/css" href="style.css">';


function urlOk($url) {
    return filter_var($url, FILTER_VALIDATE_URL);
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
if(urlOk("http://".$from.".wikipedia.org/wiki/".str_replace(" ", "_", $word).$finfo[2]) || strcmp($finfo[2], "") == 0)
{
	$html = file_get_html("http://".$from.".wikipedia.org/wiki/".str_replace(" ", "_", $word).$finfo[2]);
	$ret = $html->find('div[id=mw-content-text]'); 
	echo $ret[0]->innertext;
}
else
{
        $host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'stage3.php?t='.$to.'&f='.$from.'&w='.str_replace(" ", "_", $word);
	header("Location: http://$host$uri/$extra");
}
echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
echo '<script src="stage2.js"></script>';
echo '<span style="display: none;" id = "to">'.$to.'</span>';
echo '<span style="display: none;" id = "from">'.$from.'</span>';
echo '<span style="display: none;" id = "array">'.json_encode(utf8ize($array)).'</span>';
?>
