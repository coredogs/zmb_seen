<?php
/* 
 * This is the page content for the default (or home) page.
 */
?>
<p>There have been <?= $sightings ?> sightings.</p>

<p>A total of <?= $total_zombies ?> zombies have been seen.</p>

<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="d">
  <li><a href="index.php?add" data-ajax="false">Add a new sighting</a></li>
  <li><a href="index.php?list" data-ajax="false">List sightings</a></li>
</ul>
