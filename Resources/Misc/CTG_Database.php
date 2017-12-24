<?php
	// Update Schedule.txt
	if (isset($_POST[submitSchedule]) && !empty($_POST[game1]) && !empty($_POST[game2]) && !empty($_POST[game3]) && !empty($_POST[time2]) && !empty($_POST[time3])) {
	    $content = "<div class='row'><div class='col-sm-4' id='game1'><div class='tickerTitle'>Now Playing</div><div class='tickerData'>" . $_POST[game1] . "</div></div></div>*<div class='row'><div class='col-sm-4' id='game2'><div class='tickerTitle'>Next Games</div><div class='tickerData'>".$_POST[time2]." - ".$_POST[game2]." | ".$_POST[time3]." - ".$_POST[game3]."</div></div></div>";
			$data = $_POST[game1]."*".$_POST[game2]."*".$_POST[game3]."*".$_POST[time2]."*".$_POST[time3];
		echo file_put_contents("../TXT/Schedule.txt",$content);
		//echo file_put_contents("../TXT/ScheduleRaw.txt",$data);
	}

	// Update Anouncements.txt
	if (isset($_POST[submitAnnouncements])) {
		$divHTML = "<div class='tickerTitle'>Latest News </div><div class='tickerData'>";
		if (!empty($_POST[announcement1])) {
		$content = $divHTML.$_POST[announcement1]."</div>";
		$data .= "*".$_POST[announcement1];
		if (!empty($_POST[announcement2])) {
			$content .= "*".$divHTML.$_POST[announcement2] . "</div>";
			$data .= "*".$_POST[announcement2];
		}
		} else if (!empty($_POST[announcement2])) {
		$content = $divHTML.$_POST[announcement2]."</div>";
		$data .= "*".$_POST[announcement2];
		} else if (!empty($_POST[announcement3])) {
		$content = $divHTML.$_POST[announcement3]."</div>";
		$data .= "*".$_POST[announcement3];
		}
		if (!empty($_POST[announcement3]) && (!empty($_POST[announcement1]) || !empty($_POST[announcement2]))) {
		$content .= "*".$divHTML.$_POST[announcement3] . "</div>";
		$data .= "*".$_POST[announcement1];
		}
		echo file_put_contents("../TXT/Announcements.txt",$content);
		//echo file_put_contents("../TXT/AnnouncementsRaw.txt",$data);
	}
?>
