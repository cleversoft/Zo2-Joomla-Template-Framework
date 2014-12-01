<div class='zo2-message'>
    <div class="alert alert-<?php echo $type; ?>">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php if (isset($header)) : ?>
            <h4><?php echo $header; ?></h4>
        <?php endif; ?>
        <?php echo $message; ?>
    </div>
</div>
