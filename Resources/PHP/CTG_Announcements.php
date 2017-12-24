<?php
	// Update Announcements.txt
	$divHTML = "<div class='tickerTitle'>Latest News </div><div class='tickerData'>";
	if (!empty($_POST[announcement1])) {
	$content = $divHTML.$_POST[announcement1]."</div>";
	$data .= $_POST[announcement1];
	if (!empty($_POST[announcement2])) {
		$content .= "*".$divHTML.$_POST[announcement2] . "</div>";
		$data .= "*".$_POST[announcement2];
	}
	} else if (!empty($_POST[announcement2])) {
	$content = $divHTML.$_POST[announcement2]."</div>";
	$data .= $_POST[announcement2];
	} else if (!empty($_POST[announcement3])) {
	$content = $divHTML.$_POST[announcement3]."</div>";
	$data .= $_POST[announcement3];
	}
	if (!empty($_POST[announcement3]) && (!empty($_POST[announcement1]) || !empty($_POST[announcement2]))) {
	$content .= "*".$divHTML.$_POST[announcement3] . "</div>";
	$data .= "*".$_POST[announcement3];
	}
	echo file_put_contents("../TXT/Announcements.txt",$content);
	echo file_put_contents("../TXT/AnnouncementsRaw.txt",$data);
?>
