<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" dir="<?php print $language->dir; ?>" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="<?php print $language->dir; ?>" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="<?php print $language->dir; ?>" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html dir="<?php print $language->dir; ?>" lang="<?php print $language->language; ?>"> <!--<![endif]-->
<head profile="<?php print $grddl_profile; ?>">
  <?php global $base_url; ?>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php print $styles; ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <?php print $scripts; ?>

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
