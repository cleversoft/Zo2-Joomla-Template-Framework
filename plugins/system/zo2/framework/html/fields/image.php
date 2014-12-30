<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die;
JHtml::_('behavior.modal', 'a.modal');
$elementId = $this->data['id'];
/**
 * Temporary hot fix
 * @todo using commedia api
 */
$script = array();
$script[] = '	function jInsertFieldValue(value, id) {';
$script[] = '		var $ = jQuery.noConflict();';
$script[] = '		var old_value = $("#" + id).val();';
$script[] = '		if (old_value != value) {';
$script[] = '			var $elem = $("#" + id);';
$script[] = '			$elem.val(value);';
$script[] = '			$elem.trigger("change");';
$script[] = '			if (typeof($elem.get(0).onchange) === "function") {';
$script[] = '				$elem.get(0).onchange();';
$script[] = '			}';
$script[] = '			jMediaRefreshPreview(id);';
$script[] = '		}';
$script[] = '	}';

$script[] = '	function jMediaRefreshPreview(id) {';
$script[] = '		var $ = jQuery.noConflict();';
$script[] = '		var value = $("#" + id).val();';
$script[] = '		var $img = $("#" + id + "_preview");';
$script[] = '		if ($img.length) {';
$script[] = '			if (value) {';
$script[] = '				$img.attr("src", "' . JUri::root() . '" + value);';
$script[] = '				$("#" + id + "_preview_empty").hide();';
$script[] = '				$("#" + id + "_preview_img").show()';
$script[] = '			} else { ';
$script[] = '				$img.attr("src", "")';
$script[] = '				$("#" + id + "_preview_empty").show();';
$script[] = '				$("#" + id + "_preview_img").hide();';
$script[] = '			} ';
$script[] = '		} ';
$script[] = '	}';

$script[] = '	function jMediaRefreshPreviewTip(tip)';
$script[] = '	{';
$script[] = '		var $ = jQuery.noConflict();';
$script[] = '		var $tip = $(tip);';
$script[] = '		var $img = $tip.find("img.media-preview");';
$script[] = '		$tip.find("div.tip").css("max-width", "none");';
$script[] = '		var id = $img.attr("id");';
$script[] = '		id = id.substring(0, id.length - "_preview".length);';
$script[] = '		jMediaRefreshPreview(id);';
$script[] = '		$tip.show();';
$script[] = '	}';
JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));
?>
<div class="control-group  <?php echo (isset($this->label['class_wrap'])) ? $this->label['class_wrap'] : ''; ?>">
    <!-- Label -->
    <div class="control-label">
        <label class="control-label zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>" for="<?php echo $this->data['name']; ?>">
            <?php echo $this->label['label']; ?>
        </label>
        <div class="label-desc"><?php echo $this->label['description']; ?></div>
    </div>
    <!-- Input -->
    <div class="controls">
        <div class="input-prepend input-append">
            <div class="media-preview add-on">
                <span class="hasTipPreview" title=""><i class="fa fa-eye"></i></span>
            </div>
            <input type="text" name="<?php echo $this->data['name']; ?>" id="<?php echo $elementId; ?>" value="<?php echo $this->data['value']; ?>" readonly="readonly" class="input-small">
            <a class="modal btn" title="Select" href="index.php?option=com_media&view=images&tmpl=component&asset=com_templates&author=&fieldid=<?php echo $elementId; ?>&folder=" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
                <?php echo JText::_('ZO2_SELECT'); ?>
            </a>
            <a class="btn hasTooltip" title="" href="#" onclick="jInsertFieldValue('', '<?php echo $elementId; ?>');
                    return false;" data-original-title="Clear">
                <i class="fa fa-remove"></i>
            </a>
        </div>
    </div>
</div>
