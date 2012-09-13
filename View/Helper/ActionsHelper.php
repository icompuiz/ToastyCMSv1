<?php

class ActionsHelper extends AppHelper {

	public $helpers = array('Html', 'Form');
	
	public function backToAdministration() {
		$this->pre();
		?>
		<li><?php echo $this->Html->link(__('Back to Administration Panel'), array('admin' => true,'controller' => 'administration', 'action' => 'index'));?></li>
		<?php
		$this->post();
	}
	public function backToManagement() {
		$this->pre();
		$this->_backToManagement();
		$this->post();
	}
	
	
	public function _backToManagement() {
		?>
		<li><?php echo $this->Html->link(__('Back to Management Panel'), array('manager' => true, 'controller' => 'management', 'action' => 'index'));?></li>
		<?php
	}
	
	public function backToSettings() {
		$this->pre();
		?>
		<li><?php echo $this->Html->link(__('Back to Settings'), array('controller' => 'settings', 'action' => 'index'));?></li>
		<?php
		$this->post();
	}
	
	public function backToMembersGroups() {
		$this->pre();
		?>
			<li><?php echo $this->Html->link(__('Back to Members and Groups'), array('admin' => true, 'controller' => 'administration', 'action' => 'member_groups'));?></li>
			<li><?php echo $this->Html->link(__('Back to Administration Panel'), array('admin' => true,'controller' => 'administration', 'action' => 'index'));?></li>
		<?php
		$this->post();
	}
	
	public function settings_databases() {
		$this->pre();
		?>
		<li><?php echo $this->Form->postLink(__('Back to All Settings'), array('controller' => 'settings', 'action' => 'index'), null,  __('Are you sure? All changes will be lost.')); ?></li>
		<li><?php echo $this->Form->postLink(__('Cancel'), array('controller' => 'settings','action' => 'databases'), null, __('Are you sure you want to cancel? All changes will be lost.')); ?></li>
		<?php
		$this->post();
	}
	
	public function settings_variables() {
		$this->pre();
		?>
		<li><?php echo $this->Form->postLink(__('Back to All Settings'), array('controller' => 'settings', 'action' => 'index'), null,  __('Are you sure? All changes will be lost.')); ?></li>
		<li><?php echo $this->Form->postLink(__('Cancel'), array('controller' => 'settings','action' => 'variables'), null, __('Are you sure you want to cancel? All changes will be lost.')); ?></li>
		<?
		$this->post();
	}
	
	public function settings_config() {
	
		$this->pre();
		$this->cancel();
		$this->post();
	
	}

	public function contents_add() {
		$this->pre();
		?>
		<li><?php echo $this->Form->postLink(__('Cancel'), array('controller' => 'categories','action' => 'index'), null, __('Are you sure you want to cancel? All changes will be lost.')); ?></li>
		<?
		$this->post();
	}

