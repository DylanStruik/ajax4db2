<?php

$con = mysqli_connect('localhost', 'root', '', 'world');

if ($_GET["mode"] == "fullinfo") {
    $id = $_GET['id'];
    $id = preg_replace("/[^0-9]/", "",$id);

    $result = mysqli_query($con, "SELECT * FROM city WHERE id='$id'"); ?>
<?php
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      ?>
        <h2><?php echo $row["Name"]; ?></h2>
        <h6>Code: <?php echo $row["CountryCode"]; ?></h6>
        <h6>Provincie: <?php echo $row["District"]; ?></h6>
        <h6>Populatie: <?php echo $row["Population"]; ?></h6>

<?php
  } ?>


<?php
} if ($_GET["mode"] == "list") {
  $searchInput = $_GET["query"];
  $searchInput = trim($searchInput);
  $searchInput = strip_tags($searchInput);
  $searchInput = mysqli_real_escape_string($con, $searchInput);
      $result = mysqli_query($con, "SELECT * FROM city WHERE Name LIKE '%$searchInput%' ORDER BY Name ASC");
      $rowCount = mysqli_num_rows($result);
      if ($rowCount == 0) {
          echo "<h6>Geen resultaat!</h6>";
      } else {
          ?>
    <table class="u-full-width">
        <tr>
            <th>Naam</th>
        </tr>
<?php
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      ?>
      <tr>
          <td onClick="getCountryData('<?php echo $row['ID']; ?>')"><?php echo $row["Name"]; ?></td>
      </tr>
<?php
  }
      } ?>
  </table>
<?php
  } ?>
