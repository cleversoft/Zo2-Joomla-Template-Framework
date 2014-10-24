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
defined('_JEXEC') or die('resticted aceess');

class JFormFieldMegaMenu extends JFormFieldHidden {

    /**
     * The form field type.
     *
     * @var    string
     * @since  1.6
     */
    public $type = 'MegaMenu';

    protected function getInput() {
        return parent::getInput() . "\n" . $this->getContent();
    }

    protected function getContent() {

       

        
        
    }

    

}
