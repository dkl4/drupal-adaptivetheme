<?php
function adaptivetheme_three_25_25_50_panels_layouts() {
  $items['three_25_25_50'] = array(
    'title'    => t('Three column 25/25/50 (conditional stack)'),
    'category' => t('AT Responsive Panels - 3 column'),
    'icon'     => 'three_25_25_50.png',
    'theme'    => 'three_25_25_50',
    'admin css' => 'three_25_25_50.admin.css',
    'theme arguments' => array('id', 'content'),
    'regions' => array(
      'three_25_25_50_top'    => t('Top (conditional)'),
      'three_25_25_50_first'  => t('Left'),
      'three_25_25_50_second' => t('Center'),
      'three_25_25_50_third'  => t('Right'),
      'three_25_25_50_bottom' => t('Bottom (conditional)'),
    ),
  );
  return $items;
}