<?php
$favIcon = Zo2Factory::getFramework()->get('favicon');
?>
<?php if ($favIcon) { ?>
    <link rel="icon" type="image/x-icon" href="<?php echo $favIcon ?>" />
<?php } ?>