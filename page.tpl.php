<?php

/* Copied from the original modules/system/page.tpl.php file. */

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  <div id="page">

    <header id="header">

      <div id="logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
          <img src="/sites/all/themes/THEMENAME/lw-logo.png" alt="<?php print t('Home'); ?>" heigth="22" width="240" />
        </a>
      </div>

      <?php print render($page['header']); ?>

      <?php if ($main_menu || $secondary_menu): ?>

        <nav id="primary-menu-nav">
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
        </nav>

        <nav id="secondary-menu-nav">
          <ul>
          <?php if ($logged_in): ?>
            <!-- Sorry, Drupal, you should be helpful and not annoying. I'm using a hand-coded html for account-related menus instead of relying on secondary menu. -->
            <!--
            <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
            -->
            <li><a href="/user">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 438.529 438.529" style="enable-background:new 0 0 438.529 438.529;" xml:space="preserve">
	<g>
		<path d="M219.265,219.267c30.271,0,56.108-10.71,77.518-32.121c21.412-21.411,32.12-47.248,32.12-77.515    c0-30.262-10.708-56.1-32.12-77.516C275.366,10.705,249.528,0,219.265,0S163.16,10.705,141.75,32.115    c-21.414,21.416-32.121,47.253-32.121,77.516c0,30.267,10.707,56.104,32.121,77.515    C163.166,208.557,189.001,219.267,219.265,219.267z" fill="#FFFFFF"/>
		<path d="M419.258,335.036c-0.668-9.609-2.002-19.985-3.997-31.121c-1.999-11.136-4.524-21.457-7.57-30.978    c-3.046-9.514-7.139-18.794-12.278-27.836c-5.137-9.041-11.037-16.748-17.703-23.127c-6.666-6.377-14.801-11.465-24.406-15.271    c-9.617-3.805-20.229-5.711-31.84-5.711c-1.711,0-5.709,2.046-11.991,6.139c-6.276,4.093-13.367,8.662-21.266,13.708    c-7.898,5.037-18.182,9.609-30.834,13.695c-12.658,4.093-25.361,6.14-38.118,6.14c-12.752,0-25.456-2.047-38.112-6.14    c-12.655-4.086-22.936-8.658-30.835-13.695c-7.898-5.046-14.987-9.614-21.267-13.708c-6.283-4.093-10.278-6.139-11.991-6.139    c-11.61,0-22.222,1.906-31.833,5.711c-9.613,3.806-17.749,8.898-24.412,15.271c-6.661,6.379-12.562,14.086-17.699,23.127    c-5.137,9.042-9.229,18.326-12.275,27.836c-3.045,9.521-5.568,19.842-7.566,30.978c-2,11.136-3.332,21.505-3.999,31.121    c-0.666,9.616-0.998,19.466-0.998,29.554c0,22.836,6.949,40.875,20.842,54.104c13.896,13.224,32.36,19.835,55.39,19.835h249.533    c23.028,0,41.49-6.611,55.388-19.835c13.901-13.229,20.845-31.265,20.845-54.104C420.264,354.502,419.932,344.652,419.258,335.036    z" fill="#FFFFFF"/>
