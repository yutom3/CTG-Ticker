<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<head>
  <title>
    CTG Money Raised
  </title>
  <link href = "Resources/Images/CTG Logo.png" rel="icon" type="image/png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="Resources/JS/odometer.js"></script> <!-- Odometer JS (Copyright (c) 2013 HubSpot, Inc.)-->
  <link rel="stylesheet" href="Resources/CSS/odometer-theme-default.css"> <!-- Odometer Default Theme CSS -->
  <style>
  body {
    background-color: black;
    color: white;
  }
  .odometer .odometer-inside:before {
    content: "$";
  }
  .odometer {
    width: 100%;
    font-size: 3em;
    text-align: center;
  }
  .odometer-digit {
    top: -0.25em;
  }
  </style>
</head>
<body>
  <!-- Money Overlay -->
  <br>
  <div id="odometer" class="odometer">0</div>
  <br><br>
  <script type="text/javascript">
    var loadHelper;
    $(document).ready(function() {
      loadMoney();
    });
    function loadMoney() {
      $.get("Resources/PHP/CTG_MoneyRaised.php", function (data) {
        $("#odometer").html(data);
      });
      loadMoneyDelay();
    }
    function loadMoneyDelay() {
      loadHelper = setTimeout(loadMoney, 30000);
    }
  </script>
</body>
