<?php if ($teaser) { ?>
<?php if ($_SESSION['ultim8magazinetaxdisp']) { ?>
<div id="node-<?php print $node->nid; ?>" class="blkn1 <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print render($content['field_image']); ?>
<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php if ($display_submitted): ?><div class="submitted"><?php print $submitted; ?></div><?php endif; ?>
<div class="conn1"><?php hide($content['comments']); hide($content['links']); print ultim8magazine_truncate_utf8(strip_tags (render($content)),150,FALSE,TRUE); ?></div>
</div>
<?php } elseif (theme_get_setting('tm_value_theme_2') == 1) { ?>
<div id="node-<?php print $node->nid; ?>" class="blkn1 blkj <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php $content['field_image'][0]['#image_style'] = 'teaser_2';//print '<pre>'. check_plain(print_r($content['field_image'][0]['#image_style'], 1)) .'</pre>'; ?>
<?php print render($content['field_image']); ?>
<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php if ($display_submitted): ?><div class="submitted"><?php print $submitted; ?></div><?php endif; ?>
<div class="conn1"><?php hide($content['comments']); hide($content['links']); print ultim8magazine_truncate_utf8(strip_tags (render($content)),420,FALSE,TRUE); ?></div>
</div>
<?php } else { ?>
<div id="node-<?php print $node->nid; ?>" class="blkn1 blkh <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print render($content['field_image']); ?>
<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php if ($display_submitted): ?><div class="submitted"><?php print $submitted; ?></div><?php endif; ?>
<div class="conn1"><?php hide($content['comments']); hide($content['links']); print ultim8magazine_truncate_utf8(strip_tags (render($content)),260,FALSE,TRUE); ?></div>
</div>
<?php } ?>
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
<div class="adoa"><?php print t('About the Author'); ?></div>
<div class="con ab">
<?php print $user_picture; ?>
<h3><?php print $node->name; ?></h3>
<?php $profile = user_load($node->uid); $profile = user_view($profile); print render($profile['field_aboutuser']); ?>
</div>
  <?php
    $name = 'related_posts';
    $display_id = 'block';
    if ($view = views_get_view($name)) {
      if ($view->access($display_id)) {
        $output = $view->execute_display($display_id);
        $view->destroy();
	      print '<div class="related_posts"><h4>'.t('Related Posts').'</h4>'.$output['content'].'</div><div class="clear"></div>';
      }
      $view->destroy();
    }
  ?>
<div class="con">
  <?php print render($content['comments']); ?>
</div>
<?php //print '<pre>'. check_plain(print_r($profile, 1)) .'</pre>'; ?>
</div>
<?php } ?>