<?=$this->Actions->settings_databases()?>
<?=$this->ContentBar->dataSources($sources)?>

<div class="right">
<?=$this->Form->create('MySqlDatabaseConfiguration')?>

<?=$this->Form->input('datasource')?>
<?=$this->Form->input('persistent')?>
<?=$this->Form->input('host')?>
<?=$this->Form->input('login')?>
<?=$this->Form->input('password')?>
<?=$this->Form->input('database')?>
<?=$this->Form->input('prefix')?>
<?=$this->Form->input('port')?>
<?=$this->Form->input('encoding')?>
<?=$this->Form->input('schema')?>
<?=$this->Form->input('encoding')?>
<?=$this->Form->input('unix_socket')?>

<?=$this->Form->end('Submit')?>
</div>