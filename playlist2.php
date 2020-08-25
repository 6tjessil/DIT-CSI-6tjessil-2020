<?php session_start(); 
	if(!isset($_SESSION["login_user"])){
		header ("location: index.php");
	} 
?>
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
	<div id = "your_library_content">
		<div class = "sidebar">
                 <h2>Playlists</h2>
                 <a href="your_library.php">Main</a>
                 <a href="playlist1.php">Playlist1</a>
                 <a style="color:blue;"href="playlist2.php">Playlist2</a>
		</div>
		<div class="image">
		image
		</div>
		<div class="playlist_details">
		<?php
                //creates a variable to store the sql query
                require_once("connect.php");
                $query = ("SELECT SEC_TO_TIME(SUM(s.duration)) as `TotalDuration`FROM song AS s");
            
                $result = mysqli_query($con,$query);
                while($output=mysqli_fetch_array($result))
                { 
                ?>
                        <?php echo "Total : ", $output["TotalDuration"]?>
                <?php
                }
                ?>  
		</div>
		<div class = "music_data_div">
			<div class="data">
				<table>
				<tr>
					<th>Title</th>
					<th>Artist</th>
					<th>Album</th>
					<th>Genre</th>
					<th>Duration</th>
					<th>Size</th>
				</tr>
				<?php
				
				$query = "SELECT s.title, ar.artist, al.album, GROUP_CONCAT(DISTINCT g.genre SEPARATOR ', ') AS 'Genre', RIGHT (SEC_TO_TIME(s.duration), 5) AS 'Duration',  s.size 
				FROM song AS s 
				JOIN artist AS ar ON s.artist_id = ar.artist_id 
				JOIN album AS al ON s.album_id = al.album_id
				JOIN song_to_genre AS sg ON s.song_id = sg.song_id
				JOIN genre AS g ON g.genre_id = sg.genre_id
                               	GROUP BY s.song_id
                                ORDER BY g.genre ASC, ar.artist ASC";
				$rs = mysqli_query($con, $query);
				if ($rs) {
					while ($row = mysqli_fetch_array($rs)) {
					echo "<tr><td>" . $row['title'] . "</td><td>" . $row['artist'] . "</td>
					<td>" . $row['album'] . "</td><td>" . $row['Genre'] . "</td><td>" . $row['Duration'] . "</td>
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