<?=$this->Actions->backToManagement()?>

<h1>Site Management</h1>
<div class="admin">
<div class="admin_links">
	<div class="">
			<?=$this->Html->link('Member Groups and Members', array('manager' => 'true','controller'=>'member_groups'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Profile Layouts', array('manager' => 'true','controller'=>'profile_layouts'))?>
	</div>
</div>
</div>