</g>
</svg>
            </a></li>
            <li><a href="/user/logout">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 447.674 447.674" style="enable-background:new 0 0 447.674 447.674;" xml:space="preserve">
	<g>
		<path d="M182.725,379.151c-0.572-1.522-0.769-2.816-0.575-3.863c0.193-1.04-0.472-1.902-1.997-2.566    c-1.525-0.664-2.286-1.191-2.286-1.567c0-0.38-1.093-0.667-3.284-0.855c-2.19-0.191-3.283-0.288-3.283-0.288h-3.71h-3.14H82.224    c-12.562,0-23.317-4.469-32.264-13.421c-8.945-8.946-13.417-19.698-13.417-32.258V123.335c0-12.562,4.471-23.313,13.417-32.259    c8.947-8.947,19.702-13.422,32.264-13.422h91.361c2.475,0,4.421-0.614,5.852-1.854c1.425-1.237,2.375-3.094,2.853-5.568    c0.476-2.474,0.763-4.708,0.859-6.707c0.094-1.997,0.048-4.521-0.144-7.566c-0.189-3.044-0.284-4.947-0.284-5.712    c0-2.474-0.905-4.611-2.712-6.423c-1.809-1.804-3.949-2.709-6.423-2.709H82.224c-22.648,0-42.016,8.042-58.101,24.125    C8.042,81.323,0,100.688,0,123.338v200.994c0,22.648,8.042,42.018,24.123,58.095c16.085,16.091,35.453,24.133,58.101,24.133    h91.365c2.475,0,4.422-0.622,5.852-1.854c1.425-1.239,2.375-3.094,2.853-5.571c0.476-2.471,0.763-4.716,0.859-6.707    c0.094-1.999,0.048-4.518-0.144-7.563C182.818,381.817,182.725,379.915,182.725,379.151z" fill="#FFFFFF"/>
		<path d="M442.249,210.989L286.935,55.67c-3.614-3.612-7.898-5.424-12.847-5.424c-4.949,0-9.233,1.812-12.851,5.424    c-3.617,3.617-5.424,7.904-5.424,12.85v82.226H127.907c-4.952,0-9.233,1.812-12.85,5.424c-3.617,3.617-5.424,7.901-5.424,12.85    v109.636c0,4.948,1.807,9.232,5.424,12.847c3.621,3.61,7.901,5.427,12.85,5.427h127.907v82.225c0,4.945,1.807,9.233,5.424,12.847    c3.617,3.617,7.901,5.428,12.851,5.428c4.948,0,9.232-1.811,12.847-5.428L442.249,236.69c3.617-3.62,5.425-7.898,5.425-12.848    C447.674,218.894,445.866,214.606,442.249,210.989z" fill="#FFFFFF"/>
	</g></svg>
            </a></li>
          <?php else: ?>
            <li><?php print "<a href=\"/user?destination=" . request_uri() . "\">"; ?>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 438.542 438.542" style="enable-background:new 0 0 438.542 438.542;" xml:space="preserve">
  <g>
		<path d="M414.41,60.676c-16.084-16.083-35.446-24.125-58.102-24.125h-91.357c-2.478,0-4.429,0.614-5.853,1.855    c-1.431,1.237-2.382,3.093-2.854,5.568c-0.479,2.474-0.76,4.709-0.853,6.707c-0.096,1.997-0.051,4.521,0.144,7.565    c0.186,3.046,0.281,4.949,0.281,5.713c0.571,1.524,0.767,2.81,0.571,3.855c-0.191,1.043,0.476,1.903,1.998,2.568    c1.52,0.666,2.279,1.191,2.279,1.569c0,0.378,1.096,0.662,3.285,0.855c2.19,0.192,3.289,0.284,3.289,0.284h3.713h3.142h82.228    c12.56,0,23.312,4.471,32.258,13.422c8.952,8.945,13.422,19.696,13.422,32.261V319.77c0,12.563-4.47,23.312-13.422,32.258    c-8.945,8.948-19.698,13.421-32.258,13.421h-91.357c-2.478,0-4.436,0.62-5.853,1.855c-1.43,1.242-2.382,3.094-2.857,5.564    c-0.476,2.478-0.763,4.716-0.855,6.714c-0.092,1.995-0.051,4.518,0.144,7.563c0.195,3.046,0.288,4.948,0.288,5.708    c0,2.478,0.896,4.613,2.707,6.427c1.81,1.807,3.949,2.71,6.427,2.71h91.357c22.648,0,42.018-8.042,58.095-24.133    c16.084-16.077,24.126-35.446,24.126-58.095V118.769C438.533,96.118,430.491,76.754,414.41,60.676z" fill="#FFFFFF"/>
		<path d="M338.047,219.27c0-4.948-1.813-9.233-5.427-12.85L177.302,51.101c-3.616-3.612-7.895-5.424-12.847-5.424    c-4.952,0-9.233,1.812-12.85,5.424c-3.615,3.617-5.424,7.904-5.424,12.85v82.226H18.274c-4.952,0-9.235,1.812-12.851,5.424    C1.807,155.219,0,159.503,0,164.452v109.635c0,4.949,1.807,9.233,5.424,12.848c3.619,3.61,7.902,5.427,12.851,5.427h127.906    v82.225c0,4.945,1.809,9.233,5.424,12.847c3.621,3.617,7.902,5.428,12.85,5.428c4.949,0,9.231-1.811,12.847-5.428l155.318-155.312    C336.234,228.501,338.047,224.216,338.047,219.27z" fill="#FFFFFF"/>
  </g>
</svg>
            </a></li>
          <?php endif; ?>
          </ul>
        </nav>
      <?php endif; ?>

    </header> <!-- /#header -->


    <div id="breadcrumb">
    </div>

    <?php print $messages; ?>

    <div id="main-wrapper">

      <?php if ($page['sidebar']): ?>
        <aside id="sidebar">
          <?php print render($page['sidebar']); ?>
        </aside> <!-- /#sidebar -->
      <?php endif; ?>

      <main>
        <header>
          <?php if ($breadcrumb): ?><?php print $breadcrumb; ?><?php endif; ?>
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        </header>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </main>

    </div> <!-- /#main-wrapper -->

    <footer id="footer">
      <?php print render($page['footer']); ?>
    </footer> <!-- /#footer -->

  </div> <!-- /#page -->
