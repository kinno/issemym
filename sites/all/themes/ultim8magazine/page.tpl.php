<?php print render($page['header']); 
global $base_url;
/*
if (theme_get_setting('tm_value_theme_3') == 'left') {
  $said1 = 'beta';
  $said2 = 'alpha';
} else {
  $said1 = 'alpha';
  $said2 = 'beta';
}
*/
if (arg(1)) $arg1 = arg(1); else $arg1 = 0;
if (!isset($page['content']['system_main']['nodes'][$arg1]['#node']->type)) $page['content']['system_main']['nodes'][$arg1]['#node']->type = '';
?>

<div class="bg1"><div class="bg2">
	<div class="container">
		<div class="one-third column logo"><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a></div>

		<div class="two-thirds column social">
			<?php if ($out = render($page['sidebar_social'])) { print ''.$out.''; } ?>
		</div>
		<?php if ($page['sidebar_header']){ ?>
		  <div class="sidebar_header">
			<?php print render($page['sidebar_header']); ?>
		  </div> <!-- /.footer icons -->
		<?php }; ?>	
    <div class="clear"></div>
	
	
    <?php if ($out = render($page['sidebar_navgation_menu'])){ if ($out2 = render($page['sidebar_search'])){$out = str_replace(
        array('</ul>search'),
        array('<li class="search"><div class="searchform">'.$out2.'</div><a href="#"><img src="'.$base_url.'/'.path_to_theme().'/images/se.png"></a></li></ul>'), $out );} print '<div class="sixteen columns top-menu">'.$out.'</div><div class="clear"></div>';}?>

    <?php if ($out = render($page['sidebar_slideshow'])) { print '<div class="sixteen columns">'.$out.'</div><div class="clear"></div>'; } ?>
	
	<?php if($is_front){ ?>
	
    <?php if (!((arg(0) == 'taxonomy' and arg(1) == 'term') and (theme_get_setting('tm_value_theme_2') == 1)) and $page['content']['system_main']['nodes'][$arg1]['#node']->type != 'page') { ?>
		<div class="two-thirds column">
      <?php if (isset($tabs)) { print ''. render($tabs); } ?>
      <?php if (isset($messages)) { print $messages; } ?>
      <?php if (isset($help)) { print $help; } ?>
      <?php if ($is_front) { ?>
        <?php if ($out = render($page['home_content'])) { 
        	if ($_SESSION['ultim8magazinetaxdisp']) {$tbb = ' class="bll"';} else {$tbb = '';}
        	print '<div'.$tbb.'><div class="tbb"><a href="'.url(request_path(),array('query' => array('td' => 1))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdb.png" alt="" /></a><a href="'.url(request_path(),array('query' => array('td' => 0))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdl.png" alt="" /></a></div>'.$out.'</div>'; 
        } else { 
        	print '&nbsp;'; 
        }?>
      <?php } else { ?>
      <?php if (arg(0) == 'taxonomy' and arg(1) == 'term') print '<div class="tbb"><a href="'.url(request_path(),array('query' => array('td' => 1))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdb.png" alt="" /></a><a href="'.url(request_path(),array('query' => array('td' => 0))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdl.png" alt="" /></a></div>'; ?>
      <div class="blkc">
      	<div class="brc"><?php if (isset($breadcrumb)) { print $breadcrumb; } ?></div>
        <?php if ($page['content']['system_main']['nodes'][$arg1]['#node']->type) { ?>
        <?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
        <?php } elseif (arg(0) == 'taxonomy' and arg(1) == 'term') { ?>
          <div class="conc">
          <?php print render($title_prefix); ?><h1><?php print $title; ?></h1><?php print render($title_suffix); ?>
        	    <?php
    $name = 'block_category';
    $display_id = 'block';
    if ($view = views_get_view($name)) {
      if ($view->access($display_id)) {
        $output = $view->execute_display($display_id);
        $view->destroy();
	      print $output['content'];
      }
      $view->destroy();
    }
  ?>        
  			<?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
          </div>
        <?php } elseif ($is_front) { ?>
          <?php if ($out = render($page['home_content'])) { print ''.$out.''; } ?>
        <?php } else { ?>
          <div class="con">
          <?php print render($title_prefix); ?><h1><?php print $title; ?></h1><?php print render($title_suffix); ?>
          <?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
          </div>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
		<div class="one-third column">
      <?php if ($out = render($page['sidebar_right_top'])) { print ''.$out.''; } ?>
      <?php render($page['sidebar_right_tabs']); print ultim8magazine_set_tabs(true); ?>
      <?php if ($out = render($page['sidebar_right_bottom'])) { print ''.$out.''; } ?>  
		  <div class="clear"></div>
    </div>
    <?php } else { ?>
    <div class="sixteen columns">
      <?php if (isset($tabs)) { print ''. render($tabs); } ?>
      <?php if (isset($messages)) { print $messages; } ?>
      <?php if (isset($help)) { print $help; } ?>
      <?php if (arg(0) == 'taxonomy' and arg(1) == 'term') print '<div class="tbb"><a href="'.url(request_path(),array('query' => array('td' => 1))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdb.png" alt="" /></a><a href="'.url(request_path(),array('query' => array('td' => 0))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdl.png" alt="" /></a></div>'; ?>
      <div class="blkc">
      	<div class="brc"><?php if (isset($breadcrumb)) { print $breadcrumb; } ?></div>
        <div class="conc">
        <?php print render($title_prefix); ?><?php if (!$page['content']['system_main']['nodes'][$arg1]['#node']->type) print '<h1>'.$title.'</h1>'; ?><?php print render($title_suffix); ?>
          <?php
    $name = 'block_category';
    $display_id = 'block';
    if ($view = views_get_view($name)) {
      if ($view->access($display_id)) {
        $output = $view->execute_display($display_id);
        $view->destroy();
	      print $output['content'];
      }
      $view->destroy();
    }
  ?>
  
          <?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <?php }
}else{?>
        
    <?php if (!((arg(0) == 'taxonomy' and arg(1) == 'term') and (theme_get_setting('tm_value_theme_2') == 1)) and $page['content']['system_main']['nodes'][$arg1]['#node']->type != 'page') { ?>
                <div class="brc"><?php if (isset($breadcrumb)) { print $breadcrumb; } ?></div>
		<div class="one-third column">
      <?php if ($out = render($page['sidebar_right_top'])) { print ''.$out.''; } ?>
      <?php render($page['sidebar_right_tabs']); print ultim8magazine_set_tabs(true); ?>
      <?php if ($out = render($page['sidebar_right_bottom'])) { print ''.$out.''; } ?>  
		  <div class="clear"></div>
    </div>
	
		<div class="two-thirds column">
      <?php if (isset($tabs)) { print ''. render($tabs); } ?>
      <?php if (isset($messages)) { print $messages; } ?>
      <?php if (isset($help)) { print $help; } ?>
      <?php if ($is_front) { ?>
        <?php if ($out = render($page['home_content'])) { 
        	if ($_SESSION['ultim8magazinetaxdisp']) {$tbb = ' class="bll"';} else {$tbb = '';}
        	print '<div'.$tbb.'><div class="tbb"><a href="'.url(request_path(),array('query' => array('td' => 1))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdb.png" alt="" /></a><a href="'.url(request_path(),array('query' => array('td' => 0))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdl.png" alt="" /></a></div>'.$out.'</div>'; 
        } else { 
        	print '&nbsp;'; 
        }?>
      <?php } else { ?>
      <?php if (arg(0) == 'taxonomy' and arg(1) == 'term') print '<div class="tbb"><a href="'.url(request_path(),array('query' => array('td' => 1))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdb.png" alt="" /></a><a href="'.url(request_path(),array('query' => array('td' => 0))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdl.png" alt="" /></a></div>'; ?>
      <div class="blkc">
      	
        <?php if ($page['content']['system_main']['nodes'][$arg1]['#node']->type) { ?>
        <?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
        <?php } elseif (arg(0) == 'taxonomy' and arg(1) == 'term') { ?>
          <div class="conc">
          <?php print render($title_prefix); ?><h1><?php print $title; ?></h1><?php print render($title_suffix); ?>
        	    <?php
    $name = 'block_category';
    $display_id = 'block';
    if ($view = views_get_view($name)) {
      if ($view->access($display_id)) {
        $output = $view->execute_display($display_id);
        $view->destroy();
	      print $output['content'];
      }
      $view->destroy();
    }
  ?>        
  			<?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
          </div>
        <?php } elseif ($is_front) { ?>
          <?php if ($out = render($page['home_content'])) { print ''.$out.''; } ?>
        <?php } else { ?>
          <div class="con">
          <?php print render($title_prefix); ?><h1><?php print $title; ?></h1><?php print render($title_suffix); ?>
          <?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
          </div>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
		
    <?php } else { ?>
    <div class="sixteen columns">
      <?php if (isset($tabs)) { print ''. render($tabs); } ?>
      <?php if (isset($messages)) { print $messages; } ?>
      <?php if (isset($help)) { print $help; } ?>
      <?php if (arg(0) == 'taxonomy' and arg(1) == 'term') print '<div class="tbb"><a href="'.url(request_path(),array('query' => array('td' => 1))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdb.png" alt="" /></a><a href="'.url(request_path(),array('query' => array('td' => 0))).'"><img src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/images/tdl.png" alt="" /></a></div>'; ?>
      <div class="blkc">
      	<div class="brc"><?php if (isset($breadcrumb)) { print $breadcrumb; } ?></div>
        <div class="conc">
        <?php print render($title_prefix); ?><?php if (!$page['content']['system_main']['nodes'][$arg1]['#node']->type) print '<h1>'.$title.'</h1>'; ?><?php print render($title_suffix); ?>
          <?php
    $name = 'block_category';
    $display_id = 'block';
    if ($view = views_get_view($name)) {
      if ($view->access($display_id)) {
        $output = $view->execute_display($display_id);
        $view->destroy();
	      print $output['content'];
      }
      $view->destroy();
    }
  ?>
  
          <?php if ($action_links) {print '<ul class="action-links">'.render($action_links).'</ul>';}?><?php print render($page['content']); ?>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <?php }
}?>

	</div><!-- container -->


  <div class="footer">
    <div class="container">    
        <div class="four columns">
          <?php if ($out = render($page['footer_one'])) { print ''.$out.''; } ?>
        </div>
        <div class="four columns">
          <?php if ($out = render($page['footer_two'])) { print ''.$out.''; } ?>
        </div>
        <div class="four columns">
          <?php if ($out = render($page['footer_three'])) { print ''.$out.''; } ?>
        </div>
        <div class="four columns">
    	    <?php if ($out = render($page['footer_four'])) { print ''.$out.''; } ?>
        </div>
      <div class="clear"></div>
		  <div class="two-thirds column copy">
        <?php print render($page['footer_copyright']); ?>
      </div>
		  <div class="one-third column copy">
        <a href="http://www.themesnap.com" title="Drupal themes by ThemeSnap.com">Drupal Themes by ThemeSnap.com</a>
      </div>
      <div class="clear"></div>
    </div>
  </div>

</div></div>

<?php //print '<pre>'. check_plain(print_r($page['content']['system_main']['nodes'][arg(1)]['#node']->type, 1)) .'</pre>'; ?>