	public function categories_edit() {
		$this->pre();
		?>
		<li><?php echo $this->Html->link(__('Add Content'), array('controller' => 'contents','action' => 'add', $this->Form->value('Category.id'))); ?></li>
		<li><?php echo $this->Form->postLink(__('Cancel'), array('controller' => 'categories','action' => 'index'), null, __('Are you sure you want to cancel')); ?></li>
		<? 
		if ($this->Form->value('Category.id') > 4 )  {
		?>
			<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $this->Form->value('Category.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Category.title'))); ?></li>
		<? 
		} 
		$this->post();
	}
	public function contents_edit() {
		$this->pre();
		?>
		<li><?php echo $this->Form->postLink(__('View Content'), array('manager' => false, 'controller' => 'content', 'action' => 'display', $this->Form->value('Content.alias')), null,  __('Are you sure you want to view? All changes will be lost.')); ?></li>
		<?$this->cancel('categories');?>
		<li><?php echo $this->Form->postLink(__('Delete Content'), array('action' => 'delete', $this->Form->value('Content.id')), null, __('Are you sure you want to delete %s? Action is irrevesible', $this->Form->value('Content.title'))); ?></li>
		<?
		$this->post();
	}
	
	
	
	public function siteLayouts_add() {
		$this->pre();
		$this->cancel();
		$this->post();
	}
	
	public function siteLayouts_edit() {
		$this->pre();
		$this->cancel();
		if ($this->Form->value("SiteLayout.id") > 4) { 
		?>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SiteLayout.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('SiteLayout.title'))); ?></li>
		<? 
		} 
		$this->post();
	}
	
	public function users_add() {
		$this->pre();
		$this->cancel();
		$this->post();
	}
	
	public function users_edit() {
		$this->pre();
		$this->cancel();
		if ($this->Form->value('User.id') != 1 )  {
		?>
			<li><?=$this->Form->postLink(__('Delete User'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('User.username')))?></li>
		<?
		} 
		$this->post();
	}
	
	public function groups_add() {
	
		$this->users_add();
		
	}
	
	public function groups_edit() {
	
		$this->pre();
		?>
		<li><?php echo $this->Html->link(__('Add User'), array('controller' => 'users','action' => 'add', $this->Form->value('Group.id'))); ?></li>
		<? if ($this->Form->value('Group.id') > 3 )  {
		$this->cancel('users');
		?>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $this->Form->value('Group.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Group.name'))); ?></li>
		<? } ?>
		<?
		$this->post();
	
	}
	
	private function cancel($controller=null) {
	
		if (!$controller) {
		?>
		<li><?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), null,  __('Are you sure? All changes will be lost.')); ?></li>
		<?php
		} else {
		?>
		<li><?php echo $this->Form->postLink(__('Cancel'), array('controller' => $controller, 'action' => 'index'), null,  __('Are you sure? All changes will be lost.')); ?></li>
		<?php
		}
	}
	
	public function mediaFiles_index() {
	
		$this->pre();
		
		?>
		
		<li><?php echo $this->Html->link(__('Upload Files'), array('action' => 'add'));?></li>
		<li><?php echo $this->Html->link(__('Back to Management Panel'), array('controller' => 'management', 'action' => 'index'));?></li>

		
		<?
		
		
		$this->post();
	
	}
	public function mediaFiles_add() {
	
		$this->pre();
		$this->cancel();
		$this->post();
	
	}
	public function mediaFiles_edit() {
	
		$this->pre();
		$this->cancel();
		?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MediaFile.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MediaFile.name'))); ?></li>
		<li><?php echo $this->Html->link(__('Upload Files'), array('action' => 'add'));?></li>
		<?
		$this->post();
	
	}
	public function mediaFiles_view($mediaFile) {
	
		$this->pre();
		?>
		<li><?php echo $this->Form->postLink(__('Delete File'), array('action' => 'delete', $mediaFile['MediaFile']['id']), null, __('Are you sure you want to delete # %s?', $mediaFile['MediaFile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Files'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Upload Files'), array('action' => 'add')); ?> </li>
		<?
		$this->post();
	
	}
	
	public function events_index() {
		$this->pre();
		?>
		<li><?php echo $this->Html->link(__('New Event'), array('manager' => true,'action' => 'add')); ?></li>
		
		<?
		$this->_backToManagement();
		$this->post();

	}
	
	public function manager_user_events_index() {
	$this->pre();
		?>
			<li><?php echo $this->Html->link(__('Back to All Events'), array('manager' => true, 'controller' => 'events', 'action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('New Event'), array('manager' => true,'action' => 'add')); ?></li>
		
		<?
		$this->_backToManagement();
		$this->post();
	
	}
	
	public function events_view2($event) {
	
		$this->pre();
	?>
		<li><?php echo $this->Html->link(__('Edit Event'), array('manager' => true, 'action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('manager' => true, 'action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete %s?', $event['Event']['title'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('manager' => true,'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('manager' => true,'action' => 'index')); ?> </li>
	<?
		$this->post();
	
	}
	
	
	public function events_view($event) {
	
		$this->pre();
	?>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
	<?
		$this->post();

	
	}
	public function events_edit() {
	
		$this->pre();
		$this->cancel();
	?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Event.title'))); ?></li>
	<?
		$this->post();

	
	}
	public function events_add() {
	
		$this->pre();
		$this->cancel();
		$this->post();

	
	}
	
	public function events_post($event) {
		$this->pre();
	?>
		<li><?=$this->Html->link(__('Edit'), array('manager' => true,'action' => 'edit', $event['Event']['id']))?>
		<li><?=$this->Form->postLink('Delete', array('manager' => true,'action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['title']))?>
	<?
		$this->post();
	}
	public function galleries_add() {
		
		$this->pre();
		$this->cancel();
		$this->post();
	
	}
	public function galleries_edit() {
		
		$this->pre();
		$this->cancel();?>
		<li><?php echo $this->Form->postLink(__('Delete Gallery'), array('action' => 'delete', $this->Form->value('Gallery.id')), null, __('Are you sure you want to delete %s? Action is irrevesible', $this->Form->value('Gallery.name'))); ?></li>
		<?
		$this->post();
	
	}
	
	public function memberGroups_add() {
	
		$this->pre();
		$this->cancel();
		?>
		<?
		$this->post();
	
	}
	public function memberGroups_edit() {
		$this->pre();
		$this->cancel();
		?>
		<li><?php echo $this->Html->link(__('View Member Group'), array('controller' => 'member_groups','action' => 'view', $this->Form->value('MemberGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Add Member'), array('controller' => 'members','action' => 'add', $this->Form->value('MemberGroup.id'))); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'member_groups', 'action' => 'delete', $this->Form->value('MemberGroup.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Group.name'))); ?></li>
		<?
		$this->post();
	}
	public function memberGroups_editMember() {
		$this->pre();
		$this->cancel();
		?>
		<li><?=$this->Html->link(__('Edit Profile'), array('controller' => 'profiles', 'action' => 'edit', $this->Form->value('User.member_id')))?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'members', 'action' => 'delete', $this->Form->value('User.member_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('User.full_name'))); ?></li>
		<?
		$this->post();
	}
	
	public function memberGroups_view($member_group) {
		
		$this->pre();
		
		?>
		<li><?=$this->Html->link('Back to Member Groups', array('controller' => 'member_groups', 'action' => 'index')) ?></li>

		<?
		
		$this->post();
	
	}
	
	public function profiles_edit_user_profile() {
		$this->pre();
		?>
		<li><?php echo $this->Html->link(__('View Profile'), array('controller' => 'profiles', 'action' => 'view', $this->Form->value('Profile.member_id')))?></li>
		<li><?php echo $this->Html->link(__('Cancel'), array('controller' => 'members', 'action' => 'edit', $this->Form->value('Profile.member_id')))?></li>

		<?
		$this->post();
	}
	
	public function profiles_view($member) {
	
		$this->pre();
		?>
		<li><?=$this->Html->link('Back to Member Group', array('controller' => 'member_groups', 'action' => 'view', $member['MemberGroup']['id'])) ?></li>
		<?
		$this->post();
	
	}
	
	public function profileLayouts_edit() {
	
		$this->pre();
		$this->cancel();
		?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'profile_layouts', 'action' => 'delete', $this->Form->value('ProfileLayout.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('ProfileLayout.name'))); ?></li>
		<?
		$this->post();
	
	
	}
	
	
	public function profileLayouts_add() {
	
		$this->pre();
		$this->cancel();
		$this->post();
	
	
	}
	
	public function members_userEditMember() {
	
		$this->pre();
		?>
		<li><?=$this->Html->link(__('Cancel'), array('controller' => 'user_management'))?></li>
		<li><?=$this->Html->link(__('Edit Profile'), array('controller' => 'profiles', 'action' => 'edit', $this->Form->value('User.member_id')))?></li>
		<?
		$this->post();
	
	}
	
	public function forms_edit() {
	
		$this->pre();
		
		?>
		<li><?=$this->Html->link('View Submissions', array('controller' => 'form_submissions', 'action' => 'index', $this->Form->value('Form.id'))) ?></li>
		<li><?=$this->backToManagement()?></li>

		<?
		
		$this->post();
	
	}
	
	public function form_submissions_index($id = null) {
		$this->pre();
		
		?>
		<li><?=$this->Html->link('Back to Form', array('controller' => 'forms', 'action' => 'edit', $id)) ?></li>
		<li><?=$this->backToManagement()?></li>

		<?
		
		$this->post();
	}
	
	private function pre() {
		?>
		<div class="actions">
		<ul>
		<?php
	}
	
	private function post() {
		?>
		</ul>
		</div>
		<div class="clear"></div>
		<?php
	}


	public function tmp() {
	?>

	<?php
	}
}