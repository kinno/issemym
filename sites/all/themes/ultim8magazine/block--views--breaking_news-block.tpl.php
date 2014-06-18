<div id="<?php print $block_html_id; ?>" class="brnews <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject) { print '<h3>'.$block->subject.'</h3>'; } ?>
  <?php print render($title_suffix); ?>
  <?php print $content; ?>
  <div class="clear"></div>
</div>
<div class="clear"></div>