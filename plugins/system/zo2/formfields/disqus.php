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

class JFormFieldDisqus extends JFormFieldText
{
    protected $type = 'Disqus';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $html = '<div style="margin: 5px 0;">
                    <strong>Notes </strong>: Required if showing the Disqus Tab
                </div>';

        return parent::getInput() . $html ;
    }
}
