<?php

/**
 * Class exists checking
 */
if (!class_exists('Zo2HtmlModal')) {

    /**
     * Render a modal
     */
    class Zo2HtmlModal {

        /**
         *
         * @var stdClass
         */
        private $_modal = null;

        /**
         *
         * @var CrexRenderButtons
         */
        public $buttons = array();

        /**
         * Class construction
         * @param string $id
         * @param string $title
         * @param string $content
         * @param boolean $backdrop
         * @param object $properties
         */
        public function __construct($id, $title, $content, $backdrop = false, $icon = '') {
            /* Create new modal information */
            $this->_modal = new stdClass();
            /* Modal ID */
            $this->_modal->id = $id;
            /* Modal title */
            $this->_modal->title = $title;
            /* Modal content */
            $this->_modal->content = $content;
            /* Allow/disallow to close modal */
            $this->_modal->backdrop = $backdrop;
            /* Modal's icon */
            $this->_modal->icon = $icon;
        }

        /**
         * Get modal
         * @return object
         */
        public function getModal() {
            return $this->_modal;
        }

        public function addButton($button = array()) {
            $this->buttons[] = $button;
        }

        /**
         * Render modal
         * @return string
         */
        public function render() {
            $template = new Zo2Html();
            $template->set('modal', $this->getModal());
            $template->set('buttons', $this->buttons);
            return $template->fetch('zo2/modal.php');
        }

    }

}