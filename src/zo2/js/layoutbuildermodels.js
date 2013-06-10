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

var WorkSpace = Backbone.Model.extend({
    initialize: function(){
        this.set('iframeEl', jQuery('#layoutframe'));
        this.set('droppableEl', jQuery('#layoutbuilder-droppable'));
        this.set('containerEl', jQuery('#layoutbuilder-container'));

        var $containerParent = this.get('containerEl').parent();
        var containerWidth = $containerParent.width();
        this.get('containerEl').css('width', containerWidth);
        this.get('iframeEl').css('width', containerWidth);

        this.bindClickDroppable();
    },

    defaults: {
        iframeEl: null,
        droppableEl: null,
        lockDrop: false,
        containerEl: null
    },

    /**
     * Set the content of iframe element
     *
     * @param {string} html - html content to set
     * @returns {WorkFrame}
     */
    setBodyHtmlContent: function(html){
        var $iframe = this.get('iframeEl').contents();
        var target = $iframe[0];
        target.open();
        target.write(html);
        target.close();
        return this;
    },

    eventToFramePosition: function(e){
        var iframeOffset = this.get('iframeEl').offset();
        return {
            x: e.pageX - iframeOffset.left,
            y: Math.max(e.pageY - iframeOffset.top, 0)
        };
    },

    positionToFramePosition: function(x, y) {
        var iframeOffset = this.get('iframeEl').offset();
        return {
            x: x - iframeOffset.left,
            y: Math.max(y - iframeOffset.top, 0)
        }
    },

    bindClickDroppable: function() {
        var thisWorkspace = this;
        var $iframe = jQuery(this.get('iframeEl').contents()[0]);
        this.get('droppableEl').on('click', function(e) {
            $iframe.find('.zo2-selected').removeClass('zo2-selected');
            var $selectedEle = thisWorkspace.getElementByPosition(thisWorkspace.eventToFramePosition(e));
            $selectedEle.addClass('zo2-selected');
        });
    },

    getElementByPosition: function(position){
        var $iframe = this.get('iframeEl').contents();
        var target = $iframe[0];
        var ele = target.elementFromPoint(position.x, position.y);
        return jQuery(ele);
    }
});