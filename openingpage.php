<?php
include 'array.php';
echp "<html>";
echo "<span class = 'word'> Translate: <input type='text' id = 'text'><br><span>";
echo "<span class = 'dropdown'> From <select id='from'> ";
foreach ($array as &$value)
{
	echo "<option value='".$value[1]."'>".html_entity_decode($value[0])."</option>";
}
echo "</select> </span>";
echo "<span class = 'dropdown'> To <select id='to'> ";
foreach ($array as &$value)
{
	echo "<option value='".$value[1]."'>".html_entity_decode($value[0])."</option>";
}
echo "</select> </span>";
echo "<br>";
echo "<span class='submit'> <input id ='submit' type='submit' value='Translate'></span>";
echo "<span id = 'error'></span>";
echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
echo '<script src="stage1.js"></script>';
echo "</html>";
?>
