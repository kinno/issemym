<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject) { print '<h4>'.$block->subject.'</h4>'; } ?>
  <?php print render($title_suffix); ?>
  <div class="con">
  <?php print $content; ?>
  </div>
  <?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>
</div>
