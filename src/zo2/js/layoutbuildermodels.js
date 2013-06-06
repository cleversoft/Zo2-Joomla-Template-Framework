var Component = Backbone.Model.extend({
    initialize: function(){},
    defaults: {
        draggable: true,
        isDataProvider: false,
        html: ''
    }
});

NodeType = {
    ELEMENT: 1,
    TEXT: 3,
    COMMENT: 8
};

/**
 * This object serve as helper between iframe document and parent document
 *
 * @type {WorkFrame}
 */
var WorkFrame = Backbone.Model.extend({
    /**
     * Initialize object
     */
    initialize: function(){
        console.log('init');
    },

    /**
     * Default properties
     */
    defaults: {
        droppable: true,
        elementId: 'layoutframe'
    },

    /**
     * Return div overlay element
     *
     * @returns {*|jQuery|HTMLElement}
     */
    getDroppableOverlay: function(){
        return jQuery('#' + this.get('droppableOverlay'));
    },

    /**
     * Return iframe element
     *
     * @returns {*|jQuery|HTMLElement}
     */
    getIframe: function(){
        return jQuery('#' + this.get('elementId'));
    },

    /**
     * Set the content of iframe element
     *
     * @param {string} html - html content to set
     * @param {string} root - root element
     * @returns {WorkFrame}
     */
    setBodyHtmlContent: function(html, root){
        if(root == undefined) root = 'html';
        this.getIframe().contents().find(root).html(html);
        return this;
    }
});

var Test = Backbone.Model.extend({
    initialize: function(){
        console.log('now init');
    }
});

var WorkOverlay = Backbone.Model.extend({
    /**
     * Initialize object
     */
    initialize: function(){
    },

    updateSize: function() {
        var $thisDroppable = jQuery('#' + this.get('elementId'));
        if($thisDroppable.length > 0) {
            var offset = $thisDroppable.offset();
            var size = {
                top: offset.top,
                left: offset.left,
                bottom: offset.top + $thisDroppable.height(),
                right: offset.left + $thisDroppable.width()
            };
            this.set('size', size);
        }
    },

    /**
     * Default properties
     */
    defaults: {
        droppable: true,
        elementId: 'layoutbuilder-droppable',
        connectorId: 'layoutframe',
        init: false,
        size: {top: 0, bottom: 0, left: 0, right: 0}
    },

    /**
     * Determine position of event on iframe
     *
     * @param e Event
     * @returns {{x: number, y: number}}
     */
    eventToPosition: function(e){
        var iframeOffset = jQuery('#layoutframe').offset();
        return { x: e.pageX - iframeOffset.left, y: Math.max(e.pageY - iframeOffset.top, 0) };
    }
});