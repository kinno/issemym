<?php
// $Id$
global $base_url;

if (!isset($_SESSION['ultim8magazinetaxdisp'])) {
  $_SESSION['ultim8magazinetaxdisp'] = false;
} else {
  if (isset($_GET['td'])) {
    $_SESSION['ultim8magazinetaxdisp'] = $_GET['td'];
  }
}


$style = theme_get_setting('tm_value_theme_1');

switch ($style) {
	case 0:
		break;
	case 1:
		drupal_add_css(path_to_theme().'/stylesheets/style_1.css', array('group' => CSS_THEME));
		break;
	case 2:
		drupal_add_css(path_to_theme().'/stylesheets/style_2.css', array('group' => CSS_THEME));
		break;
	case 3:
		drupal_add_css(path_to_theme().'/stylesheets/style_3.css', array('group' => CSS_THEME));
		break;
	case 4:
		drupal_add_css(path_to_theme().'/stylesheets/style_4.css', array('group' => CSS_THEME));
		break;
}


function ultim8magazine_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb['breadcrumb'])) {
	  $out = array();
	  foreach ($breadcrumb['breadcrumb'] as $data) {
		  $out[] = $data;
	  }
	  return ''. implode (' → ', $out) .'';
  }
}

function ultim8magazine_set_tabs($isout = false, $bid = '', $title = '', $content = '', $title_prefix = '', $title_suffix = '', $block_html_id = '', $classes = '', $attributes = '') {

  static $tabs = array();
  if ($bid) {
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
    $tabs[$bid]->title_prefix = $title_prefix;
    $tabs[$bid]->title_suffix = $title_suffix;
    $tabs[$bid]->block_html_id = $block_html_id;
    $tabs[$bid]->classes = $classes;
    $tabs[$bid]->attributes = $attributes;
  }
  if ($isout and isset($tabs) and is_array($tabs)) {
	$out_t = '';
	$out_c = '';
	$i = 1;
  $j = count($tabs);
	foreach ($tabs as $data) {
		if ($i == 1) $ac = ' class="tabli active"'; else  $ac = ' class="tabli"';
		$out_t .= '<li'.$ac.'><a href="#tab'.$data->bid.'">'.$data->title.'</a></li>';
		$out_c .= '<li'.$ac.' id="tab'.$data->bid.'"><div id="'.$data->block_html_id.'" class="'.$data->classes.'"'.$data->attributes.'>'.$data->title_prefix.$data->title_suffix.$data->content.'</div><div class="clear"></div></li>';
		$i++;
	}
	return '<div class="blk-tabs"><ul class="tabss">'. $out_t .'</ul><ul class="tabs-content">'.$out_c.'</ul></div><div class="clear"></div>';
  }
}

function ultim8magazine_set_category($isout = false, $nid = '', $title = '', $content = '', $date = '', $img = '') {
  static $tabs = array();
  if ($nid) {
    $tabs[$nid]->nid = $nid;
    $tabs[$nid]->title = $title;
    $tabs[$nid]->content = $content;
    $tabs[$nid]->date = $date;
    $tabs[$nid]->img = $img;
  }
  if ($isout and isset($tabs) and is_array($tabs)) {
	$out_t = '';
	$out_c = '';
	$i = 1;
  $j = count($tabs);
	foreach ($tabs as $data) {
	if (!($i > 4 and $_SESSION['ultim8magazinetaxdisp'])) if ($i == 1) {
      $out_t .= '<div class="s1">'.$data->img.'<h2>'.$data->title.'</h2><div class="data1">'.$data->date.'</div>'.($_SESSION['ultim8magazinetaxdisp'] ? ultim8magazine_truncate_utf8($data->content,100,FALSE, true) : $data->content).'</div>';
    } else {
		  $out_c .= '<div class="s3"><div class="data2">'.$data->date.'</div><div class="con2">'.$data->title.'<br />'.ultim8magazine_truncate_utf8($data->content,30,FALSE, true).'</div></div>';
    }

		$i++;
	}
  $tabs = array();
	return ''. $out_t .'<div class="s2">'.$out_c.'</div><div class="clear"></div>';
  }
}



