<?=$this->Actions->events_edit()?>
<div class="events form">
<?php echo $this->Form->create('Event', array('type' => 'file'));?>
	<fieldset>

	<fieldset>
		<legend><h1><?php echo __('Edit Event'); ?></h1></legend>
	<?php
		echo $this->Form->input('user_id', array('options' => $owner, 'label' => 'Event Owner'));
		echo $this->Form->input('title');
		echo $this->Form->input('alias');
		echo $this->Form->input('description');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('location');
		echo $this->Form->input('full_description', array('class' => 'mceEditor', 'rows' => '15'));
				// echo $this->Form->input('has_registration');
		// echo $this->Form->input('registration_expiration_date');
	?>
	<div class="files tabarea">
		<ul class="tabs">
			<li class="tab1" class="tabs" tab="tab1" group="group1">
				<a href="#tab1">Flier</a>
			</li>
			<li class="tab2" class="tabs" tab="tab2" group="group1">
				<a href="#tab2">Banner</a>
			</li>
		</ul>
		<div class="mainTabContent group1">
			<div class="tab1 tabContent text">
				<?=$this->Form->label('picture', "Upload Event Flier")?>
				<?=$this->Multifile->makeFileArea('picture', 'Event', 1, 'jpg, jpeg, png, gif')?>
				<?=$this->Form->error('picture')?>
				<?=$this->Form->hidden('old_picture')?>
				<div class="preview_image">
				Current Picture
				<?=$this->Html->image(substr($this->Form->value('Event.old_picture'), 4))?>
				</div>
			</div>
			<div class="tab2 tabContent text">
				<?=$this->Form->label('featured_event', "Mark this Event as Featured")?>
				<?= $this->Form->checkbox('featured_event')?>
				<?=$this->Form->label('banner_image', "Upload Banner Image")?>
				<?=$this->Multifile->makeFileArea('banner_image', 'Event', 1,'jpg, jpeg, png, gif')?>
				<?=$this->Form->error('banner_image')?>
				<?=$this->Form->hidden('old_banner')?>
				<? if ($this->Form->value('Event.old_banner') != "NOT FEATURED") { ?>
				<div class="preview_image">
				Current Banner
				<?=$this->Html->image(substr($this->Form->value('Event.old_banner'),4))?>
				</div>
				<? } ?>
			</div> 
		</div>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
