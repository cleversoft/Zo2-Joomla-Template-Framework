<?php

/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

$modChromes = array('zo2_xhtml', 'zo2_flat', 'zo2_raw', 'zo2_menu', 'none'  );

function modChrome_zo2_xhtml($module, $params, $attribs)
{ ?>
    <div class="module <?php echo $params->get('moduleclass_sfx'); ?>">
        <div class="mod-wrapper clearfix">
            <?php if ($module->showtitle != 0) { ?>
                <h3 class="moduletitle">
                    <?php
                    echo '<span>'.$module->title.'</span>';
                    ?>
                </h3>
                <?php
                $modsfx=$params->get('moduleclass_sfx');
                if ($modsfx !='') echo '<span class="sp-badge ' . $modsfx . '"></span>';
                ?>
            <?php } ?>
            <div class="mod-content clearfix">
                <div class="mod-inner clearfix">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="gap"></div>
<?php
}

function modChrome_zo2_flat($module, $params, $attribs)
{ ?>
    <div class="module <?php echo $params->get('moduleclass_sfx'); ?>">
        <div class="mod-wrapper-flat clearfix">
            <?php if ($module->showtitle != 0) { ?>
                <h3 class="moduletitle">
                    <?php
                    echo '<span>'.$module->title.'</span>';
                    ?>
                </h3>
                <?php
                $modsfx=$params->get('moduleclass_sfx');
                if ($modsfx !='') echo '<span class="sp-badge ' . $modsfx . '"></span>';
                ?>
            <?php } ?>
            <?php echo $module->content; ?>
        </div>
    </div>
    <div class="gap"></div>
<?php
}

function modChrome_zo2_raw($module, $params, $attribs)
{
    echo $module->content;
}

function modChrome_zo2_menu($module, $params, $attribs)
{ ?>
    <div class="module <?php echo $params->get('moduleclass_sfx'); ?>">
        <div class="mod-wrapper-menu clearfix">
            <?php echo $module->content; ?>
        </div>
    </div>
<?php
}