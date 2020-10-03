<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Have The Dogs Been Fed?</title>
<meta name="description" content="Have The Dogs Been Fed?" />
<meta property="og:title" content="HTDBF?" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://wilkinsonfarm.org/dogs" />
<meta property="og:image" content="" />
<meta property="og:description" content="asking the important questions" />
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/images/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
  </label>
  <em></em>
</div>

<body>
	<table width="100%" height="60%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th></th>
			<th>Time Since Last Fed</th>
			<th></th>
		<tr>
			<td id="leftcell">Svedka</td>
			<td id="middlecell">
				<div class="countup" id="countup1">
					<span class="timeel days">00</span>
					<span class="timeel timeRefDays">days</span>
					<span class="timeel hours">00</span>
					<span class="timeel timeRefHours">hours</span>
					<span class="timeel minutes">00</span>
					<span class="timeel timeRefMinutes">minutes</span>
					<span class="timeel seconds">00</span>
					<span class="timeel timeRefSeconds">seconds</span>
				</div>
			</td>
			<td id="rightcell">
				<form action="writedb.php" method="post">
					<input id="id" type="hidden" name="id" value="1">
					<input id="submit" type="submit" name="submit" value="update feed time" >
				</form>
			</td>
		</tr>
		<tr>
			<td id="leftcell">Sangria</td>
			<td id="middlecell">
				<div class="countup" id="countup2">
					<span class="timeel days">00</span>
					<span class="timeel timeRefDays">days</span>
					<span class="timeel hours">00</span>
					<span class="timeel timeRefHours">hours</span>
					<span class="timeel minutes">00</span>
					<span class="timeel timeRefMinutes">minutes</span>
					<span class="timeel seconds">00</span>
					<span class="timeel timeRefSeconds">seconds</span>
				</div>
			</td>
			<td id="rightcell">
				<form action="writedb.php" method="post">
					<input id="id" type="hidden" name="id" value="2">
					<input id="submit" type="submit" name="submit" value="update feed time" >
				</form>
			</td>
		</tr>
		<tr>
			<td id="leftcell">Islay</td>
			<td id="middlecell">
				<div class="countup" id="countup3">
					<span class="timeel days">00</span>
					<span class="timeel timeRefDays">days</span>
					<span class="timeel hours">00</span>
					<span class="timeel timeRefHours">hours</span>
					<span class="timeel minutes">00</span>
					<span class="timeel timeRefMinutes">minutes</span>
					<span class="timeel seconds">00</span>
					<span class="timeel timeRefSeconds">seconds</span>
				</div>
			</td>
			<td id="rightcell">
				<form action="writedb.php" method="post">
					<input id="id" type="hidden" name="id" value="3">
					<input id="submit" type="submit" name="submit" value="update feed time" >
				</form>
			</td>
		</tr>
	</table>
</body>

<script type="text/javascript">
	function wrapper() {
		function getData() {
				var jsonData = $.ajax({
					url: "readdb.php",
					dataType: "json",
					async: false
				}).responseText;
				jsonData = JSON.parse(jsonData);
				console.log(jsonData);
				data1 = jsonData[0]["time"];
				data2 = jsonData[1]["time"];
				data3 = jsonData[2]["time"];
		};
		
		var inst = setInterval(update, 1000);
		getData();

		countUpFromTime(data1, 'countup1');
		countUpFromTime(data2, 'countup2');
		countUpFromTime(data3, 'countup3');

		function update() {
			getData();
			
			countUpFromTime(data1, 'countup1');
			countUpFromTime(data2, 'countup2');
			countUpFromTime(data3, 'countup3');
		};
	};
	var elem1 = document.getElementById("dog1");
	var elem2 = document.getElementById("dog2");
	var elem3 = document.getElementById("dog3");
	wrapper();

	function countUpFromTime(countFrom, id) {
		countFrom = new Date(countFrom).getTime();
		var now = new Date(),
			countFrom = new Date(countFrom),
			timeDifference = (now - countFrom);

		var secondsInADay = 60 * 60 * 1000 * 24,
			secondsInAHour = 60 * 60 * 1000;

		days = Math.floor(timeDifference / (secondsInADay) * 1);
		hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour) * 1);
		mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000) * 1);
		secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000 * 1);

		var idEl = document.getElementById(id);
		idEl.getElementsByClassName('days')[0].innerHTML = days;
		idEl.getElementsByClassName('hours')[0].innerHTML = hours;
		idEl.getElementsByClassName('minutes')[0].innerHTML = mins;
		idEl.getElementsByClassName('seconds')[0].innerHTML = secs;

		clearTimeout(countUpFromTime.interval);
		//countUpFromTime.interval = setTimeout(function(){ countUpFromTime(countFrom, id); }, 1000);
}

</script>

<script src="night.js"></script>