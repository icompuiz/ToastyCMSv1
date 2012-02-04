<h1>Site Administration</h1>
<div class="admin">
<div class="admin_links">
	<div class="">
			<?=$this->Html->link('Users and Groups', array('controller' => 'users'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Permissions', array('controller' => 'permissions'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Settings', array('controller' => 'settings'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Admin Content and Categories', array('admin' => true, 'controller' => 'categories'))?>
	</div>
	<div class="">
			<?=$this->Html->link('View Site', '/')?>
	</div>

</div>
</div>