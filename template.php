<?php
function THEMENAME_menu_link(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';

    $element['#attributes']['class'][] = 'menu-depth-' . $element['#original_link']['depth'];

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>";
}

function THEMENAME_preprocess_html(&$vars) {
  $viewport = array(
   '#tag' => 'meta',
   '#attributes' => array(
     'name' => 'viewport',
     'content' => 'width=device-width, initial-scale=1',
   ),
  );
  drupal_add_html_head($viewport, 'viewport');
}

function THEMENAME_aggregator_block_item($variables) {
    $result = '<a href="' . check_url($variables['item']->link) . '">' . check_plain($variables['item']->title) . "</a>\n";
    if (strpos($variables['item']->guid, "https://api.kocherga.club") === 0) {
        $result .= "<br>" . $variables['item']->description . "\n";
    }
    return $result;
}
?>
