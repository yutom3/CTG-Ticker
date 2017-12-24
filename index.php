<head>
  <title>
    CTG Ticker
  </title>
  <link href = "Resources/Images/CTG Logo.png" rel="icon" type="image/png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <style>
    #marqueeBorder {
        color: #ffffff;
        background-color: none;
        background-image: url("Resources/Images/Ticker.png"), url("Resources/Images/TickerBlack.png");
        background-size: contain, contain;
        background-repeat: no-repeat, repeat-x;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        position: relative;
        height: 50px;
        overflow:hidden;
        font-size: 1.5em;
    }
  #marqueeContent {
    position: absolute;
    left: 12px !important;
    line-height: 55px;
    width: 100%;
    white-space:nowrap;
  }
  .tickerTitle, .tickerData {
    display: inline-block;
  }
  .tickerData {
    padding-left: 1em !important;
  }
  .schedule, .announcements {
    margin: 40px;
  }
  select {
    width: 7.2em;
  }
  </style>
  <script type="text/javascript"> // Prevent the page from refreshing when submitting a HTML form
    $(document).ready( function () {
      $('.scheduleForm').submit( function () {
        var formdata = $(this).serialize();
        $.ajax({
          type: "POST",
          url: "Resources/PHP/CTG_Schedule.php",
          data: formdata
        })
        return false;
      });
      $('.announcementsForm').submit( function () {
        var formdata = $(this).serialize();
        $.ajax({
          type: "POST",
          url: "Resources/PHP/CTG_Announcements.php",
          data: formdata
        })
        return false;
      });
    });
  </script>
</head>
<body>

  <!-- Ticker Overlay -->
  <div id="CTG_Ticker">
  </div>

  <div class="row">
    <div class="form col-sm-6">
      <!-- Update Schedule -->
      <div class="schedule">
        <h3>Schedule</h3>
        <form class="scheduleForm" action="Resources/PHP/CTG_Schedule.php" method="post">
          Now: (No need to select time.)<br>
          <select name="time1" size="1em" disabled>
            <option value="" disabled selected>CURRENT</option>
          </select>
          <input type="text" name="game1" size="80em">
          <br>
          Next: (Time needed.)<br>
          <select name="time2">
            <option value="" disabled selected>Select time</option>
            <option value="12 AM">12 AM</option>
            <option value="1 AM">1 AM</option>
            <option value="2 AM">2 AM</option>
            <option value="3 AM">3 AM</option>
            <option value="4 AM">4 AM</option>
            <option value="5 AM">5 AM</option>
            <option value="6 AM">6 AM</option>
            <option value="7 AM">7 AM</option>
            <option value="8 AM">8 AM</option>
            <option value="9 AM">9 AM</option>
            <option value="10 AM">10 AM</option>
            <option value="11 AM">11 AM</option>
            <option value="12 PM">12 PM</option>
            <option value="1 PM">1 PM</option>
            <option value="2 PM">2 PM</option>
            <option value="3 PM">3 PM</option>
            <option value="4 PM">4 PM</option>
            <option value="5 PM">5 PM</option>
            <option value="6 PM">6 PM</option>
            <option value="7 PM">7 PM</option>
            <option value="8 PM">8 PM</option>
            <option value="9 PM">9 PM</option>
            <option value="10 PM">10 PM</option>
            <option value="11 PM">11 PM</option>
          </select>
          <input type="text" name="game2" size="80em">
          <br>
          After: (Time needed.)<br>
          <select name="time3" size="1em">
            <option value="" disabled selected>Select time</option>
            <option value="12 AM">12 AM</option>
            <option value="1 AM">1 AM</option>
            <option value="2 AM">2 AM</option>
            <option value="3 AM">3 AM</option>
            <option value="4 AM">4 AM</option>
            <option value="5 AM">5 AM</option>
            <option value="6 AM">6 AM</option>
            <option value="7 AM">7 AM</option>
            <option value="8 AM">8 AM</option>
            <option value="9 AM">9 AM</option>
            <option value="10 AM">10 AM</option>
            <option value="11 AM">11 AM</option>
            <option value="12 PM">12 PM</option>
            <option value="1 PM">1 PM</option>
            <option value="2 PM">2 PM</option>
            <option value="3 PM">3 PM</option>
            <option value="4 PM">4 PM</option>
            <option value="5 PM">5 PM</option>
            <option value="6 PM">6 PM</option>
            <option value="7 PM">7 PM</option>
            <option value="8 PM">8 PM</option>
            <option value="9 PM">9 PM</option>
            <option value="10 PM">10 PM</option>
            <option value="11 PM">11 PM</option>
          </select>
          <input type="text" name="game3" size="80em">
          <br>
          <input type="submit" name="submitSchedule" value="Update Schedule" onclick="loadCurrentDelay()">
        </form>
      </div>
    </div>
    <div class="form col-sm-6" id="CTG_CurrentSchedule">
    </div>
  </div>

  <div class="row">
    <div class="form col-sm-6">
      <!-- Update Announcements -->
      <div class="announcements">
        <h3>Announcements (optional)</h3>
        <form class="announcementsForm" action="Resources/PHP/CTG_Announcements.php" method="post">
          Announcement 1:<br>
          <input type="text" name="announcement1" size="95em">
          <br>
          Announcement 2:<br>
          <input type="text" name="announcement2" size="95em">
          <br>
          Announcement 3:<br>
          <input type="text" name="announcement3" size="95em">
          <br>
          <input type="submit" name="submitAnnouncements" value="Update Announcements" onclick="loadCurrentDelay()">
        </form>
      </div>
    </div>
    <div class="form col-sm-6" id="CTG_CurrentAnnouncements">
    </div>
  </div>


  <script type="text/javascript"> // Start ticker upon page load
    var loadHelper;
    $(document).ready(function() {
      loadTicker();
      loadCurrentDelay();
    });
    function loadTicker() {
      $("#CTG_Ticker").load("Resources/PHP/CTG_Ticker.php");
    }
    function loadCurrent() {
      $("#CTG_CurrentSchedule").load("Resources/PHP/CTG_CurrentSchedule.php");
      $("#CTG_CurrentAnnouncements").load("Resources/PHP/CTG_CurrentAnnouncements.php");
    }
    function loadCurrentDelay() {
        loadHelper = setTimeout(loadCurrent,1000);
    }
  </script>
</body>

