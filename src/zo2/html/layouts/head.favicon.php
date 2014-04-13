<?php
$favIcon = Zo2Framework::getInstance()->get('favicon');
?>
<?php if ($favIcon) { ?>
    <link rel="icon" type="image/x-icon" href="<?php echo $favIcon ?>" />
<?php } ?>