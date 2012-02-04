<?php

// check if a user is logged in
$group_id = $this->Session->read('Auth.User.group_id');
$user_id = $this->Session->read('Auth.User.id');

if ( $group_id == 1 || $group_id == 2 ) {
	$admin = true;
} else {
	$admin = false;
}

$session_active = false;
if ($group_id) {
	$session_active = true;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
			<?=$site_name?>
			<? if (isset($title_for_page)) echo "| $title_for_page" ?>
		</title>
	<?php

		echo $this->Html->meta('icon');
		$css = array('stylesheets/screen','stylesheets/styles','stylesheets/main_forms');

		if ( isset( $css_files ) && $css_files != '' ) {
			$css_files = split(',', $css_files);
			$css = array_merge($css, $css_files);
		}
		$css = array_diff($css, array(''));

		echo $this->Html->css($css);
		
		if ( isset($inline_css) && $inline_css != '' ) {
			echo "<style type='text/css'>";
			echo $inline_css;
			echo "</style>";
		}
	?>
	
</head>
<body class="two-col">
<div id="container">

	<div id="content">
		<div id="breadCrumbs">
			<?=$this->Html->getCrumbs(" | ", "Home")?>
		</div>
		<div id="sessionFlash">
			<?=$this->Session->flash()?>
		</div>
		<div id="main">
			<?=$content_for_layout?>
		</div>
	</div>
	<div id="footer">
		
	</div>
</div>
</body>
<?php
  $js = array('jquery');
	//<!--Specific Page Scripts-->
	if ( isset($js_files) && $js_files != '') {
		$js_files = split(',', $js_files);
		$js = array_merge($js, $js_files );
	}
	$js = array_diff($js, array(''));

	echo $this->Html->script($js);
	

	if (isset($inline_js) && $inline_js != '') {
		echo $this->Html->scriptBlock($inline_js );
	}
	echo $scripts_for_layout;
?>
</html>

