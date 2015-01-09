<?php
/**
 * @version   $Id: modules.php 7645 2013-02-20 17:05:31Z james $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */
function modChrome_zo2($module, &$params, &$attribs)
{
    $classes = Zo2HelperClasses::extract($params->get('moduleclass_sfx'));
    $modClass = (isset($classes['classes'])) ? implode(' ', $classes['classes']) : '';
    $fa = '';
    if (isset($classes['fa']))
    {
        $fa = '<i class="fa fa-' . $classes['fa'] . '"></i>';
    }
    if (isset($classes['label']))
    {
        $module->title = '<span class="label label-' . $classes['label'] . '">' . $module->title . '</span>';
    }
    if (!empty($module->content)) :
        ?>
        <div class="moduletable <?php echo htmlspecialchars($modClass); ?>">
            <?php if ((bool) $module->showtitle) : ?>
                <?php echo $fa; ?><h3><?php echo $module->title; ?></h3>
            <?php endif; ?>
            <?php echo $module->content; ?>
        </div>
        <?php
    endif;
}

/**
 * 
 * @param type $module
 * @param type $params
 * @param type $attribs
 */
function modChrome_offcanvas($module, &$params, &$attribs)
{
    $classes = Zo2HelperClasses::extract($params->get('moduleclass_sfx'));
    $modClass = (isset($classes['classes'])) ? implode(' ', $classes['classes']) : '';
    $fa = '';
    if (isset($classes['fa']))
    {
        $fa = '<i class="fa fa-' . $classes['fa'] . '"></i>';
    }
    if (isset($classes['label']))
    {
        $module->title = '<span class="label label-' . $classes['label'] . '">' . $module->title . '</span>';
    }
    if (!empty($module->content)) :
        ?>
        <div class="moduletable <?php echo htmlspecialchars($modClass); ?>">
            <?php if ((bool) $module->showtitle) : ?>
                <?php echo $fa; ?><h3><?php echo $module->title; ?></h3>
            <?php endif; ?>
        <?php echo $module->content; ?>
        </div>
        <?php
    endif;
}
