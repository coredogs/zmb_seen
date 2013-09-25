<?php
/*
 * Template for reporting a new sighting. 
 */
?>
<h2>Add a sighting</h2>
<p>
  <label for="number_zombies">How many zombies did you see?</label>
  <input type="text" name="number_zombies" id="number_zombies"/>
</p>
<p>
  <label for="where">Where did you see the zombies?</label>
  <input type="text" name="where" id="where"/>
</p>
<p>
  <a id="save" href="#" data-role="button">Save</a>
</p>
<p>
  <a id="back-button" href="#" data-rel="back" data-role="button" data-icon="arrow-l">Menu</a>
</p>
<script src="views/templates/add.js"></script>