//drupal_add_css(path_to_theme().'/css/'.theme_get_setting('tm_value_theme_1').'.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
/*
drupal_add_js('
jQuery(document).ready(function($) {
	
	// No JavaScript
	$(\'html\').removeClass(\'no-js\');
	
	// Default configuration
	conf = $.extend({}, {
		timThumbPath:         \''.$base_url.'/'.path_to_theme().'/php/timthumb.php\',
		jwplayerPath:         \''.$base_url.'/'.path_to_theme().'/jwplayer/player.swf\',
		jwplayerSkinPath:     \''.$base_url.'/'.path_to_theme().'/jwplayer/whotube/whotube.xml\',
		jwplayerSkinHeight:   25,
		flexsliderOptions:    {animation: \'slide\', slideshow: false},
		fancyboxOptions:      {titlePosition: \'inside\'},
		fancyboxHideOnMobile: true,
		cookiePrefix:         \'websiteVk3q-\'
	}, typeof websiteConfig != \'undefined\' ? websiteConfig : {});
	
	// Browsers support
	ie = jQuery.browser.msie ? parseInt(jQuery.browser.version) : 256;
	
	// Browser notification
	if (ie <= 7) {
		$(\'.browser-notification\').show().find(\'.close\').click(function() {
			$(this).parent().hide();
		});
	}
	
	// Media types
	$(window).resize(function() {
		windowWidth = $(window).width();
		lteTablet = windowWidth < 980;
		lteMobile = windowWidth < 740;
		lteMini   = windowWidth < 320;
		gteDektop = windowWidth >= 980;
		gteTablet = windowWidth >= 740;
		gteMobile = windowWidth >= 320;
		tablet    = lteTablet && gteTablet;
		mobile    = lteMobile && gteMobile;
	}).trigger(\'resize\');
	
	// Top frame
	$(\'#top h1\').click(function() {
		$(this).next(\'#top .frame:not(:animated)\').slideToggle(300);
	});
	
	// Navigations
	$(\'nav li:has(ul)\').addClass(\'sub\');
	$(\'nav li ul li:has(ul)\').mouseenter(function() {
		var ul = $(\'> ul\', this);
		var cont = $(this).parents(\'.container\');
		if (ul.offset().left + ul.outerWidth() - cont.offset().left > cont.width()) {
			ul.addClass(\'left\');
		}
	});
	
	// Navigation main
	$(\'#nav-main li:has(ul)\').click(function(e) {
		if (lteMobile && e.pageX - $(this).offset().left >= $(this).width() - 45) {
			$(\'> ul\', this).slideToggle(300);
			return false;
		}
	});

	// Box
	$(\'.box[id][data-expires]\').each(function() {
		var cookieName = conf.cookiePrefix + $(this).attr(\'id\');
		if ($.cookie(cookieName) === null) {
			$(\'<a></a>\').addClass(\'close\').click(function() {
				$(this).unbind(\'click\').parent().fadeTo(300, 0).slideUp(300);
				$.cookie(cookieName, \'\', {expires: $(this).parent().data(\'expires\'), path: \'/\'});
			}).prependTo($(this));
		} else {
			$(this).hide();
		}
	});
	
	// Columns
	$(window).resize(function() {
		$(\'.columns > ul\').each(function() {
			var height = 0;
			$(this).css(\'height\', \'auto\');
			if (gteTablet) {
				$(\'.column\', this).each(function() {
					height = Math.max(height, $(this).height());
				});
				$(this).height(height);
			}
		});
	}).trigger(\'resize\');
	
	// Posts
	$(\'.post .featured > *\')
		.responsiveVideo()
		.filter(\'audio[id], video[id]\').each(function() {
			var type  = $(this).get(0).tagName.toLowerCase();
			var ratio = $(this).data(\'ratio\');
			if (typeof ratio == \'undefined\') {
				ratio = 1.77778;
			}
			jwplayer($(this).attr(\'id\')).setup({
				modes: [{type: \'html5\'}, {type: \'flash\', src: conf.jwplayerPath}],
				skin: conf.jwplayerSkinPath,
				controlbar: \'bottom\',
				width: \'100%\',
				height: type == \'audio\' ? conf.jwplayerSkinHeight : Math.round($(this).width() / ratio) + conf.jwplayerSkinHeight,
				stretching: \'fill\',
				events: {
					onReady: function() {
						var player = this;
						if (type == \'audio\') {
							$(player.container).css(\'overflow\', \'hidden\');
						} else {
							$(window).resize(function() {
								player.resize(null, Math.round($(player.container).width() / ratio) + conf.jwplayerSkinHeight);
							});
						}
					}
				}
			});
		});
	
	// Tabs
	$(\'.post .content .tabs\').each(function() {
		var tabs = $(\'> ul > li\', this);
		tabs.click(function() {
			$(this).parent().nextAll(\'div\').hide().eq($(this).index()).show();
			$(this).parent().find(\'li.active\').removeClass(\'active\');
			$(this).addClass(\'active\');
		});
		if (tabs.filter(\'.active\').length > 0) {
			tabs.filter(\'.active\').click();
		} else {
			tabs.eq(0).click();
		}
	});

	// Buttons
	$(\'.post .content button\').each(function() {
		if ($(this).is(\'[data-href]\')) {
			$(this).click(function() {
				window.location = $(this).data(\'href\');
			});
		}
		if ($(this).hasClass(\'icon-16\') || $(this).hasClass(\'icon-32\')) {
			$(\'<span></span>\').css(\'background-image\', $(this).css(\'background-image\')).prependTo($(this));
			$(this).css(\'background-image\', \'\');
		}
	});
	
	// Items
	$(\'.items\').imagesLoaded(function() {
		var _this = this;
		$(window).resize(function() {
			$(_this).masonry({
				itemSelector: \'.item:not(.hidden)\',
				isResizable: false,
				isAnimated: true
			});
		}).trigger(\'resize\');
		$(\'.filter\').show();
	});
	$(\'.items .item .image a\').each(function() {
		if ($(this).hasClass(\'fancybox\')) {
			$(this).hover(function() {
				$(\'.hover\', this).stop(true).fadeTo(150, 0.4);
			}, function() {
				$(\'.hover\', this).stop(true).fadeTo(150, 0);
			});
		} else {
			$(this).hover(function() {
				$(\'.hover\', this).stop(true).animate({borderWidth: \'12px\'}, 150);
			}, function() {
				$(\'.hover\', this).stop(true).animate({
					borderLeftWidth:   \'0px\',
					borderRightWidth:  \'0px\',
					borderTopWidth:    \'0px\',
					borderBottomWidth: \'0px\'
				}, 150);
			});
		}
	});
	*//*
	// Filter
	$(\'.filter\').each(function() {
		var links = $(\'> a\', this);
		var items = $(this).next(\'.items\');
		links.click(function() {
			var category = $(this).attr(\'href\').substr(1);
			if (category == \'\') {
				$(\'.item\', items).removeClass(\'hidden\').fadeIn(250);
			} else {
				$(\'.item\', items).each(function() {
					var regexp = new RegExp(\'\\b\'+category+\'\\b\', \'i\');
					if (
						(typeof $(this).data(\'category\') == \'undefined\') ||
						(!regexp.test($(this).data(\'category\')))
					) {
						$(this).addClass(\'hidden\').fadeOut(250);
					} else {
						$(this).removeClass(\'hidden\').fadeIn(250);
					}
				});
			}
			$(this).parent().find(\'.active\').removeClass(\'active\');
			$(this).addClass(\'active\');
			if (typeof items.data(\'masonry\') == \'object\') {
				items.masonry(\'reload\');
			}
		});
		if (links.filter(\'.active\').length > 0) {
			links.filter(\'.active\').click();
		} else {
			links.eq(0).click();
		}
	});
	// hash = unescape(self.document.location.hash);
	*//*
	// Twitter
	$(\'.widget-twitter\').each(function() {
		$(\'> .tweets\', this).tweet({
			username: $(this).data(\'username\'),
			count:    $(this).data(\'count\'),
			retweets: $(this).data(\'retweets\'),
			template: \'{tweet_text}<br /><small><a href="{tweet_url}">{tweet_relative_time}</a></small>\'
		});
	});
	
	// Flickr
	$(\'.widget-flickr\').each(function() {
		var _this = this;
		$(\'> .photos\', this).jflickrfeed({
			qstrings:     { id: $(this).data(\'id\') },
			limit:        $(this).data(\'count\'),
			itemTemplate: \'<li><a href="{{image_b}}" title="{{title}}"><img src="\'+conf.timThumbPath+\'?src={{image_s}}&w=41&h=41" alt="{{title}}" /></a></li>\'
		}, function(data) {
				var rel = \'fb-\'+$(_this).parents(\'aside\').attr(\'id\')+\'-widget-\'+$(_this).index();
				$(\'a\', _this).attr(\'rel\', rel).responsiveFancybox(conf.fancyboxOptions, function() { return lteMobile && conf.fancyboxHideOnMobile; });
		});
	});
	
	// Forms
	$(\'select\').yaselect();
	$(\'.yaselect-anchor\').each(function() {
		var width = Math.max($(\'select\', this).outerWidth()+10, parseInt($(this).css(\'min-width\')));
		$(this).width(width);
		$(\'.yaselect-select\', this).width(width);
	});
	
	// Images
	$(\'img.responsive\').responsiveImage(conf.timThumbPath);
	
	// Fancybox
	$(\'a.fancybox\').each(function() {
		var options = conf.fancyboxOptions;
		var matches = $(this).attr(\'href\').match(/^http:\/\/(www\.youtube\.com\/watch\?v=|youtu\.be\/)([-_a-z0-9]+)/i);
		if (matches != null) {
			$(this).attr(\'href\', \'http://www.youtube.com/v/\'+matches[2]).addClass(\'swf\');
		}
		if ($(this).hasClass(\'swf\')) {
			$.extend(options, {type: \'swf\', swf: {allowfullscreen: \'true\', wmode: \'transparent\'}});
		}
		$(this).responsiveFancybox(conf.fancyboxOptions, function() { return lteMobile && conf.fancyboxHideOnMobile; });
	});
	// Fancybox
	$(\'.node .field-name-field-image .field-items .field-item a\').each(function() {
		var options = conf.fancyboxOptions;
		var matches = $(this).attr(\'href\').match(/^http:\/\/(www\.youtube\.com\/watch\?v=|youtu\.be\/)([-_a-z0-9]+)/i);
		if (matches != null) {
			$(this).attr(\'href\', \'http://www.youtube.com/v/\'+matches[2]).addClass(\'swf\');
		}
		if ($(this).hasClass(\'swf\')) {
			$.extend(options, {type: \'swf\', swf: {allowfullscreen: \'true\', wmode: \'transparent\'}});
		}
		$(this).responsiveFancybox(conf.fancyboxOptions, function() { return lteMobile && conf.fancyboxHideOnMobile; });
	});
	
	// Flexslider
	$(\'.flexslider\').each(function() {
		var _this = this;
		$(\'.slides > li\', this).hide();
		$(this).flexslider($.extend({}, conf.flexsliderOptions, {
			before: function(slider) {
				var descs = $(_this).next(\'.descriptions\').find(\'article\');
				if (slider.animatingTo != slider.currentSlide && descs.length >= slider.slides.length) {
					descs.filter(\':visible\').fadeOut(slider.vars.animationDuration / 2, function() {
						descs.eq(slider.animatingTo).fadeIn(slider.vars.animationDuration / 2);
					});
				}
			}
		})).hover(function() {
			$(\'.flex-direction-nav\', this).stop(true).fadeTo(100, 1);
		}, function() {
			$(\'.flex-direction-nav\', this).stop(true).fadeTo(100, 0);
		});
	});
	
	// Contact form
	$(\'.contact-form\').submit(function() {
		if ($(\'input[type="submit"]\', this).prop(\'disabled\')) {
			return false;
		}
		var _this = this;
		$(\'input[type="submit"]\', this).prop(\'disabled\', true);
		$(\'.message\', this).slideUp(300);
		$(\'.load\', this).fadeIn(300);
		$.ajax({
			url: $(this).attr(\'action\'),
			type: \'POST\',
			data: $(this).serialize(),
			dataType: \'json\',
			complete: function() {
				$(\'input[type="submit"]\', _this).prop(\'disabled\', false);
				$(\'.load\', _this).fadeOut(300);
			},
			success: function(data) {
				$(\'.message\', _this).removeClass(\'green orange\');
				if (data === null) {
					$(\'.message\', _this)
						.text(\'Unknown error.\')
						.addClass(\'orange\')
						.slideDown(300);
				} else {
					$(\'.message\', _this)
						.text(data.message)
						.addClass(data.result ? \'green\' : \'orange\')
						.slideDown(300);
					if (data.result) {
						$(\'input[type="text"], textarea\', _this).val(\'\');
					}
				}
			}
		});
		return false;
	});
	
});
', array('type' => 'inline',  'scope' => 'footer', 'weight' => 5));
*/

