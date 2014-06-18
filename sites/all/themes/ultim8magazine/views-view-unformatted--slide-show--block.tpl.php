<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
/*
if (theme_get_setting('tm_value_theme_2') == 'text') { 
  print ($n1 ? '<div class="alpha big flexslider"><ul class="slides">'.$n1.'</ul></div><div class="descriptions beta">'.bestmobile_slideshow_text('', true).'</div>' : '');
} else {
*/
  print ($n1 ? '<ul id="slideshow">'.$n1.'</ul>
	<div id="slideshowwrapper">		
		<div id="fullsize">
			<div id="imgprev" class="imgnav" title="Previous Image"></div>
			<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<div id="information">
				<h3></h3><h6></h6>
				<p></p>
			</div>
		</div>
		<div id="thumbnails">
			<div id="slideleft" title="Slide Left"></div>
			<div id="slidearea">
				<div id="slider"></div>
			</div>
			<div id="slideright" title="Slide Right"></div>
		</div>      
	</div>
  <script type="text/javascript">

	$(\'slideshow\').style.display=\'none\';
	$(\'slideshowwrapper\').style.display=\'block\';
	var slideshow=new TINY.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=5;
		slideshow.link="linkhover";
		slideshow.info="information";
		slideshow.thumbs="slider";
		slideshow.left="slideleft";
		slideshow.right="slideright";
		slideshow.scrollSpeed=4;
		slideshow.spacing=9;
		slideshow.active="#ccc";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	}

</script>
  
  ' : '');
//}
?>