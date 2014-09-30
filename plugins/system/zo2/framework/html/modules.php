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
