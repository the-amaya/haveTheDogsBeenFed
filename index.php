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
<script type="text/javascript">
	function getData() {
				var jsonData = $.ajax({
					url: "readdb.php",
					dataType: "json",
					async: false
				}).responseText;
				console.log(jsonData);
				data = jsonData[0][1];
				console.log(data)
	}


	var inst = setInterval(update, 1000);
	var elem = document.getElementById("id-1");


	function update() {
		getData()
		elem.innerHTML = data;
	}

</script>
</head>

<div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
  </label>
  <em></em>
</div>

<body>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th></th>
			<th>last fed</th>
			<th></th>
		<tr>
			<td id="leftcell">Svedka</td>
			<td id="middlecell"><div id="id-1"></div></td>
			<td id="rightcell">
				<form action="writedb.php" method="post">
					<input id="id" type="hidden" name="id" value="1">
					<input id="submit" type="submit" name="submit" value="update feed time" >
				</form>
			</td>
		</tr>
		<tr>
			<td id="leftcell">Sangria</td>
			<td id="middlecell">(read last time fed from database using php)</td>
			<td id="rightcell">
				<form action="writedb.php" method="post">
					<input id="id" type="hidden" name="id" value="2">
					<input id="submit" type="submit" name="submit" value="update feed time" >
				</form>
			</td>
		</tr>
		<tr>
			<td id="leftcell">Islay</td>
			<td id="middlecell">(read last time fed from database using php)</td>
			<td id="rightcell">
				<form action="writedb.php" method="post">
					<input id="id" type="hidden" name="id" value="3">
					<input id="submit" type="submit" name="submit" value="update feed time" >
				</form>
			</td>
		</tr>
	</table>
</body>

<script src="night.js"></script>