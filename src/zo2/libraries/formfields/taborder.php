<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die;

class JFormFieldTaborder extends JFormFieldText
{
    protected $type = 'Taborder';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $html = '<div style="margin: 5px 0;">
                    <strong>Notes</strong>: Comma Separated List, First listed is the default, If left empty it will use default value below, only tabs listed will be shown. <br />
                    <strong>Possible Values </strong>: gplus,facebook,disqus,k2comment <br />
                    <strong>Default Value </strong>: gplus,facebook,k2comment <br />
                </div>';

        return parent::getInput() . $html ;
    }
}
