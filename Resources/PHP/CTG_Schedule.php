<?php
	// Update Schedule.txt
	if (!empty($_POST[game1]) && !empty($_POST[game2]) && !empty($_POST[game3]) && !empty($_POST[time2]) && !empty($_POST[time3])) {
	    $content = "<div class='row'><div class='col-sm-4' id='game1'><div class='tickerTitle'>Now</div><div class='tickerData'>" . $_POST[game1] . "</div></div></div>*<div class='row'><div class='col-sm-4' id='game2'><div class='tickerTitle'>Next</div><div class='tickerData'>".$_POST[time2]." - ".$_POST[game2]." | ".$_POST[time3]." - ".$_POST[game3]."</div></div></div>";
			$data = $_POST[game1]."*".$_POST[game2]."*".$_POST[game3]."*".$_POST[time2]."*".$_POST[time3];
		echo file_put_contents("../TXT/Schedule.txt",$content);
		echo file_put_contents("../TXT/ScheduleRaw.txt",$data);
	}
?>
