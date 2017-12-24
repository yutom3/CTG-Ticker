<script type="text/javascript">
// Display Current Announcements
var announcement1 = "";
var announcement2 = "";
var announcement3 = "";

function loadRawFileAnnouncements() { // Read file
  <?php
    $local_file_open = file_get_contents("../TXT/AnnouncementsRaw.txt");
    $local_file = explode("*", $local_file_open);
  ?>
  announcementsRaw = <?php echo json_encode($local_file) ?>;
  if (announcementsRaw[0]) {
    announcement1 = announcementsRaw[0];
    if (announcementsRaw[1]) {
      announcement2 = announcementsRaw[1];
      if (announcementsRaw[2]) {
        announcement3 = announcementsRaw[2];
      } else {
        announcement3 = "";
      }
    } else {
      announcement2 = "";
    }
  } else {
    announcement1 = "";
  }
}

function updateCurrentAnnouncements() { // Update HTML
  announcement1Input = document.getElementById("announcement1Raw");
  announcement2Input = document.getElementById("announcement2Raw");
  announcement3Input = document.getElementById("announcement3Raw");

  announcement1Input.value = announcement1;
  announcement2Input.value = announcement2;
  announcement3Input.value = announcement3;
}

function loadRawAnnouncements() {
  loadRawFileAnnouncements();
  updateCurrentAnnouncements();
}

loadRawAnnouncements();
</script>

<!-- Update Announcements -->
<div class="announcements">
  <h3>Announcements</h3>
  <form action="Resources/PHP/CTG_Database.php" method="post">
    <fieldset disabled>
      Announcement 1:<br>
      <input type="text" id="announcement1Raw" name="announcement1" size="95em">
      <br>
      Announcement 2:<br>
      <input type="text" id="announcement2Raw" name="announcement2" size="95em">
      <br>
      Announcement 3:<br>
      <input type="text" id="announcement3Raw" name="announcement3" size="95em">
      <br>
    </fieldset>
  </form>
</div>
