<li>
  <h3><?php print $fields['title']->content; ?></h3>
  <h6><?php print $fields['created']->content; ?></h6>
  <span><?php if (isset($fields['uri']->content)) print image_style_url('slide_b', $fields['uri']->content); ?></span>
  <p><?php if (isset($fields['body']->content)) print $fields['body']->content; ?></p>
  <?php if (isset($fields['field_image_1']->content)) print $fields['field_image_1']->content; ?>
  <div class="clear"></div>
</li>