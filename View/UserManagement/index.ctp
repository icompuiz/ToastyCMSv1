<h1>Account Management</h1>
<div class="admin">
<div class="admin_links">
	<div class="">
			<?=$this->Html->link('Events', array('user' => 'true', 'controller'=>'events'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Membership', array('user' => 'true', 'controller'=>'members', 'action' => 'edit', $member['Member']['id']))?>
	</div>
	<div class="">
			<?=$this->Html->link('Profile', array('user' => 'true', 'controller'=>'profiles', 'action' => 'edit', $member['Member']['id']))?>
	</div>
</div>
</div>