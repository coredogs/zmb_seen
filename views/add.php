<?php

require_once $app_file_root . '/views/zmb_seen.php';

class Add_View extends Zmb_Seen_View {
  public function render() {
    //Instantiate the add page content template.
    $page_content = $this->instantiate_template('add');
    $this->render_page('Add a sighting', $page_content);
  }
}
