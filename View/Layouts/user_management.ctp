<?php



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
			User Mode: <?=$site_name?>
			<? if (isset($title_for_page)) echo ":". $title_for_page ?>
		</title>
	<?php

		echo $this->Html->meta('icon');
		$css = array('stylesheets/main.administrator', 'stylesheets/admin.menu');
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
<body>

<div id="top_bar">
<div class="admin_menu actions">
	<ul>
               <li><?=$this->Html->link('User Home', '/user')?></li>
		<li><?=$this->Html->link('View Site', '/')?></li>
		<li><?=$this->Html->link('Logout', '/users/logout')?></li>
	</ul>
</div>
</div>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		
	</div>
</body>
<?php
  $js = array('jquery', 'dropdown', 'overflow_scroll');
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