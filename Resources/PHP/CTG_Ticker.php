<script type="text/javascript">

// Set initial vars
var holdMax = 300;
var holdCur = 0;
var interval = 20;
var scrollSpeed = 5;
var pxpTick = scrollSpeed;

var schedule = "";
var scheduleCur = 0;
var scheduleMax = 0;

var announcements = [];
var announcementsCur = 0;
var announcementsMax = 0;

var done = 0;
var myInterval;

function loadFile() { // Read file
  <?php
    $local_file_open = file_get_contents("../TXT/Schedule.txt");
    $local_file = explode("*", $local_file_open);
  ?>
  schedule = <?php echo json_encode($local_file) ?>;
  scheduleCur = 1;
  scheduleMax = 3;
  scheduleSubCur = 0;
  scheduleSubMax = 1;

  <?php
    $local_file_open = file_get_contents("../TXT/Announcements.txt");
    $local_file = explode("*", $local_file_open);
  ?>
  announcements = <?php echo json_encode($local_file) ?>;
  announcementsCur = 1;
  announcementsMax = announcements.length;
}

function nextItem() { // Selects current item to display
  marqueeDiv=document.getElementById("marqueeContent");
  switch (scheduleCur) {
    case 1: // Schedule
          marqueeDiv.innerHTML = schedule[scheduleSubCur];
      break;
    case 2: // Sponsors
          marqueeDiv.innerHTML = "<div class='tickerTitle'>Sponsors</div><div class='tickerdata'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/272px-Google_2015_logo.svg.png' style='height:75px;vertical-align:center;'/></div>"
      break;
    case 3: // Announcements
      marqueeDiv.innerHTML = announcements[announcementsCur-1];
      break;
    default: // Default action
      marqueeDiv.innerHTML = "Thanks for watching Change Thru Games: Level 4!";
      break;
  }
  if (scheduleSubCur < scheduleSubMax) { //Is the schedule through?
    ++scheduleSubCur;
  } else if (scheduleCur < scheduleMax) { // Will not increment until all announcements were displayed
    ++scheduleCur;
  } else if (announcementsCur <= announcementsMax) {
    ++announcementsCur;
  } else if (done != 1) { // Detects when all items have been displayed
    //done = 1;
    clearInterval(myInterval); // Stops previous instance
    loadTicker(); // Refresh data
    loadCurrentDelay();
    scheduleCur = 1;
    announcementsCur = 1;
    scheduleSubCur = 0;
    scheduleSubMax = 1;
  }
  else {
    return;
  }

  marqueeDiv.style.left = "0px";
  marqueeDiv.style.top = parseInt(document.getElementById("marqueeBorder").offsetHeight*1)+"px";
  holdCur = 0;
}

function startMarquee() {
  loadFile();
  nextItem();
  // Make a shortcut referencing our div with the content we want to scroll
  marqueeDiv = document.getElementById("marqueeContent");
  // Get the total width of our available scroll area
  marqueeWidth = document.getElementById("marqueeBorder").offsetWidth;
  marqueeHeight = document.getElementById("marqueeBorder").offsetHeight;
  // Get the width of the content we want to scroll
  contentWidth=marqueeDiv.offsetWidth;
  contentHeight=marqueeDiv.offsetHeight;
  // Start the ticker at 50 milliseconds per tick, adjust this to suit your preferences
  // Be warned, setting this lower has heavy impact on client-side CPU usage. Be gentle.
  myInterval = setInterval("scrollMarquee()",interval);
}

function scrollMarquee() {
  // Check position of the div, then shift it left by the set amount of pixels.
  if ((parseInt(marqueeDiv.style.top) > 0) && (holdCur == 0)) {
    marqueeDiv.style.top=parseInt(marqueeDiv.style.top)-pxpTick/2+"px";
  } else if (holdCur < holdMax) {
  holdCur += 1;
  } else if ((parseInt(marqueeDiv.style.top)>parseInt(contentHeight*-1))) {
  marqueeDiv.style.top=parseInt(marqueeDiv.style.top)-pxpTick/2+"px";
  } else {
    nextItem();
  }
}

startMarquee();
</script>

<div id="marqueeBorder">
  <div id="marqueeContent">
  </div>
</div>
