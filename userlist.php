
				<?php
				require_once("connect.php");
				$query = "SELECT * FROM user";
				$rs = mysqli_query($con, $query);
				if ($rs) {
					while ($row = mysqli_fetch_array($rs)) {
					echo "<tr><td>" . $row['UserName'] . "</td><td>" . $row['Password'] . "</td></tr>";
					}
				}
				?>



