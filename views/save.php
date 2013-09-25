<?php

require_once $app_file_root . '/views/zmb_seen.php';

class Save_View extends Zmb_Seen_View {
  public function render() {
    $page_content = $this->instantiate_template('save');
    $this->render_page('Thank you', $page_content);
  }
}
