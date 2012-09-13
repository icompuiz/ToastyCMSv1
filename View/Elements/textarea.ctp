<?=$this->Form->error($fieldname)?>

<? if (!empty($description) ) { ?>
<div class='field_description'><p><?=$description?></p></div>
<? } ?>
<div>
<?=$this->Form->textarea($fieldname, $options)?>
</div>