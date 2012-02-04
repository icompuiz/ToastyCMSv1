<h1>Site Management</h1>
<div class="admin">
<div class="admin_links">
	<div class="">
			<?=$this->Html->link('Content and Categories', array('manager' => 'true','controller'=>'categories'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Site Layouts', array('manager' => 'true','controller'=>'site_layouts'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Events', array('manager' => 'true', 'controller'=>'events'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Galleries', array('manager' => 'true','controller'=>'galleries'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Media and Files', array('manager' => 'true', 'controller'=>'media_files'))?>
	</div>
	<div class="">
			<?=$this->Html->link('Member Groups and Members', array('manager' => 'true', 'action'=>'member_groups'))?>
	</div>
</div>
</div>