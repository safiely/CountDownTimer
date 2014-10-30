<?php
$currenttime=date("h:i:s");
echo "current time is :-.$currenttime.\n";
$min=$_GET["min"];
$hour=$_GET["hour"];
echo "you have 2 minutes to fill the form";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Malware Security Intelligence Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap-cer.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">   
	
  </head>
<body onload="updateClock(); setInterval('updateClock()', 1000 )">
   
<!-- Your Form code starts here-->
    <div class="container">
	<br>
	<div class="row">
		<div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="well">
              <form action="validate.php" method="post" class="form-horizontal">
                <fieldset>
		<legend id="msgLegend" style="text-align:center;">Login</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"  name="b_user" id="b_user" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control" name="b_pass" id="b_pass" placeholder="Password">
		    </div>
                  </div>
		   <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      </br>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div></br>
	<div>
   <!-- Your Form code ends here-->


 <!-- Clock code starts here-->
	</div>
	<div>
		<span id ="clock">
		</span>
	</div>

<script type="text/javascript">
<!--

function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );
  var minlimit = '<?php global $min; echo $min; ?>';
  var hourlimit = '<?php global $hour; echo $hour; ?>';  
// Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
	
  // Update the time display
	if(currentMinutes>=minlimit||currentHours>hourlimit)
	{
		navigateToUrl("sorry.php");
	}

  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

// -->

function navigateToUrl(url) {
    var f = document.createElement("FORM");
    f.action = url;

    var indexQM = url.indexOf("?");
    if (indexQM>=0) {
        // the URL has parameters => convert them to hidden form inputs
        var params = url.substring(indexQM+1).split("&");
        for (var i=0; i<params.length; i++) {
            var keyValuePair = params[i].split("=");
            var input = document.createElement("INPUT");
            input.type="hidden";
            input.name  = keyValuePair[0];
            input.value = keyValuePair[1];
            f.appendChild(input);
        }
    }

    document.body.appendChild(f);
    f.submit();
}


</script>

 <!-- Clock code ends here-->

  </body>
</html>

