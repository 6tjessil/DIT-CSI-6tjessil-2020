<?php session_start(); 
	if(!isset($_SESSION["login_user"])){
		header ("location: index.php");
	} 
?>
<!DOCTYPE html>
<html lang="en"> <!--This file is used to run and display the results of the first query-->

<head>
  <title>Graham's Music</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  require("nav.php")
  ?>
	<div id = "your_library_content">
		<div class = "sidebar"> <!--Below are the links used in the sidebar-->
                 <h2>Playlists</h2>
                 <a href ="your_library.php">Main</a>
                 <a style="color:#274196;"href="playlist1.php">Title</a>
                 <a href="playlist2.php">Genre</a>
		</div>
		<div class="image">
		<img src='images/image_1.jpg'>
		</div>
		<div class="playlist_details">
                Songs sorted by title and then by artists
                <br>
		<?php
                require_once("connect.php");
                $query = ("SELECT SEC_TO_TIME(SUM(s.duration)) as `TotalDuration`FROM song AS s"); //This is the total duration query
            
                $result = mysqli_query($con,$query);
                while($output=mysqli_fetch_array($result))
                { 
                ?>
                        <?php echo "Total Duration: ", $output["TotalDuration"]?>
                <?php
                }
                ?>  
		</div>
		<div class = "music_data_div">
			<div class="data">
                                <table> <!--HTML tables are used to structure the way the data is displayed-->
				<tr>
					<th></th>
                                        <th>Title</th>
					<th>Artist</th>
					<th>Album</th>
					<th>Genre</th>
					<th>Duration</th>
					<th>Size</th>
				</tr>
				<?php
				//Below is a query that orders the data by title then artist
				$query = "SELECT s.title, ar.artist, al.album, GROUP_CONCAT(DISTINCT g.genre SEPARATOR ', ') AS 'Genre', s.duration,  s.size 
				FROM song AS s 
				JOIN artist AS ar ON s.artist_id = ar.artist_id 
				JOIN album AS al ON s.album_id = al.album_id
				JOIN song_to_genre AS sg ON s.song_id = sg.song_id
				JOIN genre AS g ON g.genre_id = sg.genre_id
				GROUP BY s.song_id
                                ORDER BY s.title DESC, ar.artist DESC";
				$rs = mysqli_query($con, $query);
				if ($rs) { 
					while ($row = mysqli_fetch_array($rs)) {
					echo "<tr><td><img id='playbutton' src='images/play-button.png'></td><td>" . $row['title'] . "</td>
					<td>" . $row['artist'] . "</td><td>" . $row['album'] . "</td><td>" . $row['Genre'] . "</td><td>" . $row['duration'] . "</td>
					<td>" . $row['size'] . "</td></tr>";
					}
				}
				?>
				</table>
			</div>
		</div>
	</div>
</body>
<script src="script.js"></script>
</html>