<?php
class CNavigation {
  public static function GenerateMenu($items) {
    $html = "<nav>\n";
    foreach($items as $item) {
      $html .= "<a href='{$item['url']}'>{$item['text']}</a>\n";
    }
    $html .= "</nav>\n";
    return $html;
  }
};
?>