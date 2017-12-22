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
    background-color: #000000;
    background-image: url("Resources/Images/Ticker.png");
    background-size: 100% 100%;
    font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;
    position:relative;
    height: 137px;
    overflow:hidden;
    font-size: 1.5em;
  }

  #marqueeContent {
    position:absolute;
    left:0px;
    line-height:40px;
    white-space:nowrap;
  }
  .form {
    left: 40px;
    position: absolute;
  }
  </style>
  <script type="text/javascript"> // Prevent the page from refreshing when submitting a HTML form
      $(document).ready( function () {
          $('form').submit( function () {
              var formdata = $(this).serialize();
              $.ajax({
                  type: "POST",
                  url: "Resources/PHP/CTG_Database.php",
                  data: formdata
              });
              return false;
          });
      });
  </script>
</head>
<body>

  <!-- Ticker Overlay -->
  <div id="CTG_Ticker">
  </div>

  <br>

  <!-- HTML Forms -->
  <div class="form">
    <!-- Update Schedule -->
    <div class="schedule">
      <h3>Schedule</h3>
      <form action="Resources/PHP/CTG_Database.php" method="post">
        Now:<br>
        <input type="text" name="game1" size="80em">
        <br>
        Next:<br>
        <input type="text" name="game2" size="80em">
        <br>
        After:<br>
        <input type="text" name="game3" size="80em">
        <br><br>
        <input type="submit" value="Update Schedule">
      </form>
    </div>

    <br>

    <!-- Update Announcements -->
    <div class="announcements">
      <h3>Announcements (optional)</h3>
      <form action="Resources/PHP/CTG_Database.php" method="post">
        Announcement 1:<br>
        <input type="text" name="announcement1" size="107">
        <br>
        Announcement 2:<br>
        <input type="text" name="announcement2" size="107">
        <br>
        Announcement 3:<br>
        <input type="text" name="announcement3" size="107">
        <br><br>
        <input type="submit" value="Update Announcements">
      </form>
    </div>
  </div>
  <script> // Start ticker upon page load
      $(document).ready(function() {
          loadTicker();
      });
      function loadTicker() {
          $("#CTG_Ticker").load("Resources/PHP/CTG_Ticker.php");
      }
  </script>
</body>
