<?php // $Id$
// adaptivethemes.com

/**
 * @file theme-settings.php
 */

// Initialize theme settings.
include_once(drupal_get_path('theme', 'adaptivetheme') .'/inc/template.theme-settings.inc');

/**
* Implementation of themehook_settings() function.
*
* @param $saved_settings
*   An array of saved settings for this theme.
* @return
*   A form array.
*/
function adaptivetheme_settings($saved_settings, $subtheme_defaults = array()) {

  global $theme_info;

  // Get the default values from the .info file.
  $defaults = adaptivetheme_theme_get_default_settings('adaptivetheme');

  // Allow a subtheme to override the default values.
  $defaults = array_merge($defaults, $subtheme_defaults);

  // Merge the saved variables and their default values
  $settings = array_merge($defaults, $saved_settings);

  // Export theme settings
  $exportable_settings = array (
    'skip_navigation_display'           => $settings['skip_navigation_display'],
    'breadcrumb_display'                => $settings['breadcrumb_display'],
    'breadcrumb_separator'              => $settings['breadcrumb_separator'],
    'breadcrumb_home'                   => $settings['breadcrumb_home'],
    'display_search_form_label'         => $settings['display_search_form_label'],
    'search_snippet'                    => $settings['search_snippet'],
    'search_info_type'                  => $settings['search_info_type'],
    'search_info_user'                  => $settings['search_info_user'],
    'search_info_date'                  => $settings['search_info_date'],
    'search_info_comment'               => $settings['search_info_comment'],
    'search_info_upload'                => $settings['search_info_upload'],
    'search_info_separator'             => $settings['search_info_separator'],
    'primary_links_tree'                => $settings['primary_links_tree'],
    'secondary_links_tree'              => $settings['secondary_links_tree'],
    'rebuild_registry'                  => $settings['rebuild_registry'],
    'show_theme_info'                   => $settings['show_theme_info'],
    'cleanup_classes_section'           => $settings['cleanup_classes_section'],
    'cleanup_classes_front'             => $settings['cleanup_classes_front'],
    'cleanup_classes_user_status'       => $settings['cleanup_classes_user_status'],
    'cleanup_classes_normal_path'       => $settings['cleanup_classes_normal_path'],
    'cleanup_classes_node_type'         => $settings['cleanup_classes_node_type'],
    'cleanup_classes_add_edit_delete'   => $settings['cleanup_classes_add_edit_delete'],
    'cleanup_classes_language'          => $settings['cleanup_classes_language'],
    'cleanup_article_id'                => $settings['cleanup_article_id'],
    'cleanup_article_classes_promote'   => $settings['cleanup_article_classes_promote'],
    'cleanup_article_classes_sticky'    => $settings['cleanup_article_classes_sticky'],
    'cleanup_article_classes_teaser'    => $settings['cleanup_article_classes_teaser'],
    'cleanup_article_classes_preview'   => $settings['cleanup_article_classes_preview'],
    'cleanup_article_classes_type'      => $settings['cleanup_article_classes_type'],
    'cleanup_article_classes_language'  => $settings['cleanup_article_classes_language'],
    'cleanup_comment_anonymous'         => $settings['cleanup_comment_anonymous'],
    'cleanup_comment_article_author'    => $settings['cleanup_comment_article_author'],
    'cleanup_comment_by_viewer'         => $settings['cleanup_comment_by_viewer'],
    'cleanup_comment_new'               => $settings['cleanup_comment_new'],
    'cleanup_comment_zebra'             => $settings['cleanup_comment_zebra'],
    'cleanup_comment_wrapper_type'      => $settings['cleanup_comment_wrapper_type'],
    'cleanup_block_block_module_delta'  => $settings['cleanup_block_block_module_delta'],
    'cleanup_block_classes_module'      => $settings['cleanup_block_classes_module'],
    'cleanup_block_classes_zebra'       => $settings['cleanup_block_classes_zebra'],
    'cleanup_block_classes_region'      => $settings['cleanup_block_classes_region'],
    'cleanup_block_classes_count'       => $settings['cleanup_block_classes_count'],
    'cleanup_menu_menu_class'           => $settings['cleanup_menu_menu_class'],
    'cleanup_menu_leaf_class'           => $settings['cleanup_menu_leaf_class'],
    'cleanup_menu_first_last_classes'   => $settings['cleanup_menu_first_last_classes'],
    'cleanup_menu_active_classes'       => $settings['cleanup_menu_active_classes'],
    'cleanup_menu_title_class'          => $settings['cleanup_menu_title_class'],
    'cleanup_links_type_class'          => $settings['cleanup_links_type_class'],
    'cleanup_links_active_classes'      => $settings['cleanup_links_active_classes'],
    'cleanup_links_first_last_classes'  => $settings['cleanup_links_first_last_classes'],
    'cleanup_item_list_zebra'           => $settings['cleanup_item_list_zebra'],
    'cleanup_item_list_first_last'      => $settings['cleanup_item_list_first_last'],
    'cleanup_views_css_name'            => $settings['cleanup_views_css_name'],
    'cleanup_views_view_name'           => $settings['cleanup_views_view_name'],
    'cleanup_views_display_id'          => $settings['cleanup_views_display_id'],
    'cleanup_views_dom_id'              => $settings['cleanup_views_dom_id'],
    'cleanup_views_unformatted'         => $settings['cleanup_views_unformatted'],
    'cleanup_views_item_list'           => $settings['cleanup_views_item_list'],
    'cleanup_fields_type'               => $settings['cleanup_fields_type'],
    'cleanup_fields_name'               => $settings['cleanup_fields_name'],
    'cleanup_fields_zebra'              => $settings['cleanup_fields_zebra'],
    'cleanup_headings_title_class'      => $settings['cleanup_headings_title_class'],
    'cleanup_headings_namespaced_class' => $settings['cleanup_headings_namespaced_class'],
    'links_add_span_elements'           => $settings['links_add_span_elements'],
    'at_user_menu'                      => $settings['at_user_menu'],
    'block_edit_links'                  => $settings['block_edit_links'],
    'at_admin_hide_help'                => $settings['at_admin_hide_help'],
    'layout_method'                     => $settings['layout_method'],
    'layout_width'                      => $settings['layout_width'],
    'layout_sidebar_first_width'        => $settings['layout_sidebar_first_width'],
    'layout_sidebar_last_width'         => $settings['layout_sidebar_last_width'],
    'layout_enable_settings'            => $settings['layout_enable_settings'],
    'layout_enable_width'               => $settings['layout_enable_width'],
    'layout_enable_sidebars'            => $settings['layout_enable_sidebars'],
    'layout_enable_method'              => $settings['layout_enable_method'],
    'layout_enable_frontpage'           => $settings['layout_enable_frontpage'],
    'equal_heights_sidebars'            => $settings['equal_heights_sidebars'],
    'equal_heights_blocks'              => $settings['equal_heights_blocks'],
    'equal_heights_gpanels'             => $settings['equal_heights_gpanels'],
    'horizontal_login_block'            => $settings['horizontal_login_block'],
    'horizontal_login_block_overlabel'  => $settings['horizontal_login_block_overlabel'],
    'horizontal_login_block_enable'     => $settings['horizontal_login_block_enable'],
    'style_schemes'                     => $settings['style_schemes'],
    'style_enable_schemes'              => $settings['style_enable_schemes'],
  );
  // Output key value pairs formatted as settings
  foreach($exportable_settings as $key => $value) {
  	$value = filter_xss($value);
  	$output .= "settings[$key]=\"$value\"\n";
  }
  $exports = $output;

  // Create the form using Forms API: http://api.drupal.org/api/6
  // Layout settings
  $form['layout'] = array(
    '#type' => 'fieldset',
    '#title' => t('Layout'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  if ($settings['layout_enable_settings'] == 'on') {
    $image_path = drupal_get_path('theme', 'adaptivetheme') .'/css/core-images';
    $form['layout']['page_layout'] = array(
      '#type' => 'fieldset',
      '#title' => t('Page Layout'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => t('Use these settings to customize the layout of your theme. These settings match with the Skinr block width settings - so you can build complex grid like layouts within sidebars and other regions.'),
    );
    if ($settings['layout_enable_width'] == 'on') {
      $form['layout']['page_layout']['layout_width'] = array(
        '#title' => t('Page width'),
        '#type' => 'select',
        '#prefix' => '<div class="page-width">',
        '#suffix' => '</div>',
        '#default_value' => $settings['layout_width'],
        '#options' => array(
          '720px' => t('720px'),
          '780px' => t('780px'),
          '840px' => t('840px'),
          '900px' => t('900px'),
          '960px' => t('960px'),
          '1020px' => t('1020px'),
          '1080px' => t('1080px'),
          '1140px' => t('1140px'),
          '1200px' => t('1200px'),
          '1260px' => t('1260px'),
          '75%' => t('75% Fluid'),
          '80%' => t('80% Fluid'),
          '85%' => t('85% Fluid'),
          '90%' => t('90% Fluid'),
          '95%' => t('95% Fluid'),
          '100%' => t('100% Fluid'),
        ),
        '#attributes' => array('class' => 'field-layout-width'),
      );
    } // endif width
    if ($settings['layout_enable_sidebars'] == 'on') {
      $form['layout']['page_layout']['layout_sidebar_first_width'] = array(
        '#type' => 'select',
        '#title' => t('Sidebar first width'),
        '#prefix' => '<div class="sidebar-width"><div class="sidebar-width-left">',
        '#suffix' => '</div>',
        '#default_value' => $settings['layout_sidebar_first_width'],
        '#options' => array(
          '60' => t('60px'),
          '120' => t('120px'),
          '160' => t('160px'),
          '180' => t('180px'),
          '240' => t('240px'),
          '300' => t('300px'),
          '320' => t('320px'),
          '360' => t('360px'),
          '420' => t('420px'),
          '480' => t('480px'),
          '540' => t('540px'),
          '600' => t('600px'),
          '660' => t('660px'),
          '720' => t('720px'),
          '780' => t('780px'),
          '840' => t('840px'),
          '900' => t('900px'),
          '960' => t('960px'),
        ),
        '#attributes' => array('class' => 'sidebar-width-select'),
      );
      $form['layout']['page_layout']['layout_sidebar_last_width'] = array(
        '#type' => 'select',
        '#title' => t('Sidebar last width'),
        '#prefix' => '<div class="sidebar-width-right">',
        '#suffix' => '</div></div>',
        '#default_value' => $settings['layout_sidebar_last_width'],
        '#options' => array(
          '60' => t('60px'),
          '120' => t('120px'),
          '160' => t('160px'),
          '180' => t('180px'),
          '240' => t('240px'),
          '300' => t('300px'),
          '320' => t('320px'),
          '360' => t('360px'),
          '420' => t('420px'),
          '480' => t('480px'),
          '540' => t('540px'),
          '600' => t('600px'),
          '660' => t('660px'),
          '720' => t('720px'),
          '780' => t('780px'),
          '840' => t('840px'),
          '900' => t('900px'),
          '960' => t('960px'),
        ),
        '#attributes' => array('class' => 'sidebar-width-select'),
      );
    } //endif layout sidebars
    if ($settings['layout_enable_method'] == 'on') {
      $form['layout']['page_layout']['layout_method'] = array(
        '#title' => t('Sidebar layout'),
        '#type' => 'radios',
        '#prefix' => '<div class="layout-method">',
        '#suffix' => '</div>',
        '#default_value' => $settings['layout_method'],
        '#options' => array(
          '0' => t('<strong>Layout #1</strong>') . ' ' . t('<span class="layout-type">Standard three column layout (left - content - right)</span>'),
          '1' => t('<strong>Layout #2</strong>') . ' ' . t('<span class="layout-type">Two columns on the right (content - left - right)</span>'),
          '2' => t('<strong>Layout #3</strong>') . ' ' . t('<span class="layout-type">Two columns on the left (left - right - content)</span>'),
        ),
       '#attributes' => array('class' => 'layouts'),
      );
      $form['layout']['page_layout']['layout_enable_settings'] = array(
        '#type' => 'hidden',
        '#value' => $settings['layout_enable_settings'],
      );
    } // endif layout method
  } // endif layout settings
  // Equal heights settings
  $form['layout']['equal_heights'] = array(
    '#type' => 'fieldset',
    '#title' => t('Equal Heights'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#description'   => t('These settings allow you to set the sidebars and/or region blocks to be equal height.'),
  );
  // Equal height sidebars
  $form['layout']['equal_heights']['equal_heights_sidebars'] = array(
    '#type' => 'checkbox',
    '#title' => t('Equal Height Sidebars'),
    '#default_value' => $settings['equal_heights_sidebars'],
    '#description'   => t('This setting will make the sidebars and the main content column equal to the height of the tallest column.'),
  );
  // Equal height gpanels
  $form['layout']['equal_heights']['equal_heights_gpanels'] = array(
    '#type' => 'checkbox',
    '#title' => t('Equal Height Gpanels'),
    '#default_value' => $settings['equal_heights_gpanels'],
    '#description'   => t('This will make all Gpanel blocks equal to the height of the tallest block in any Gpanel, regardless of which Gpanel the blocks are in. Good for creating a grid type block layout, however it could be too generic if you have more than one Gpanel active in the page.'),
  );
  // Equal height blocks per region
  $equalized_blocks = array(
    'leaderboard' => t('Leaderboard region'),
    'header' => t('Header region'),
    'secondary-content' => t('Secondary Content region'),
    'content-top' => t('Content Top region'),
    'content-bottom' => t('Content Bottom region'),
    'tertiary-content' => t('Tertiary Content region'),
    'footer' => t('Footer region'),
  );
  $form['layout']['equal_heights']['equal_heights_blocks'] = array(
    '#type' => 'fieldset',
    '#title' => t('Equal Height Blocks'),
  );
  $form['layout']['equal_heights']['equal_heights_blocks'] += array(
    '#prefix' => '<div id="div-equalize-collapse">',
    '#suffix' => '</div>',
    '#description' => t('<p>Equal height blocks only makes sense for blocks aligned horizontally so do not apply to sidebars. The equal height settings work well in conjunction with the Skinr block layout classes.</p>'),
  );
  foreach ($equalized_blocks as $name => $title) {
    $form['layout']['equal_heights']['equal_heights_blocks']['equalize_'. $name] = array(
      '#type' => 'checkbox',
      '#title' => $title,
      '#default_value' => $settings['equalize_'. $name],
    );
  }
  // Display Settings
  $form['display_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Display'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // Skip Navigation
  $form['display_settings']['skip_navigation'] = array(
    '#type' => 'fieldset',
    '#title' => t('Skip Navigation'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['display_settings']['skip_navigation']['skip_navigation_display'] = array(
    '#type' => 'radios',
    '#title'  => t('Modify the display of the skip navigation'),
    '#default_value' => $settings['skip_navigation_display'],
    '#options' => array(
      'show' => t('Show skip navigation'),
      'focus' => t('Show skip navigation when in focus, otherwise is hidden'),
      'hide' => t('Hide skip navigation'),
    ),
  );
  // Breadcrumbs
  $form['display_settings']['breadcrumb'] = array(
    '#type' => 'fieldset',
    '#title' => t('Breadcrumb'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['display_settings']['breadcrumb']['breadcrumb_display'] = array(
    '#type' => 'select',
    '#title' => t('Display breadcrumb'),
    '#default_value' => $settings['breadcrumb_display'],
    '#options' => array(
      'yes' => t('Yes'),
      'no' => t('No'),
      'admin' => t('Only in the admin section'),
    ),
  );
  $form['display_settings']['breadcrumb']['breadcrumb_separator'] = array(
    '#type'  => 'textfield',
    '#title' => t('Breadcrumb separator'),
    '#description' => t('Text only. Dont forget to include spaces.'),
    '#default_value' => $settings['breadcrumb_separator'],
    '#size' => 8,
    '#maxlength' => 10,
    '#prefix' => '<div id="div-breadcrumb-collapse">',
  );
  $form['display_settings']['breadcrumb']['breadcrumb_home'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show the home page link in breadcrumbs'),
    '#default_value' => $settings['breadcrumb_home'],
    '#suffix' => '</div>',
  );
  // Search Settings
  $form['display_settings']['search'] = array(
    '#type' => 'fieldset',
    '#title' => t('Search'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // Search forms
  $form['display_settings']['search']['search_form'] = array(
    '#type' => 'fieldset',
    '#title' => t('Search forms'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['display_settings']['search']['search_form']['display_search_form_label'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display the search form label <em>"Search this site"</em>'),
    '#default_value' => $settings['display_search_form_label'],
  );
  // Search results
  $form['display_settings']['search']['search_results'] = array(
    '#type' => 'fieldset',
    '#title' => t('Search results'),
    '#description' => t('What additional information should be displayed in your search results?'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['display_settings']['search']['search_results']['search_snippet'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display text snippet'),
    '#default_value' => $settings['search_snippet'],
  );
  $form['display_settings']['search']['search_results']['search_info_type'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display content type'),
    '#default_value' => $settings['search_info_type'],
  );
  $form['display_settings']['search']['search_results']['search_info_user'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display author name'),
    '#default_value' => $settings['search_info_user'],
  );
  $form['display_settings']['search']['search_results']['search_info_date'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display posted date'),
    '#default_value' => $settings['search_info_date'],
  );
  $form['display_settings']['search']['search_results']['search_info_comment'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display comment count'),
    '#default_value' => $settings['search_info_comment'],
  );
  $form['display_settings']['search']['search_results']['search_info_upload'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display attachment count'),
    '#default_value' => $settings['search_info_upload'],
  );
  // Search_info_separator
  $form['display_settings']['search']['search_results']['search_info_separator'] = array(
    '#type' => 'textfield',
    '#title' => t('Search info separator'),
    '#description' => t('Modify the separator. The default is a hypen with a space before and after.'),
    '#default_value' => $settings['search_info_separator'],
    '#size' => 8,
    '#maxlength' => 10,
  );
  // Login block
  if ($settings['slider_login_block_enable'] == 'on' || $settings['horizontal_login_block_enable'] == 'on') {
    $form['display_settings']['login_block'] = array(
      '#type' => 'fieldset',
      '#title' => t('Login Block'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    // Horizonatal login block
    if ($settings['horizontal_login_block_enable'] == 'on') {
      $form['display_settings']['login_block']['horizontal_login_block'] = array(
        '#type' => 'checkbox',
        '#title' => t('Horizontal Login Block'),
        '#default_value' => $settings['horizontal_login_block'],
        '#description' => t('Checking this setting will enable a horizontal style login block (all elements on one line). Note that if you are using OpenID this does not work well and you will need a more sophistocated approach than can be provided here.'),
      );
    } // endif horizontal block settings
    // Slider login block
    if ($settings['slider_login_block_enable'] == 'on') {
      $form['display_settings']['login_block']['slider_login_block'] = array(
        '#type' => 'checkbox',
        '#title' => t('Sliding Login Block'),
        '#default_value' => $settings['slider_login_block'],
        '#description' => t('Checking this setting will enable a Sliding style login block - the block will collapse and provide a toggle link to open and close the block (Twitter Style).'),
      );
    } // endif slider block settings
  }
  // Admin settings
  $form['admin_settings']['administration'] = array(
    '#type' => 'fieldset',
    '#title' => t('Administration'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // Show user menu
  $form['admin_settings']['administration']['at_user_menu'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show the built in User Menu.'),
    '#default_value' => $settings['at_user_menu'],
    '#description' => t('This will show or hide useful links in the header. NOTE that if the <a href="!link">Admin Menu</a> module is installed most links will not show up because they are included in the Admin Menu.', array('!link' => 'http://drupal.org/project/admin_menu')),
  );
  // Show block edit links
  $form['admin_settings']['administration']['block_edit_links'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show block editing and configuration links.'),
    '#default_value' => $settings['block_edit_links'],
    '#description' => t('When hovering over a block or viewing blocks in the blocks list page privileged users will see block editing and configuration links.'),
  );
  // Hide help messages
  $form['admin_settings']['administration']['at_admin_hide_help'] = array(
    '#type' => 'checkbox',
    '#title' => t('Hide help messages.'),
    '#default_value' => $settings['at_admin_hide_help'],
    '#description' => t('When this setting is checked all help messages will be hidden.'),
  );
  // Development settings
  $form['themedev']['dev'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Development'),
    '#description' => t('WARNING: These settings are for the theme developer! Changing these settings may break your site. Make sure you really know what you are doing before changing these.'),
    '#collapsible' => TRUE,
    '#collapsed' => $settings['rebuild_registry'] ? FALSE : TRUE,
  );
  // Global settings
  $form['themedev']['dev']['global'] = array(
    '#type' => 'fieldset',
    '#title' => t('Global Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // Rebuild registry
  $form['themedev']['dev']['global']['rebuild_registry'] = array(
    '#type' => 'checkbox',
    '#title' => t('Rebuild the theme registry on every page load.'),
    '#default_value' => $settings['rebuild_registry'],
    '#description' => t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>. WARNING! This is a performance penalty and must be turned off on production websites.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
  );
  // Show $theme_info
  $form['themedev']['dev']['global']['show_theme_info'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show theme info.'),
    '#default_value' => $settings['show_theme_info'],
    '#description' => t('This will show the output of the global $theme_info variable using Krumo.'),
  );
  if (!module_exists('devel')) {
    $form['themedev']['dev']['global']['show_theme_info']['#description'] = t('NOTICE: The setting requires the <a href="!link">Devel module</a> to be installed. This will show the output of the global $theme_info variable using Krumo.', array('!link' => 'http://drupal.org/project/devel'));
    $form['themedev']['dev']['global']['show_theme_info']['#disabled'] = 'disabled';
  }
  // Add or remove extra classes
  $form['themedev']['dev']['classses'] = array(
    '#type' => 'fieldset',
    '#title' => t('Add or Remove CSS Classes'),
    '#description' => t('<p>This is a fast and easy way to add or remove CSS classes during theme development, so you only print what you require. Once you have decided which classes you need you can set new defaults in your subthemes .info file - this is useful if your theme needs to be portable, such as a commercial theme or when moving from development server to the live site. Use the <b>Export Advanced Theme Settings</b> to copy/paste your theme settings to the .info file (save them first if you have made changes).</p><p>Note that whenever you change the defaults in the .info file you need to click <em>"Reset to defaults"</em> to save them to the variables table and have them applied.</p>'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // Body classes
  $form['themedev']['dev']['classses']['body_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Page Classes'),
    '#description' => t('Page classes are added to the BODY element and apply to the whole page.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['body_classes']['cleanup_classes_section'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print section classes (.section-$section, uses the path-alias)'),
    '#default_value' => $settings['cleanup_classes_section'],
  );
  $form['themedev']['dev']['classses']['body_classes']['cleanup_classes_front'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .front and .not-front classes.'),
    '#default_value' => $settings['cleanup_classes_front'],
  );
  $form['themedev']['dev']['classses']['body_classes']['cleanup_classes_user_status'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .logged-in and .not-logged-in classes.'),
    '#default_value' => $settings['cleanup_classes_user_status'],
  );
  $form['themedev']['dev']['classses']['body_classes']['cleanup_classes_normal_path'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .page-[$normal_path] classes.'),
    '#default_value' => $settings['cleanup_classes_normal_path'],
  );
  $form['themedev']['dev']['classses']['body_classes']['cleanup_classes_node_type'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .article-type-[type] classes.'),
    '#default_value' => $settings['cleanup_classes_node_type'],
  );
  $form['themedev']['dev']['classses']['body_classes']['cleanup_classes_add_edit_delete'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print classes for article add, edit and delete pages (.article-[arg]).'),
    '#default_value' => $settings['cleanup_classes_add_edit_delete'],
  );
  if (function_exists('locale')) {
   $form['themedev']['dev']['classses']['body_classes']['cleanup_classes_language'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print classes for Locale page language such as .lang-en, .lang-sv'),
      '#default_value' => $settings['cleanup_classes_language'],
    );
  }
  // Node classes
  $form['themedev']['dev']['classses']['article_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Article Classes'),
    '#description' => t('Article classes apply to nodes. They print in the main wrapper DIV for all articles (nodes) in node.tpl.php.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['article_classes']['cleanup_article_id'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print a unique ID for each article e.g. #article-1.'),
    '#default_value' => $settings['cleanup_article_id'],
  );
  $form['themedev']['dev']['classses']['article_classes']['cleanup_article_classes_sticky'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .article-sticky class for articles set to sticky.'),
    '#default_value' => $settings['cleanup_article_classes_sticky'],
  );
  $form['themedev']['dev']['classses']['article_classes']['cleanup_article_classes_promote'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .article-promoted class for articles promoted to front.'),
    '#default_value' => $settings['cleanup_article_classes_promote'],
  );
  $form['themedev']['dev']['classses']['article_classes']['cleanup_article_classes_teaser'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .article-teaser class on article teasers.'),
    '#default_value' => $settings['cleanup_article_classes_teaser'],
  );
  $form['themedev']['dev']['classses']['article_classes']['cleanup_article_classes_preview'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .article-preview class for article previews.'),
    '#default_value' => $settings['cleanup_article_classes_preview'],
  );
  $form['themedev']['dev']['classses']['article_classes']['cleanup_article_classes_type'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .[content-type]-article classes.'),
    '#default_value' => $settings['cleanup_article_classes_type'],
  );
  if (function_exists('i18n_init')) {
    $form['themedev']['dev']['classses']['article_classes']['cleanup_article_classes_language'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print .article-lang-[language] classes (requires i18n module)'),
      '#default_value' => $settings['cleanup_article_classes_language'],
    );
  }
  // Comment classes
  $form['themedev']['dev']['classses']['comment_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Comment Classes'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['comment_classes']['comments'] = array(
    '#type' => 'fieldset',
    '#title' => t('Comments'),
    '#description' => t('Comment classes apply to all comments. They print in comment.tpl.php on the wrapper DIV for each comment.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['comment_classes']['comments']['cleanup_comment_anonymous'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .comment-by-anonymous for anonymous comments.'),
    '#default_value' => $settings['cleanup_comment_anonymous'],
  );
  $form['themedev']['dev']['classses']['comment_classes']['comments']['cleanup_comment_article_author'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .comment-by-article-author for author comments.'),
    '#default_value' => $settings['cleanup_comment_article_author'],
  );
  $form['themedev']['dev']['classses']['comment_classes']['comments']['cleanup_comment_by_viewer'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .comment-by-viewer for viewer comments.'),
    '#default_value' => $settings['cleanup_comment_by_viewer'],
  );
  $form['themedev']['dev']['classses']['comment_classes']['comments']['cleanup_comment_new'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .comment-new for new comments.'),
    '#default_value' => $settings['cleanup_comment_new'],
  );
  $form['themedev']['dev']['classses']['comment_classes']['comments']['cleanup_comment_zebra'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .odd and .even classes for comments.'),
    '#default_value' => $settings['cleanup_comment_zebra'],
  );
  $form['themedev']['dev']['classses']['comment_classes']['comment-wrapper'] = array(
    '#type' => 'fieldset',
    '#title' => t('Comment Wrapper'),
   '#description' => t('This class prints in comment-wrapper.tpl.php. The DIV wrapper encloses both the comments and the comment form (if on the same page).'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['comment_classes']['comment-wrapper']['cleanup_comment_wrapper_type'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print a content type class on the comments wrapper i.e. .[content-type]-comments.'),
    '#default_value' => $settings['cleanup_comment_wrapper_type'],
  );
  // Block classes
  $form['themedev']['dev']['classses']['block_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Block Classes'),
    '#description' => t('Comment classes apply to blocks. They print in the main wrapper DIV for all blocks in block.tpl.php.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['block_classes']['cleanup_block_block_module_delta'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print a unique ID for each block (#block-module-delta).'),
    '#default_value' => $settings['cleanup_block_block_module_delta'],
  );
  $form['themedev']['dev']['classses']['block_classes']['cleanup_block_classes_module'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print a .block-[module] class.'),
    '#default_value' => $settings['cleanup_block_classes_module'],
  );
  $form['themedev']['dev']['classses']['block_classes']['cleanup_block_classes_zebra'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .odd and .even classes for blocks.'),
    '#default_value' => $settings['cleanup_block_classes_zebra'],
  );
  $form['themedev']['dev']['classses']['block_classes']['cleanup_block_classes_region'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .block-[region] classes.'),
    '#default_value' => $settings['cleanup_block_classes_region'],
  );
  $form['themedev']['dev']['classses']['block_classes']['cleanup_block_classes_count'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .block-[count] classes.'),
    '#default_value' => $settings['cleanup_block_classes_count'],
  );
  // Menu classes
  $form['themedev']['dev']['classses']['menu_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Menu, Primary &amp; Secondary Links Classes'),
    '#description' => t('Standard menus get their classes via the <code>theme_menu_tree</code> function override while the Primary and Secondary links use the <code>theme_links</code> function override (both are found in template.theme-overrides.inc). Note that the standard menu class options will not appear and will not be applied if the <a href="!link">DHTML Menu</a> module is installed.', array('!link' => 'http://drupal.org/project/dhtml_menu')),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  if (!function_exists('dhtml_menu_init')) {
    $form['themedev']['dev']['classses']['menu_classes']['menu_menu_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Menu Classes'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    );
    $form['themedev']['dev']['classses']['menu_classes']['menu_menu_classes']['cleanup_menu_menu_class'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the ul.menu class.'),
      '#default_value' => $settings['cleanup_menu_menu_class'],
    );
    $form['themedev']['dev']['classses']['menu_classes']['menu_menu_classes']['cleanup_menu_leaf_class'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the .leaf class on menu list items.'),
      '#default_value' => $settings['cleanup_menu_leaf_class'],
    );
    $form['themedev']['dev']['classses']['menu_classes']['menu_menu_classes']['cleanup_menu_first_last_classes'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the .first and .last classes on menu list items. If there is only one item in the menu the class .single-item will replace the .last class (requires the .leaf class).'),
      '#default_value' => $settings['cleanup_menu_first_last_classes'],
    );
    $form['themedev']['dev']['classses']['menu_classes']['menu_menu_classes']['cleanup_menu_active_classes'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the .active classes on menu list items (active classes always print on the anchor).'),
      '#default_value' => $settings['cleanup_menu_active_classes'],
    );
    $form['themedev']['dev']['classses']['menu_classes']['menu_menu_classes']['cleanup_menu_title_class'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print classes based on the menu title, i.e. .menu-[title].'),
      '#default_value' => $settings['cleanup_menu_title_class'],
    );
  }
  else {
    $form['themedev']['dev']['classses']['menu_classes']['#description'] = t('NOTICE: You currently have the DHTML Menu module installed. The custom menu class options have been disabled because this module will not work correctly with them enabled - you can still set classes for the Primary and Secondary links (below).');
    $form['themedev']['dev']['classses']['menu_classes']['menu_menu_classes']['#disabled'] = 'disabled';
  }
  $form['themedev']['dev']['classses']['menu_classes']['menu_links_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Primary and Secondary Links Classes'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    );
  $form['themedev']['dev']['classses']['menu_classes']['menu_links_classes']['cleanup_links_type_class'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print the type class on Primary and Secondary links.'),
    '#default_value' => $settings['cleanup_links_type_class'],
  );
  $form['themedev']['dev']['classses']['menu_classes']['menu_links_classes']['cleanup_links_active_classes'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print the active classes on Primary and Secondary links.'),
    '#default_value' => $settings['cleanup_links_active_classes'],
  );
  $form['themedev']['dev']['classses']['menu_classes']['menu_links_classes']['cleanup_links_first_last_classes'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .first and .last classes.'),
     '#default_value' => $settings['cleanup_links_first_last_classes'],
  );
  // Item list classes
  $form['themedev']['dev']['classses']['itemlist_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Item list Classes'),
    '#description' => t('Item list classes are applied using the <code>theme_item_list</code> function override in template.theme-overrides.inc'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['itemlist_classes']['cleanup_item_list_zebra'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .odd and .even classes for list items.'),
    '#default_value' => $settings['cleanup_item_list_zebra'],
  );
  $form['themedev']['dev']['classses']['itemlist_classes']['cleanup_item_list_first_last'] = array(
    '#type' => 'checkbox',
    '#title' => t('Print .first and .last classes for the first and last items in the list.'),
    '#default_value' => $settings['cleanup_item_list_first_last'],
  );
  // Views classes
  if (module_exists('views')) {
    $form['themedev']['dev']['classses']['views_classes'] = array(
      '#type' => 'fieldset',
      '#title' => t('Views Classes'),
      '#description' => t('NOTE: If you are using custom Views templates you must use the template overrides that come with Adaptivetheme to preserve this functality.'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['themedev']['dev']['classses']['views_classes']['display'] = array(
      '#type' => 'fieldset',
      '#title' => t('Display Classes'),
      '#description' => t('Control the classes for Views displays (views-view.tpl.php).'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['themedev']['dev']['classses']['views_classes']['display']['cleanup_views_css_name'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the CSS Name class.'),
      '#default_value' => $settings['cleanup_views_css_name'],
    );
    $form['themedev']['dev']['classses']['views_classes']['display']['cleanup_views_view_name'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the View Name class.'),
      '#default_value' => $settings['cleanup_views_view_name'],
    );
    $form['themedev']['dev']['classses']['views_classes']['display']['cleanup_views_display_id'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the Display ID class.'),
      '#default_value' => $settings['cleanup_views_display_id'],
    );
    $form['themedev']['dev']['classses']['views_classes']['display']['cleanup_views_dom_id'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print the DOM ID class.'),
      '#default_value' => $settings['cleanup_views_dom_id'],
    );
    $form['themedev']['dev']['classses']['views_classes']['style'] = array(
      '#type' => 'fieldset',
      '#title' => t('Views Style Classes'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['themedev']['dev']['classses']['views_classes']['style']['cleanup_views_unformatted'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print extra classes for unformatted views (views-view-unformatted.tpl.php).'),
      '#default_value' => $settings['cleanup_views_unformatted'],
    );
    $form['themedev']['dev']['classses']['views_classes']['style']['cleanup_views_item_list'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print extra classes for item list views (views-view-list.tpl.php).'),
      '#default_value' => $settings['cleanup_views_item_list'],
    );
  }
  // Field classes (CCK).
  if (module_exists('content')) {
    $form['themedev']['dev']['classses']['field_classes'] = array(
      '#type' => 'fieldset',
      '#title' => t('Field Classes'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
   $form['themedev']['dev']['classses']['field_classes']['cleanup_fields_type'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print field type classes.'),
      '#default_value' => $settings['cleanup_fields_type'],
    );
   $form['themedev']['dev']['classses']['field_classes']['cleanup_fields_name'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print field name classes.'),
      '#default_value' => $settings['cleanup_fields_name'],
    );
    $form['themedev']['dev']['classses']['field_classes']['cleanup_fields_zebra'] = array(
      '#type' => 'checkbox',
      '#title' => t('Print odd/even zebra classes on CCK fields.'),
      '#default_value' => $settings['cleanup_fields_zebra'],
    );
  }
  // Title classes for headings
  $form['themedev']['dev']['classses']['heading_classes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Heading Classes'),
    '#description' => t('Heading classes apply to article, block and comment titles (h2, h3 etc).'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['classses']['heading_classes']['cleanup_headings_title_class'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add the .title class to all headings.'),
    '#default_value' => $settings['cleanup_headings_title_class'],
  );
  $form['themedev']['dev']['classses']['heading_classes']['cleanup_headings_namespaced_class'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add a pseudo name spaced title class to headings, i.e. .article-title, .block-title, .comment-title.'),
    '#default_value' => $settings['cleanup_headings_namespaced_class'],
  );

  // Primary and Secondary Links Settings
  $form['themedev']['dev']['primary_secondary_links'] = array(
    '#type' => 'fieldset',
    '#title' => t('Primary and Secondary Links'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['primary_secondary_links']['primary_links_tree'] = array(
    '#type' => 'checkbox',
    '#title' => 'Output Primary links as standard Drupal menus',
    '#default_value' => $settings['primary_links_tree'],
  );
  $form['themedev']['dev']['primary_secondary_links']['secondary_links_tree'] = array(
    '#type' => 'checkbox',
    '#title' => 'Output Secondary links as standard Drupal menus',
    '#default_value' => $settings['secondary_links_tree'],
  );
  // Add spans to theme_links
  $form['themedev']['dev']['primary_secondary_links']['links_add_span_elements'] = array(
    '#type' => 'checkbox',
    '#title' => check_plain(t('Add <span></span> tags around Primary and Secondary links anchor text.')),
    '#default_value' => $settings['links_add_span_elements'],
  );
  // Theme Settings Export
  $form['themedev']['dev']['export'] = array(
    '#type' => 'fieldset',
    '#title' => t('Export Advanced Theme Settings'),
    '#description' => t('<p>Copy/paste these settings to a text file for backup or paste to your themes .info file (over-write the defaults) - useful if you are moving your theme to a new site and want to retain custom settings.</p><p>NOTE: Content type specific settings are NOT included here, these cannot be set via the info file.</p><p>WARNING! If you are using a WYSIWYG editor it must be disabled for this text area, otherwise all special characters are likely to be converted to HTML entities. If your editor has a \'view source\' feature try that first.</p>'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['themedev']['dev']['export']['exported_settings'] = array(
    '#type' => 'textarea',
    '#default_value' => $exports,
    '#resizable' => FALSE,
    '#cols' => 60,
    '#rows' => 25,
  );
  return $form;
}