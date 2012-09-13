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
		$css = array('stylesheets/screen','stylesheets/styles','stylesheets/main_forms', 'stylesheets/nyubalsa/dropdown2');

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
	<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
</head>
<body class="two-col">
<div id="pre_header">
	<div id="quicklinks">
		<a onClick="return clickreturnvalue()" onMouseover="dropdownmenu(this, event, menu1, '122px')" onMouseout="delayhidemenu()">
			<?=$this->Html->image('nyubalsa/quicklinks.gif')?>
		</a>
		<a onClick="return clickreturnvalue()" onMouseover="dropdownmenu(this, event, menu2, '122px')" onMouseout="delayhidemenu()">
			<?=$this->Html->image('nyubalsa/schools.gif')?>
		</a>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<div class="clear">&nbsp;</div>
<div id="container">
	<div class="header">
		&nbsp;
		<div class="navigation_menu">
			<?=$this->Menu->output($navigationMenu)?>
		</div>
	</div>
	<div class="content">
		
		<!--div id="breadCrumbs">
			<?=$this->Html->getCrumbs(" | ", "Home")?>
		</div-->
		<div id="sessionFlash">
			<?=$this->Session->flash()?>
		</div>
		<div class="main">
			<?=$content_for_layout?>
		</div>
	</div>
</div>
<div class="footer">
</div>
</body>
<?php
  $js = array('jquery', 'dropdown');
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
