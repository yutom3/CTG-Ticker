<?php
	// Update Schedule.txt
	if (isset($_POST[game1]) && isset($_POST[game2]) && isset($_POST[game3])) {
		$content = "<div class='row'><div class='col-sm-4 ticker_data' id='game1'>".$_POST[game1]."</div><div class='col-sm-4 ticker_data' id='game2'>".$_POST[game2]."</div><div class='col-sm-4 ticker_data' id='game3'>".$_POST[game3]."</div></div>";
		echo file_put_contents("../TXT/Schedule.txt",$content);
		}

	// Update Anoouncements.txt
  if (isset($_POST[announcement1])) {
    $start = 1;
  } else if (isset($_POST[announcement2])) {
    $start = 2;
  }
  switch ($start) {
    case 1:
      $content = $_POST[announcement1];
      if (isset($_POST[announcement2])) {
        $content = $content."*".$_POST[announcement2];
      }
      break;
    case 2:
      $content = $_POST[announcemnt2];
      break;
  }
  if (isset($_POST[announcement3])) {
    $content = $content."*".$_POST[announcement3];
  }
  echo file_put_contents("../TXT/Announcements.txt",$content);
?>
