$(document).ready(function() {
    $("#disambigbox").remove();
    $(".mw-editsection").remove();
    $(".plainlinks").remove();
    $(".toccolours").remove();
    $(".toc").remove()
    $to = $("#to").html();
    $from = $("#from").html();
    $array = jQuery.parseJSON($("#array").html());
    $("#to").remove();
    $("#from").remove();
    $("#array").remove();
    $("i").each(function(){
	$text = $(this).html();
	$(this).after($text);
	$(this).remove();
    });
    $dis = 0;
    for (i = 0; i < $array.length; i++) {
        if ($array[i][1] == $from) {
            $dis = $array[i];
	    $dis[2] = decodeURI($dis[2]);
            break;
        }
    }
    $("a").each(function() {
        $link = decodeURI($(this).attr('href'));
	console.log($dis[2]);
        $link = $link.replace("/wiki/", "");
        if ($link.indexOf($dis[2]) != -1) {
            $link = $link.replace($dis[2], "")
	    $link = "stage2.php?t=" + $to + "&f=" +  $from + "&w="+$link;
        }
	else
	{
	    $link = "stage3.php?t=" + $to + "&f=" +  $from + "&w="+$link;
	}
	$(this).attr('href', $link);
    });
});
