<div id="<?php print $block_html_id; ?>" class="blk1 <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject) { print '<h3 class="blk1h">'.$block->subject.'</h3>'; } ?>
  <?php print render($title_suffix); ?>
  <div class="blk1b"><?php print $content; ?></div><div class="clear"></div>
</div>
<?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>