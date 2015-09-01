<?php
include 'array.php';

echo " <meta charset='UTF-8'>";
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo '<div class="title">WIKITRANSLATE</div><br>';
echo "<span class = 'word'> Translate: <input type='text' id = 'text'><br><span>";
echo "<span class = 'dropdown'> From <select id='from'> ";
foreach ($array as &$value)
{
	echo "<option 
value='".$value[1]."'>".urldecode($value[0])."</option>";
}
echo "</select> </span>";
echo "<span class = 'dropdown'> To <select id='to'> ";
foreach ($array as &$value)
{
	echo "<option 
value='".$value[1]."'>".urldecode($value[0])."</option>";
}
echo "</select> </span>";
echo "<br>";
echo "<span class='submit'> <input id ='submit' type='submit' value='Translate'></span>";
echo "<span id = 'error'></span>";
echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
echo '<script src="stage1.js"></script>';
?>
