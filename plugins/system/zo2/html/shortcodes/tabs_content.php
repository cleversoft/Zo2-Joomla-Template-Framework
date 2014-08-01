<?php
$shortcodes = Zo2Shortcodes::getInstance();
?>
<div class="tab-content">
    <?php echo $shortcodes->execute($this->get('content')); ?>
</div>