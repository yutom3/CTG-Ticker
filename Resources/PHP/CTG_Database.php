<?php
	// Update Schedule.txt
	if (!empty($_POST[game1]) && !empty($_POST[game2]) && !empty($_POST[game3]) && !empty($_POST[time2]) && !empty($_POST[time3])) {
        $content = "<div class='row'><div class='col-sm-4' id='game1'><div class='tickerTitle'>Now Playing</div><div class='tickerData'>" . $_POST[game1] . "</div></div></div>*<div class='row'><div class='col-sm-4' id='game2'><div class='tickerTitle'>Next Games</div><div class='tickerData'>".$_POST[time2]." - ".$_POST[game2]." | ".$_POST[time3]." - ".$_POST[game3]."</div></div></div>";
		echo file_put_contents("../TXT/Schedule.txt",$content);
		}

	// Update Anouncements.txt
  if (!empty($_POST[announcement1])) {
        $content = "<div class='tickerTitle'>Latest News </div><div class='tickerData'>" . $_POST[announcement1] . "</div>";
		if (!empty($_POST[announcement2])) {
			$content .= "*<div class='tickerTitle'>Latest News </div><div class='tickerData'>".$_POST[announcement2] . "</div>";
		}
  } else if (!empty($_POST[announcement2])) {
		$content = $_POST[announcemnt2];
  } else if (!empty($_POST[announcement3])) {
		$content = $_POST[announcemnt3];
	}
	if (!empty($_POST[announcement3])) {
    $content .= "*<div class='tickerTitle'>Latest News </div><div class='tickerData'>".$_POST[announcement3] . "</div>";
  }
  echo file_put_contents("../TXT/Announcements.txt",$content);
?>

