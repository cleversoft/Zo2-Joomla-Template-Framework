<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$shortCodes = $this->get('shortcodes');
/* Do sorting */
foreach ($shortCodes as $shortCode) {
    if (isset($shortCode->group))
        $list[$shortCode->group][] = $shortCode;
    else
        $list['General'][] = $shortCode;
}
?>
<a href="#zo2Modal" role="button" class="btn modal-button modal" data-toggle="modal"><i class="icon-arrow-down"></i>ZO2 ShortCodes</a>
<?php if (Zo2Framework::isJoomla25()) { ?>
    <div class="fakeWrapper hide">
        <div id="zo2Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="zo2ModalLabel" aria-hidden="true">
        <?php } else { ?>            
            <div id="zo2Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="zo2ModalLabel" aria-hidden="true">
            <?php } ?>               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h2 id="zo2ModalLabel">ZO2 ShortCodes</h2>
            </div>
            <div class="modal-body">
                <!-- Shortcodes button -->
                <?php foreach ($list as $key => $shortCodes) { ?>
                    <h3><?php echo $key; ?></h3>
                    <div class="shortcode-items">
                        <?php foreach ($shortCodes as $shortCode) { ?>
                            <div class="shortcode-item">
                                <a class="btn" href="javascript: void(0);" onclick="jSelectShortcode('<?php echo $shortCode->pattern; ?>')" title="<?php echo $shortCode->name; ?>">
                                    <?php echo $shortCode->name; ?>
                                </a>                    
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <?php if (Zo2Framework::isJoomla25()) { ?>
        </div>
    <?php } ?>
    <script language="javascript" type="text/javascript">

        function jSelectShortcode(text) {
            text = text.replace(/'/g, '"');
            if (document.getElementById('jform_articletext') != null) {
                jInsertEditorText(text, 'jform_articletext');
            }
            if (document.getElementById('text') != null) {
                jInsertEditorText(text, 'text');
            }
            if (document.getElementById('jform_description') != null) {
                jInsertEditorText(text, 'jform_description');
            }
            if (document.getElementById('jform_content') != null) {
                jInsertEditorText(text, 'jform_content');
            }
            jQuery('#zo2Modal').modal('hide');
        }
    </script>