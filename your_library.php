<!--First Query-->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>TJessil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  require("nav.php")
  ?>
  <div id="queryheader">
    <h1>Cypher to Room</h1> 
  </div>
	<div class = "music_data_div">
		<div class="data">
			<table>
			<tr>
				<th>Cypher</th>
				<th>Room</th>
				<th>Room</th>
				<th>Room</th>
				<th>Room</th>
				<th>Room</th>
			</tr>
			<?php
			require_once("connect.php");
			$query = "SELECT *
						FROM teacher";
			$rs = mysqli_query($con, $query);
			if ($rs) {
				while ($row = mysqli_fetch_array($rs)) {
				echo "<tr><td>" . $row['cypher'] . "</td><td>" . $row['surname'] . "</td>
				<td>" . $row['christian'] . "</td><td>" . $row['form'] . "</td><td>" . $row['mentor'] . "</td>
				<td>" . $row['role_id'] . "</td></tr>";
				}
			}
			?>
			</table>
		</div>
	</div>
</body>

</html>