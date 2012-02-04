<?=$this->Actions->settings_databases()?>
<?=$this->ContentBar->dataSources($sources)?>
<div class="right">
<?=$this->Form->create('CsvConfiguration')?>

<?=$this->Form->hidden('datasource')?>
<?=$this->Form->input('path')?>
<?=$this->Form->input('extension')?>
<?=$this->Form->label('readonly')?>
<?=$this->Form->checkbox('readonly')?>

<?=$this->Form->end('Submit')?>
</div>