<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <?php print $content; ?>
</div>
<div class="clear"></div>
<?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>