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
    initialize: function(){},

    /**
     * Default properties
     */
    defaults: {
        droppable: true,
        elementId: 'layoutframe',
        droppableOverlay: null
    },

    /**
     * Return div overlay element
     *
     * @returns {*|jQuery|HTMLElement}
     */
    getDroppableOverlay: function(){
        return $('#' + this.get('droppableOverlay'));
    },

    /**
     * Return iframe element
     *
     * @returns {*|jQuery|HTMLElement}
     */
    getIframe: function(){
        return $('#' + this.get('elementId'));
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

var WorkOverlay = Backbone.Model.extend({
    /**
     * Initialize object
     */
    initialize: function(){},

    /**
     * Default properties
     */
    defaults: {
        droppable: true,
        elementId: 'layoutbuilder-droppable',
        connectorId: 'layoutframe',
        acceptIframe: null
    },

    /**
     * Determine position of event on iframe
     *
     * @param e Event
     * @returns {{x: number, y: number}}
     */
    eventToPosition: function(e){
        var iframeOffset = this.get('acceptIframe').offset();
        return { x: e.pageX - iframeOffset.left, y: Math.max(e.pageY - iframeOffset.top, 0) };
    }
});