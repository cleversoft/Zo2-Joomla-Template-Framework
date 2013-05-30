var Component = Backbone.Model.extend({
    initialize: function(){},
    defaults: {
        draggable: true,
        isDataProvider: false,
        html: ''
    }
});

var WorkFrame = Backbone.Model.extend({
    initialize: function(){},
    defaults: {
        droppable: true,
        elementId: 'layoutframe',
        droppableOverlay: null
    },
    getDroppableOverlay: function(){
        return this.get('droppableOverlay');
    }
});