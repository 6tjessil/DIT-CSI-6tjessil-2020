<?php session_start(); //This ensures that a user can only view this page if they are logged in
	if(!isset($_SESSION["login_user"])){
		header ("location: index.php");
	} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Graham's Music</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  require("nav.php")
  ?>
	<div id = "your_library_content"> <!--Links for the sidebar goes in here-->
		<div class = "sidebar">
                 <h2>Playlists</h2>
                 <a style="color:#274196;"href="your_library.php">Main</a>
                 <a href="playlist1.php">Title</a>
                 <a href="playlist2.php">Genre</a>
		</div>
		<div class="image">
		<img src='images/image_3.jpg'>
		</div>
		<div class="playlist_details">
                This is a custom playlist containing all your uploaded songs
                <br>
		<?php
                //This is running the total duration query
                require_once("connect.php");
                $query = ("SELECT SEC_TO_TIME(SUM(s.duration)) as `TotalDuration`FROM song AS s");
            
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
				<table>
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
				//This is running a query that displays all data ordered by song_id
				$query = "SELECT s.title, ar.artist, al.album, GROUP_CONCAT(DISTINCT g.genre SEPARATOR ', ') AS 'Genre', s.duration,  s.size 
				FROM song AS s 
				JOIN artist AS ar ON s.artist_id = ar.artist_id 
				JOIN album AS al ON s.album_id = al.album_id
				JOIN song_to_genre AS sg ON s.song_id = sg.song_id
				JOIN genre AS g ON g.genre_id = sg.genre_id 
				GROUP BY s.song_ID";
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
<script src="jquery-3.5.1.min.js"></script>
<script src="script.js"></script>


</html>