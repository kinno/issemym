<div class="comment">
  <?php print $picture ?>
  <div class="meta">
    <h4><?php print theme('username', array('account' => $content['comment_body']['#object'])) ?></h4>
    <div class="date"><?php print format_date($content['comment_body']['#object']->created); ?><?php //print render($content['links']); ?></div>
  </div>
  <div class="content">
    <?php print render($content) ?>    
  </div>
</div>
<?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>