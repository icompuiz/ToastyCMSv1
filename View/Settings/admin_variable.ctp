<?=$this->Actions->settings_variables()?>
<?=$this->ContentBar->variables($variables)?>
<div class="right">
<?=$this->Form->create('Variable')?>
<fieldset>
<?=$this->Form->input('key')?>
<?=$this->Form->input('value')?>
<?=$this->Form->input('comment')?>
</fieldset>
<?=$this->Form->end('Submit')?>
</div>