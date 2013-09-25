<?php

abstract class Zmb_Seen_View extends View {
  /**
   * Renders a complete page, inserting header and content into the page template.
   * @param string $header Page header
   * @param string $content Page template
   */
  public function render_page($header, $content = '') {
    $data['page_header'] = $header;
    $data['page_content'] = $content;
    $this->output_template('page', $data);
  }
}
