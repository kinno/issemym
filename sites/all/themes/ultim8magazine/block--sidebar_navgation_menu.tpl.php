<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); global $base_url; ?>
  <?php print str_replace(
    array('>'.t('Home').'</'),
    array('><img src="'.$base_url.'/'.path_to_theme().'/images/h1.png"></'),$content.'search');
  //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>';
  ?>
</div>