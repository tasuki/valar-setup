<h2>Dear Chromium, this page is not in Malay.</h2>
<?php

foreach (scandir("/etc/awstats") as $file) {
  if (preg_match("/^awstats\.(.*)\.conf$/", $file, $matches)) {
    $config = $matches[1];
    $month = date("mY");
    $content = file_get_contents("/var/lib/awstats/awstats$month.$config.txt");
    if (preg_match("/^TotalUnique (.*)\$/m", $content, $matches)) {
      $uniques = $matches[1];
    } else {
      $uniques = "unknown";
    }
    echo "<h3><a href='/awstats/?config=$config'>$config</a> " .
         "($uniques uniq in " . date('M') . ")</h3>";
  }
}
