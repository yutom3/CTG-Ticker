<script type="text/javascript">
// Display Current Schedule
var scheduleRaw = "";
var game1 = "";
var game2 = "";
var game3 = "";
var time2 = "";
var time3 = "";

function loadRawFileSchedule() { // Read file
  <?php
    $local_file_open = file_get_contents("../TXT/ScheduleRaw.txt");
    $local_file = explode("*", $local_file_open);
  ?>
  scheduleRaw = <?php echo json_encode($local_file) ?>;
  game1 = scheduleRaw[0];
  game2 = scheduleRaw[1];
  game3 = scheduleRaw[2];
  time2 = scheduleRaw[3];
  time3 = scheduleRaw[4];
}

function updateCurrentSchedule() { // Update HTML
  game1Input = document.getElementById("game1Raw");
  game2Input = document.getElementById("game2Raw");
  game3Input = document.getElementById("game3Raw");
  time2Input = document.getElementById("time2Raw");
  time3Input = document.getElementById("time3Raw");

  game1Input.value = game1;
  game2Input.value = game2;
  game3Input.value = game3;
  time2Input.innerHTML = time2;
  time3Input.innerHTML = time3;
}

function loadRawSchedule() {
  loadRawFileSchedule();
  updateCurrentSchedule();
}

loadRawSchedule();
</script>

<!-- Update Schedule -->
<div class="schedule">
  <h3>Schedule</h3>
  <form action="Resources/PHP/CTG_Database.php" method="post">
    <fieldset disabled>
      Now: (No need to select time.)<br>
      <select name="time1" size="1em" disabled>
        <option value="" id="time1Raw" disabled selected>CURRENT</option>
      </select>
      <input type="text" id="game1Raw" name="game1" size="80em">
      <br>
      Next: (Time needed.)<br>
      <select name="time2">
        <option value="" id="time2Raw" disabled selected></option>
      </select>
      <input type="text" id="game2Raw" name="game2" size="80em">
      <br>
      After: (Time needed.)<br>
      <select name="time3" size="1em">
        <option value="" id="time3Raw" disabled selected></option>
      </select>
      <input type="text" id="game3Raw" name="game3" size="80em">
      <br>
  </fieldset>
  </form>
</div>
    </fieldset>
  </form>
</div>
