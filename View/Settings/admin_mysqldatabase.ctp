<?=$this->Actions->settings_databases()?>
<?=$this->ContentBar->dataSources($sources)?>
<div class="right">
<?=$this->Form->create('MySqlDatabaseConfiguration')?>

<?=$this->Form->hidden('datasource')?>
<?=$this->Form->label('persistent')?>
<?=$this->Form->checkbox('persistent')?>
<?=$this->Form->input('host')?>
<?=$this->Form->input('login')?>
<?=$this->Form->label('password')?>
<?=$this->Form->text('password')?>
<?=$this->Form->input('database')?>
<?=$this->Form->input('prefix')?>
<?=$this->Form->input('port')?>

<?=$this->Form->end('Submit')?>
</div>