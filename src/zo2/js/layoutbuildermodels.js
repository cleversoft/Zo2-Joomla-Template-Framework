NodeType = {
    ELEMENT: 1,
    TEXT: 3,
    COMMENT: 8
};

var WorkSpace = Backbone.Model.extend({
    initialize: function()
    {
        this.set('iframeEl', jQuery('#layoutframe'));
        this.set('droppableEl', jQuery('#layoutbuilder-droppable'));
        this.set('containerEl', jQuery('#layoutbuilder-container'));

        var $containerParent = this.get('containerEl').parent();
        var containerWidth = $containerParent.width();
        this.get('containerEl').css('width', containerWidth);
        this.get('iframeEl').css('width', containerWidth);

        this.set('componentList', jQuery('#components-container'));

        //this.bindClickDroppable();
        this._initDraggingInsideIframe();
    },

    defaults: function() {
        return {
            iframeEl: null,
            droppableEl: null,
            lockDrop: false,
            containerEl: null,
            isDragging: false,
            isEditing: false,
            draggingEl: null,
            cloneDraggingEl: null,
            components: null,
            componentList: null
        };
    },

    /**
     * Set the content of iframe element
     *
     * @param {string} html - html content to set
     * @returns {WorkFrame}
     */
    setBodyHtmlContent: function(html)
    {
        var $iframe = this.get('iframeEl').contents();
        var target = $iframe[0];
        target.open();
        target.write(html);
        target.close();
        return this;
    },

    eventToFramePosition: function(e)
    {
        var iframeOffset = this.get('iframeEl').offset();
        return {
            x: e.pageX - iframeOffset.left,
            y: Math.max(e.pageY - iframeOffset.top, 0)
        };
    },

    positionToFramePosition: function(x, y)
    {
        var iframeOffset = this.get('iframeEl').offset();
        return {
            x: x - iframeOffset.left,
            y: Math.max(y - iframeOffset.top, 0)
        }
    },

    bindClickDroppable: function()
    {
        var thisWorkspace = this;
        var $iframe = jQuery(this.get('iframeEl').contents()[0]);
        this.get('droppableEl').on('click', function(e) {
            $iframe.find('.zo2-selected').removeClass('zo2-selected');
            var $selectedEle = thisWorkspace.getElementByPosition(thisWorkspace.eventToFramePosition(e));
            $selectedEle.addClass('zo2-selected');
        });
    },

    getElementByPosition: function(position)
    {
        var $iframe = this.get('iframeEl').contents();
        var target = $iframe[0];
        var ele = target.elementFromPoint(position.x, position.y);
        return jQuery(ele);
    },

    getElementByEvent: function(e)
    {
        var pos = this.eventToFramePosition(e);
        return jQuery(this.getElementByPosition(pos));
    },

    _initDraggingInsideIframe: function ()
    {
        var $droppable = this.get('droppableEl');
        var thisWorkspace = this;
        var $iframe = jQuery(thisWorkspace.get('iframeEl').contents()[0]);

        $droppable.bind('mousedown', function(e) {
            var button = (e.which || e.button);
            if (button != 1) return true;
            thisWorkspace.set('isDragging', true);
            var $draggingEl = thisWorkspace.getElementByEvent(e);
            if (!$draggingEl.attr('data-zo2selectable')) {
                $draggingEl = $draggingEl.closest('[data-zo2selectable]');
            }

            if ($draggingEl == undefined || $draggingEl == null) return true;
            if ($draggingEl && $draggingEl.length > 0) {
                $draggingEl.addClass('zo2-selected');
                var $cloneDraggingEl = $draggingEl.clone();
                var pos = thisWorkspace.eventToFramePosition(e);
                $cloneDraggingEl.css({
                    top: pos.y + 5,
                    left: pos.x + 5,
                    position: 'absolute'
                });
                $cloneDraggingEl.addClass('zo2-clonedragging zo2-dragging').insertAfter($draggingEl);
                thisWorkspace.set('draggingEl', $draggingEl);
                thisWorkspace.set('cloneDraggingEl', $cloneDraggingEl);
            }

            return true;
        });

        $droppable.bind('mouseup', function(e) {
            thisWorkspace.set('isDragging', false);
            if (thisWorkspace.get('draggingEl') != null) {
                //var $draggingEl = thisWorkspace.get('draggingEl');
                var $cloneDraggingEl = thisWorkspace.get('cloneDraggingEl');
                $cloneDraggingEl.remove();
                thisWorkspace.set('draggingEl', null);
                thisWorkspace.set('cloneDraggingEl', null);
            }

            // clean up class
            $iframe.find('.zo2-selected').removeClass('zo2-selected');
            $iframe.find('.zo2-hoveron').removeClass('zo2-hoveron');

            return true;
        });

        $droppable.bind('mousemove', function(e) {
            // check if dragging
            if (!thisWorkspace.get('isDragging')) return true;
            if (thisWorkspace.get('isEditing')) return true;
            var $draggingEl = thisWorkspace.get('draggingEl');
            var $cloneDraggingEl = thisWorkspace.get('cloneDraggingEl');
            if (!$draggingEl) return true;

            var pos = thisWorkspace.eventToFramePosition(e);

            // TODO: Nghiên cứu lỗi tại sao kéo ra ngoài một chừng thì bị lỗi ko insert vào node đó đc (chắc do el document?)
            // get closest selectable element
            var $hoverOnEl = jQuery(thisWorkspace.getElementByPosition(pos)).closest('[data-zo2selectable]')
                .not($draggingEl).not('body');
            if($hoverOnEl && $hoverOnEl.length > 0) {
                $iframe.find('.zo2-hoveron').removeClass('zo2-hoveron');
                $hoverOnEl.addClass('zo2-hoveron');

                // TODO: Nghiên cứu thêm để đảm bảo việc drop vào vị trí chuẩn xác hơn. Tính toán để dùng prepend hay insertBefore.
                $draggingEl.insertBefore($hoverOnEl);
            }

            // set position for draggable helper
            $cloneDraggingEl.css({
                top: pos.y + 5,
                left: pos.x + 5,
                position: 'absolute'
            });

            return true;
        });

        $droppable.bind('dblclick', function(e) {
            if (thisWorkspace.get('isDragging')) return true;

            var pos = thisWorkspace.eventToFramePosition(e);

            var $editingEl = jQuery(thisWorkspace.getElementByPosition(pos)).closest('[data-zo2selectable]')
                .not('body');

            if($editingEl && $editingEl.length > 0) {
                $droppable.hide();
                $editingEl.attr('contenteditable', true);
                $editingEl.focus();
                thisWorkspace.set('isEditing', true);

                $editingEl
                    .on('keyup', function (e) {
                        if (e.keyCode == 27) {
                            $editingEl.removeAttr('contenteditable');
                            $droppable.show();
                            $editingEl.unbind();
                            $editingEl.blur();
                            thisWorkspace.set('isEditing', false);
                        }
                    })
                    .on('blur', function(e) {
                        $editingEl.removeAttr('contenteditable');
                        $droppable.show();
                        $editingEl.unbind();
                        thisWorkspace.set('isEditing', false);
                    }
                );
            }

            return true;
        });
    },

    isInsideDroppable: function(e) {
        var componentList = this.get('droppableEl');
        var elePos = componentList.offset();
        var x1 = elePos.left;
        var y1 = elePos.top;
        var x2 = x1 + componentList.width();
        var y2 = y1 + componentList.height();
        return (e.pageX > x1 && e.pageX < x2 && e.pageY > y1 && e.pageY < y2);
    },

    initDraggingOutsideIframe: function () {
        var thisWorkspace = this;
        var $droppable = this.get('droppableEl');
        var $iframe = jQuery(this.get('iframeEl').contents()[0]);
        $droppable.droppable({
            accept: '.zo2-draggable',
            addClasses: false, // don't add stupid jQueryUI classes
            activate: function(e, ui) {
                // call when an acceptable draggable starts dragging (maybe not over)
            },
            drop: function(e, ui) {
                // when an acceptable dropped on the droppable
            },
            over: function(e, ui) {
            },
            out: function(e, ui) {
                // when a draggable item out, remove the clone
            }
        });

        var $draggable = jQuery('.zo2-draggable');
        $draggable.draggable({
            helper: 'clone',
            revert: 'invalid',
            drag: function(e, ui) {
                // TODO: thêm các hiệu ứng vào cho đẹp. Nghiên cứu lại cái event này, cảm giác lúc drag vào iframe chưa ổn cho nhắm

                if(thisWorkspace.isInsideDroppable(e)) {
                    var componentId = jQuery(this).attr('data-zo2componentid');
                    var components = thisWorkspace.get('components');
                    var com = components.findById(componentId);
                    var html = com.createElement();
                    var hoverOnEl = thisWorkspace.getElementByEvent(e);
                    var $containableEl = hoverOnEl.closest('[data-zo2selectable]');
                    var $el = thisWorkspace.get('outsideDraggingEl');
                    if ($el) {
                        $el.insertBefore($containableEl);
                    }
                    else {
                        $el = jQuery(html).insertBefore($containableEl);
                        thisWorkspace.set('outsideDraggingEl', $el);
                    }
                }
                else {
                    // drag outside meaning stop creating element
                    thisWorkspace.set('outsideDraggingEl', null);
                }
            },
            stop: function(e, ui) {
                thisWorkspace.set('outsideDraggingEl', null);
            }
        });
    },

    insertElementByEvent: function(e, el) {
        var pos = this.eventToFramePosition(e);
        return this.insertElementAtPosition(pos, el);
    },

    insertElementAtPosition: function(pos, el) {
        var thisWorkspace = this;
        var $droppedEl = thisWorkspace.getElementByPosition(pos);
        var $el = jQuery(el);
        $el.insertBefore($droppedEl);
        return true;
    },

    generateComponentList: function(componentList) {
        if(componentList === undefined) componentList = this.get('components');
        var thisWorkspace = this;
        componentList.each(function(item) {
            thisWorkspace.addComponentToList(item);
        });

        thisWorkspace.initDraggingOutsideIframe();
    },

    addComponentToList: function(component) {
        var $container = this.get('componentList');
        component.createDraggableElement().appendTo($container);
    }
});

var Component = Backbone.Model.extend({
    initialize: function(){},
    defaults: function() {
        return {
            id: 'header',
            name: 'Default component',
            class: ['zo2-draggable'],
            html: '',
            groups: ['Common components']
        }
    },
    createElement: function() {
        return this.get('html');
    },
    createDraggableElement: function() {
        var classArray = this.get('class');
        var classes = classArray && classArray.length > 0 ? classArray.join(' ') : '';
        var html = '<div data-zo2componentid="' + this.get('id') + '" class="' + classes + '">' + this.get('name') + '</div>';
        return jQuery(html);
    }
});

var ComponentList = Backbone.Collection.extend({
    model: Component,
    initialize: function() {},
    findById: function(id) {
        return this.findWhere({id: id});
    }
});