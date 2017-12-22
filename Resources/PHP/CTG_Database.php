<?php
	// Update Schedule.txt
	if (!empty($_POST[game1]) && !empty($_POST[game2]) && !empty($_POST[game3])) {
		$content = "<div class='row'><div class='col-sm-4 ticker_data' id='game1'>".$_POST[game1]."</div><div class='col-sm-4 ticker_data' id='game2'>".$_POST[game2]."</div><div class='col-sm-4 ticker_data' id='game3'>".$_POST[game3]."</div></div>";
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
