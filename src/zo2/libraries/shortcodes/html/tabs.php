<?php
$shortcodes = Zo2Shortcodes::getInstance();
?>
<ul class="nav nav-tabs">
    <?php echo $shortcodes->execute($this->get('content')); ?>
</ul>