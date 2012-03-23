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
		<?php
		// <div class="">
				// <?=$this->Html->link('Admin Content and Categories', array('admin' => true, 'controller' => 'categories'))?>
				<?
		// </div>
		?>
		<div class="">
				<?=$this->Html->link('Site Layouts', array('admin' => 'true','controller'=>'site_layouts'))?>
		</div>
		<div class="">
				<?=$this->Html->link('Members', array('admin' => 'true', 'action'=>'member_groups'))?>
		</div>
	</div>
</div>