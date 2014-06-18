<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
<!-- Comments -->
<div class="comments">
  <h2><?php print t('!comment_count to "!title"', array('!comment_count' => format_plural($content['#node']->comment_count, '1 Response', '@count Responses'), '!title' => $content['#node']->title)); ?></h2>
  <?php print render($content['comments']); ?>
</div>
<!-- // Comments -->
<!-- Comment form -->
<?php if ($out = render($content['comment_form'])) { ?>
<div class="comment-form">
  <h2><?php print t('Leave a comment'); ?></h2>
  <?php print str_replace('resizable', '', $out); ?>
</div>
<?php }} ?>