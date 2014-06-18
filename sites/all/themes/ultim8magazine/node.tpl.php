<?php if (!$page) { ?>
<div id="node-<?php print $node->nid; ?>" class="blkn1 <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print render($content['field_image']); ?>
<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php if ($display_submitted): ?><div class="submitted"><?php print $submitted; ?></div><?php endif; ?>
<div class="conn1"><?php hide($content['comments']); hide($content['links']); print render($content); ?></div>
</div>
<?php } else { ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<div class="con">
  <?php print render($title_prefix); ?>
  <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <?php print render($content['links']); ?>
</div>
<div class="con">
  <?php print render($content['comments']); ?>
</div>
<?php //print '<pre>'. check_plain(print_r($profile, 1)) .'</pre>'; ?>
</div>
<?php } ?>