<?=$this->Actions->settings_config()?>
<?=$this->Form->create('Config')?>
<fieldset>
<legend>Edit config.php</legend>
<?=$this->Form->textarea('file')?>
</fieldset>
<?=$this->Form->end('Submit')?>