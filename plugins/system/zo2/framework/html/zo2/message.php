<div class='zo2-message'>
    <div class="alert alert-<?php echo $type; ?>">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php if (trim($header) != '') : ?>
            <h4><?php echo trim($header); ?></h4>
        <?php endif; ?>
        <?php echo $message; ?>
    </div>
</div>