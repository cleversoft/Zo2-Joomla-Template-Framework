<!-- Modal -->
<?php
$modal = new JObject($modal);
?>
<div id="<?php echo $modal->get('id'); ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal->get('id'); ?>Label" aria-hidden="true">
    <?php if ($modal->get('backgrop', true) || ($modal->get('title', true))) : ?>
        <div class="modal-header">
            <?php if ($modal->get('backgrop', true)) : ?>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php endif; ?>
            <?php if ($modal->get('title') != '') : ?>
                <h3 id="myModalLabel"><?php echo $modal->get('title', ZO2); ?></h3>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="modal-body">
        <p><?php echo $modal->get('content'); ?></p>
    </div>
    <div class="modal-footer">
        <?php
        foreach ($buttons as $button) {
            $html = '<button ';
            foreach ($button as $key => $value) {
                if ($key != 'text')
                    $html .= $key . '="' . $value . '"';
            }
            $html .= '>' . $button['text'] . '</button>';
            echo $html;
        }
        ?>        
    </div>
</div>