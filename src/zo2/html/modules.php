<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Hiepvu
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
 //no direct accees
defined ('_JEXEC') or die ('resticted aceess');

function modChrome_ZO2Xhtml($module, &$params, &$attribs)
{
    ?>
    <div class="zo2-module module<?php echo $params->get('moduleclass_sfx'); ?>" id="module_<?php echo $module->id; ?>">
        <div class="module-inner">
            <?php if ($module->showtitle != 0) : ?>
                <h3 class="module-title"><span><?php echo $module->title; ?></span></h3>
            <?php endif; ?>
            <div class="module-ct">
                <?php echo $module->content; ?>
            </div>
        </div>
    </div>
<?php
}
