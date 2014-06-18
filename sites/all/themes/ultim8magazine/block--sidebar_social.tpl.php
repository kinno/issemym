<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php 
    print render($title_prefix);
    print render($title_suffix);
    global $user; 
    if ($user->uid) {
      $out = '<li><a href="'.url('user/logout').'">'.t('Log Out').'</a></li><li><a href="'.url('user').'" title="">'.t('My Account').'</a></li>';
    } else {
      $out = '<li><a href="'.url('user').'">'.t('Log In').'</a></li><li><a href="'.url('user/register').'" title="">'.t('Sign Up').'</a></li>';
    }
    print $content.'<ul class="tmu">'.$out.'</ul>'; 
  ?>
</div>