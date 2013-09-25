<?php
/*
 * View for the home page. Uses the template default.php, inserted into
 * the page template.
 */
require_once $app_file_root . '/views/zmb_seen.php';

class Default_View extends Zmb_Seen_View {
  /**
   * Render the home page.
   * @param type $sightings Number of sightings. The default values are needed
   * to match method signatures with the parent. 
   */
  public function render($sightings = 666, $total_zombies = 666) {
    //Instantiate the home page content template.
    $data['sightings'] = $sightings;
    $data['total_zombies'] = $total_zombies;
    $page_content = $this->instantiate_template('default', $data);
    //Output the full page.
    $this->render_page('Zombies!', $page_content);
  }
}
