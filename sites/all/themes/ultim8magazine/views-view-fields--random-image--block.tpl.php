<div class="blk2"> <?php if (isset($fields['field_image']->content)) print $fields['field_image']->content; ?>
  <div class="bar">
    <h3><?php print t('Random Photo'); ?></h3>
    <div class="con">
      <h2><?php print $fields['title']->content; ?></h2>
      <?php if (isset($fields['body']->content)) print $fields['body']->content; ?>
    </div>
  </div>
</div>