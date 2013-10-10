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
defined('_JEXEC') or die;

class JFormFieldSocial extends JFormFieldText
{
    protected $type = 'Social';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $html = '<div style="margin: 5px 0;">
                    <strong>Possible Values </strong>: facebook,twitter,linkedin,gplus <br />
                    <strong>Default Value </strong>: facebook,twitter,linkedin,gplus <br />
                </div>';

        return parent::getInput() . $html ;
    }
}
