$(document).ready(function(){
	$("#submit").click(function(){
		$from = $("#from").val();
		$to = $("#to").val();
      		$word = $("#text").val();
		if($from == $to){
			$("#error").html("Choose different languages");
		}
		else if($word == "")
		{
			$("#error").html("Choose a word to translate");
		}
		else{
			console.log("HELLO?");
			window.location.assign("stage2.php?t=" + encodeURIComponent($to) + "&f=" +encodeURIComponent($from)+"&w=" +encodeURIComponent($word));
		}
	});
});
