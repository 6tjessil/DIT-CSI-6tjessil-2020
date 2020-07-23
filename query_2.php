<!--Second Query-->
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
    <h1>Cypher to Room - Cypher ASC</h1>
  </div>
  <div class="content">
    <table>
      <tr>
        <th>Cypher</th>
        <th>Surname</th>
        <th>Christian</th>
        <th>Room</th>
      </tr>
      <?php
      require_once("connect.php");

      $query = "SELECT t.cypher,t.surname, t.christian, r.room
                    FROM teacher AS t
                    JOIN teacher_to_room tr ON t.cypher = tr.cypher
                    JOIN room r ON r.room_id = tr.room_id 
                    ORDER BY t.cypher ASC";

      $rs = mysqli_query($con, $query);
      if ($rs) {
        while ($row = mysqli_fetch_array($rs)) {
          echo "<tr><td>" . $row['cypher'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['christian'] . 
          "</td><td>" . $row['room'] . "</td><td>" . "</td></tr>";
        }
      }
      ?>
    </table>
  </div>
</body>

</html>