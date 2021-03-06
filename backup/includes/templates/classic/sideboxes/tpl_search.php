<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_search.php 4142 2006-08-15 04:32:54Z drbyte $
 */
  $content = "";
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
  $content .= zen_draw_form('quick_find', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get');


  if (strtolower(IMAGE_USE_CSS_BUTTONS) == 'yes') {
    $content .= "<p class='start'></p>";
    $content .= "<p class='form'>";
    $content .= zen_draw_input_field('keyword');
    $content .= "</p><p class='button'>";
    $content .= "<input type='image' src='../images/form_button.gif' value='Go' />";
    $content .= "</p><div style='clear:left;'></div>";
  } else {
    $content .= zen_draw_input_field('keyword', '', 'size="18" maxlength="100" style="width: ' . ($column_width-70) . 'px" value="' . HEADER_SEARCH_DEFAULT_TEXT . '" onfocus="if (this.value == \'' . HEADER_SEARCH_DEFAULT_TEXT . '\') this.value = \'\';" onblur="if (this.value == \'\') this.value = \'' . HEADER_SEARCH_DEFAULT_TEXT . '\';"') . '<input type="submit" value="' . HEADER_SEARCH_BUTTON . '" style="width: 30px" />';

// $content .= '<br /><a href="' . zen_href_link(FILENAME_ADVANCED_SEARCH) . '">' . BOX_SEARCH_ADVANCED_SEARCH . '</a>';
  }

  $content .= zen_draw_hidden_field('main_page',FILENAME_ADVANCED_SEARCH_RESULT);
  $content .= zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();
  $content .= "</form>";
  $content .= '</div>';
?>    

