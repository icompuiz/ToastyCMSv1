<?=$this->Actions->backToAdministration()?>

<h1>Site Management</h1>
<div class="admin">
<div class="admin_links">
	<div class="">
			<?=$this->Html->link('Member Groups and Members', array('admin' => 'true','controller'=>'member_groups'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Profile Layouts', array('admin' => 'true','controller'=>'profile_layouts'))?>
	</div>
</div>
</div>