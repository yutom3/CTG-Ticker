<?php
	// Update Schedule.txt
	if (!empty($_POST[game1]) && !empty($_POST[game2]) && !empty($_POST[game3]) && !empty($_POST[time2]) && !empty($_POST[time3])) {
		$content = "<div class='row'><div class='col-sm-4' id='game1'><div class='tickerTitle'>NOW</div><div class='tickerData'>" . $_POST[game1] . "</div></div><div class='col-sm-4' id='game2'><div class='tickerTitle'>NEXT</div><div class='tickerData'>".$_POST[time2]." - ".$_POST[game2]."</div></div><div class='col-sm-4' id='game3'><div class='tickerTitle'>AFTER</div><div class='tickerData'>".$_POST[time3]." - ".$_POST[game3]."</div></div></div>";
		echo file_put_contents("../TXT/Schedule.txt",$content);
		}

	// Update Anouncements.txt
  if (!empty($_POST[announcement1])) {
		$content = $_POST[announcement1];
		if (!empty($_POST[announcement2])) {
			$content = $content."*".$_POST[announcement2];
		}
  } else if (!empty($_POST[announcement2])) {
		$content = $_POST[announcemnt2];
  } else if (!empty($_POST[announcement3])) {
		$content = $_POST[announcemnt3];
	}
	if (!empty($_POST[announcement3])) {
    $content = $content."*".$_POST[announcement3];
  }
  echo file_put_contents("../TXT/Announcements.txt",$content);
?>
