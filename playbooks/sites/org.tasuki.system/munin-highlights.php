<html>
<style>
img { vertical-align: top; }
</style>

<?php
$properties = array(
  'cpu',
  'memory',
  'df',
  'fw_packets',
  'uptime',
);

foreach ($properties as $property) {
  echo "<p>";
  echo "<a href=\"/munin/localdomain/localhost.localdomain/$property.html\">";
  echo "<img src=\"/munin/localdomain/localhost.localdomain/$property-year.png\"/>";
  echo "<img src=\"/munin/localdomain/localhost.localdomain/$property-month.png\"/>";
  echo "<img src=\"/munin/localdomain/localhost.localdomain/$property-week.png\"/>";
  echo "</p>";
}
?>

</html>
