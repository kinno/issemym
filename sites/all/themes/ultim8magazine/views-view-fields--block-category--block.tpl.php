<div class="blk3">
	<?php if (isset($fields['field_image']->content)) print theme_get_setting('tm_value_theme_2') == 1 ? $fields['field_image_1']->content : $fields['field_image']->content; ?>
        <div class="con31">
          	<h1><?php print $fields['field_category']->content; ?></h1><div class="date"><?php print $fields['created']->content; ?></div>
          	<div class="con32"><h2><?php print $fields['title']->content; ?></h2>
			<?php print $fields['body']->content; ?>
		</div>
	</div>
</div>