function bestmobile_get_imgurl(&$vars) {
}

function bestmobile_get_pre() {
$style = theme_get_setting('skin');
switch ($style) {
	case 0:
		$p = 'bright';
		break;
	case 1:
		$p = 'dark';
		break;
	default:
		$p = 'bright';
}
return $p;
}

function bestmobile_slideshow_text($data = '', $print = FALSE) {
  static $out = '';
  if ($data) {
	  $out .= $data;	  
  }
  if ($print and $out) {
    return $out;
  }
}




function ultim8magazine_truncate_utf8($string, $len, $wordsafe = FALSE, $dots = FALSE, &$ll = 0) {

  if (drupal_strlen($string) <= $len) {
    return $string;
  }

  if ($dots) {
    $len -= 4;
  }

  if ($wordsafe) {
    $string = drupal_substr($string, 0, $len + 1); // leave one more character
    if ($last_space = strrpos($string, ' ')) { // space exists AND is not on position 0
      $string = substr($string, 0, $last_space);
      $ll = $last_space;
    }
    else {
      $string = drupal_substr($string, 0, $len);
	  $ll = $len;
    }
  }
  else {
    $string = drupal_substr($string, 0, $len);
	$ll = $len;
  }

  if ($dots) {
    $string .= ' ...';
  }

  return $string;
}


