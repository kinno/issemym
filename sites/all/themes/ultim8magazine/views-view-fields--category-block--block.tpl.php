<?php 
ultim8magazine_set_category(false, $fields['nid']->content, $fields['title']->content, $fields['body']->content, $fields['created']->content, ($_SESSION['ultim8magazinetaxdisp'] ? $fields['field_image_1']->content : $fields['field_image']->content)); 
?>