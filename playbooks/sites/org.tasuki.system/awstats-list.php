<h2>Dear Chromium, this page is not in Malay.</h2>
<?php

foreach (scandir("/etc/awstats") as $file) {
  if (preg_match("/^awstats\.(.*)\.conf$/", $file, $matches)) {
    $config = $matches[1];
    echo "<h3><a href='/awstats/?config=$config'>$config</a></h3>";
  }
}
