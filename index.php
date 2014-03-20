<!-- Robert Clark CS50x edx winter 2014 with launchcode -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">

<link rel="stylesheet" type="text/css" href="slb.css">
<style type="text/css">
  table {margin:0px auto;}
  div, p { border:0px solid black; }
  table, td { border:0px solid red; }
	td {text-align:center;}
	.row {background-color:#f0f8ff;}
	.head {height:340px; overflow-x: hidden; overflow-y: scroll;}
  input:focus { background-color: LightCyan;}
  img{border:0;}
</style>

<title>speller.c Leader Board</title>
</head>
<body>
<div align="center">
<h2> speller.c Leader Board &middot; &middot; LaunchCode Edition <br>
     Harvard College's CS50x from <a href="http://edx.org">edX.org</a>
     winter 2014 with <a href="http://launchcodestl.com">LaunchCodeSTL.com</a>
		 </h2>
</div>
<form action="submit.php">
<input type="submit" value="submit your entry" style="font-size:20">
</form>

<div class="head" align="center">
<h3> all times in seconds </h3>
<table summary="leader board" style="width:80%">
<tr style="border:1px solid black;">
<th>id</th><th>name</th><th>total time</th><th>load time</th>
<th>check time</th><th>size time</th><th>unload time</th>
</tr>

<?php 

	require_once "helfun.php";
	
	// comment time
	$dbh = opentable();
	$loop = 0;	
	$result = mysql_query("SELECT * FROM leader_board ORDER BY total ASC");
	while($row = mysql_fetch_array($result))
	{ 
		
		if ($loop % 2 == 0)
		  echo " <tr class='row'> ";
		else
		  echo " <tr> ";	

		$id = sprintf("%04d", $row[id]);
		$to = sprintf("%0.2f", $row[total]);
		$ld = sprintf("%0.2f", $row[dload]);
		$ck = sprintf("%0.2f", $row[tcheck]);
		$sz = sprintf("%0.2f", $row[size]);
		$ul = sprintf("%0.2f", $row[unload]);
		echo"
    <td>",$id,"</td><td>",$row['name'],"</td><td>",$to,"</td>
    <td>",$ld,"</td><td>",$ck,"</td><td>",$sz,"</td><td>",$ul,"</td>
    </tr>";
		
		$loop++;
	}

  if ($dbh)
	  mysql_close($dbh);

 ?>
 
</table>
</div>
<p>
  <a href="http://validator.w3.org/check?uri=referer">
	<img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01
	    Transitional" height="31" width="88"></a>
  </p>
</body>
</html>
