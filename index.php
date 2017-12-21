<head>
    <style>
        #marqueeborder {
        color: #ffffff;
        background-color: #000000;
        font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;
        position:relative;
        height:40px;
        overflow:hidden;
        font-size: 1.5em;
        }
        
        #marqueecontent {
        position:absolute;
        left:0px;
        line-height:40px;
        white-space:nowrap;
        }
    </style>
</head>
<body>
    <script type="text/javascript">

    // Set init vars
    var holdmax=100;
    var holdcur=0;
    var interval = 20;
	var scrollspeed=2;
	var pxptick=scrollspeed;
    var infile = [];
    var infilecur = 0;
    var infilemax = 0;
    var done = 0;

    function loadfile(){
        <?php
         $local_file_open = file_get_contents("./data.txt");
         $local_file = explode("*", $local_file_open);
         ?>
         infile = <?php echo json_encode($local_file) ?>;
         infilecur = 0;
         infilemax = infile.length;
    }
    function getnextitem(){
        if ((infilecur >= infilemax) && (done != 1)) {
            location = location;
            done = 1;
            return;
        }
        if (done == 1)
        {
            return;
        }
        marqueediv=document.getElementById("marqueecontent");
        //marqueediv.innerHTML = ""+infile[infilecur][0]+" <img src=\""+infile[infilecur][1]+"\" style='height:30px; vertical-align: middle;' />  "+infile[infilecur][2];
        marqueediv.innerHTML = ""+infile[infilecur];
        marqueediv.style.left="24px";
        marqueediv.style.top=parseInt(document.getElementById("marqueeborder").offsetHeight*1)+"px";
        holdcur = 0;
        ++infilecur;
    }

	function startmarquee(){
        loadfile();
        getnextitem();
        // Make a shortcut referencing our div with the content we want to scroll
        marqueediv=document.getElementById("marqueecontent");
		// Get the total width of our available scroll area
		marqueewidth=document.getElementById("marqueeborder").offsetWidth;
        marqueeheight = document.getElementById("marqueeborder").offsetHeight;
		// Get the width of the content we want to scroll
		contentwidth=marqueediv.offsetWidth;
        contentheight=marqueediv.offsetHeight;
		// Start the ticker at 50 milliseconds per tick, adjust this to suit your preferences
		// Be warned, setting this lower has heavy impact on client-side CPU usage. Be gentle.
		setInterval("scrollmarquee()",interval);
	}


	function scrollmarquee(){
		// Check position of the div, then shift it left by the set amount of pixels.
        if ((parseInt(marqueediv.style.top) > 0) && (holdcur == 0)) {
            marqueediv.style.top=parseInt(marqueediv.style.top)-pxptick/2+"px";
        }
        else if (holdcur < holdmax)
            holdcur += 1;
        else if ((parseInt(marqueediv.style.top)>parseInt(contentheight*-1)))
            marqueediv.style.top=parseInt(marqueediv.style.top)-pxptick/2+"px";
        else {
            getnextitem();
        }
	}
	window.onload=startmarquee;
    </script>
    
    <div id="marqueeborder">
    <div id="marqueecontent">
    


    </div>
    </div>

</body>
