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

        this.set('hfHtml', jQuery('.hfLayoutHtml'));

        //this.bindClickDroppable();
        this._initDraggingInsideIframe();

        this.bindKeyboardDeleteElement();

        this.bindOverlayToolbar();
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

    getLayoutHtml: function(layoutName, callback) {
        jQuery.post('index.php?zo2controller=getLayout&layout=' + layoutName + '&template=' + jQuery('#hfTemplateName').val(), function(resp){
            if(typeof callback == 'function') callback(resp);
        });
    },

    /**
     * Set the content of iframe element
     *
     * @param {string} html - html content to set
     * @returns {WorkFrame}
     */
    setBodyHtmlContent: function(html)
    {
        this.get('iframeEl').html('');
        var $iframe = this.get('iframeEl').contents();
        var target = $iframe[0];
        target.open();
        target.write(html);
        target.close();
        return this;
    },

    saveLayout: function()
    {
        //var thisWorkspace = this;
        var html = document.getElementById('layoutframe').contentWindow.document.body.innerHTML;
        var opt = {html: html, name: jQuery('#hfLayoutName').val(), template: jQuery('#hfTemplateName').val()};

        jQuery.post('index.php?zo2controller=saveLayout', opt, function(resp) {
        });
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
        try {
            var pos = this.eventToFramePosition(e);
            var $result = jQuery(this.getElementByPosition(pos));
            if (!$result.is('body')) return $result;
            else return null;
        }
        catch (e) {
            return null;
        }
    },

    deleteSelectedElement: function() {
        var thisWorkspace = this;
        var $iframe = jQuery(thisWorkspace.get('iframeEl').contents()[0]);
        var $els = $iframe.find('.zo2-selected');

        if($els.length > 0) {
            $els.remove();
            jQuery('#layoutbuilder-toolbar').hide();
            return false; //to prevent back behaviour on macosx when press delete key
        }
        else return true;
    },

    duplicateAndRearrange: function ($el) {
        var thisWorkspace = this;
        var $iframe = jQuery(thisWorkspace.get('iframeEl').contents()[0]);
        if (!$el) $el = $iframe.find('.zo2-selected');

        var $parent = $el.parent();

        // if not row container, the don't continue
        if (!$parent.hasClass('row')) return false;

        // span strategy
        var strategy = [
            [1], [2, 2], [4, 4, 4], [3, 3, 3, 3], [3, 3, 2, 2, 2], [2, 2, 2, 2, 2, 2]
        ];

        var $spans = $parent.find('[class^=span]');
        var strategyNum = $spans.length;

        if (strategyNum > strategy.length - 1) return false;
        else {
            var selectedStrategy = strategy[strategyNum];

            //$el.clone().removeClass('zo2-selected zo2-dragging zo2-clonedragging zo2-hoveron').insertAfter($el);
            jQuery('<div />').addClass('span').attr('data-zo2selectable', 'true').insertAfter($el);

            $parent.find('[class^=span]').each(function(index) {
                var $this = jQuery(this);
                $this.removeClass('zo2-selected span span1 span2 span3 span4 span5 span6 span7 span8 span9 span10 span11 span12');
                $this.addClass('span' + selectedStrategy[index]);
            });

            jQuery('#layoutbuilder-toolbar').hide();
            jQuery('#layoutbuilder-toolbar .duplicate').hide();

            return true;
        }
    },

    bindKeyboardDeleteElement: function(){
        var thisWorkspace = this;
        jQuery(document).bind('keydown', function(e){
            var keycode =  e.keyCode ? e.keyCode : e.which;

            if(keycode == 8 || keycode == 46) return thisWorkspace.deleteSelectedElement();
            else return true;
        });
    },

    bindOverlayToolbar: function(){
        this.bindOverlayRemoveButton();
        this.bindOverlaySettingsButton();
        this.bindOverlayDuplicateButton();
    },

    bindOverlaySettingsButton: function(){
        var thisWorkspace = this;
    },

    bindOverlayRemoveButton: function(){
        var thisWorkspace = this;
        jQuery('#layoutbuilder-toolbar .delete').on('click', function(){
            thisWorkspace.deleteSelectedElement();
        });
    },

    bindOverlayDuplicateButton: function() {
        var thisWorkspace = this;
        jQuery('#layoutbuilder-toolbar .duplicate').on('click', function(){
            thisWorkspace.duplicateAndRearrange();
        });
    },

    _initDraggingInsideIframe: function ()
    {
        var $droppable = this.get('droppableEl');
        var thisWorkspace = this;
        var $iframe = jQuery(thisWorkspace.get('iframeEl').contents()[0]);

        $droppable.bind('mousedown', function(e) {
            var button = (e.which || e.button);
            if (button != 1) return true;

            $iframe.find('.zo2-selected').removeClass('zo2-selected');

            thisWorkspace.set('isDragging', true);
            var $draggingEl = thisWorkspace.getElementByEvent(e);
            if (!$draggingEl.attr('data-zo2selectable')) {
                $draggingEl = $draggingEl.closest('[data-zo2selectable]');
            }

            if ($draggingEl == undefined || $draggingEl == null) return true;
            if ($draggingEl && $draggingEl.length > 0) {
                $draggingEl.addClass('zo2-selected');
                var $cloneDraggingEl = $draggingEl.clone();
                $cloneDraggingEl.hide();

                thisWorkspace.generateElementForm($draggingEl);

                $cloneDraggingEl.addClass('zo2-clonedragging zo2-dragging').insertAfter($draggingEl);
                thisWorkspace.set('draggingEl', $draggingEl);
                thisWorkspace.set('cloneDraggingEl', $cloneDraggingEl);

                // show control toolbar
                if (thisWorkspace.isSpan($draggingEl)) {
                    jQuery('#layoutbuilder-toolbar .duplicate').show();
                    jQuery('#layoutbuilder-toolbar').css('width', 55);

                    var draggingElOffset = $draggingEl.offset();
                    jQuery('#layoutbuilder-toolbar').css({
                        display: 'block',
                        top: draggingElOffset.top + 5,
                        left: draggingElOffset.left + $draggingEl.width() - 20 - jQuery('#layoutbuilder-toolbar').width()
                    });
                }
                else {
                    jQuery('#layoutbuilder-toolbar .duplicate').hide();
                    jQuery('#layoutbuilder-toolbar').css('width', 36);

                    var draggingElOffset = $draggingEl.offset();
                    jQuery('#layoutbuilder-toolbar').css({
                        display: 'block',
                        top: draggingElOffset.top + 5,
                        left: draggingElOffset.left + $draggingEl.width() - 20 - jQuery('#layoutbuilder-toolbar').width()
                    });
                }
            }
            else {
                jQuery('#layoutbuilder-toolbar').hide();
                jQuery('#layoutbuilder-toolbar .duplicate').hide();
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
            //$iframe.find('.zo2-selected').removeClass('zo2-selected');
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

                try {
                    if (thisWorkspace.isContainer($hoverOnEl)) $draggingEl.prependTo($hoverOnEl);
                    else $draggingEl.insertBefore($hoverOnEl);
                }
                catch (err) {}

                // move toolbar
                var draggingElOffset = $draggingEl.offset();
                jQuery('#layoutbuilder-toolbar').css({
                    display: 'block',
                    top: draggingElOffset.top + 5,
                    left: draggingElOffset.left + $draggingEl.width() - 20 - jQuery('#layoutbuilder-toolbar').width()
                });
            }

            // set position for draggable helper
            $cloneDraggingEl.css({
                top: pos.y + 5,
                left: pos.x + 5,
                position: 'absolute'
            }).show();

            return true;
        });

        $droppable.bind('dblclick', function(e) {
            if (thisWorkspace.get('isDragging')) return true;

            var pos = thisWorkspace.eventToFramePosition(e);

            var $editingEl = jQuery(thisWorkspace.getElementByPosition(pos)).closest('[data-zo2selectable]')
                .not('body').not('[data-zo2componenttype="data-component"]');

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
        //var $iframe = jQuery(this.get('iframeEl').contents()[0]);
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
            cursorAt: {left: -10, top: -20},
            helper: 'clone',
            revert: 'invalid',
            drag: function(e, ui) {

                // TODO: thêm các hiệu ứng vào cho đẹp. Nghiên cứu lại cái event này, cảm giác lúc drag vào iframe chưa ổn cho nhắm

                if (thisWorkspace.isInsideDroppable(e)) {
                    var componentId = jQuery(this).attr('data-zo2componentid');
                    var components = thisWorkspace.get('components');
                    var com = components.findById(componentId);
                    var html = com.createElement();
                    var hoverOnEl = thisWorkspace.getElementByEvent(e);
                    if (hoverOnEl == null) return;
                    var $containableEl = hoverOnEl.closest('[data-zo2selectable]');
                    var $el = thisWorkspace.get('outsideDraggingEl');
                    if ($el !== null && $el.length > 0) {
                        if (!thisWorkspace.isSameElementOrParent($el, hoverOnEl))
                        {
                            try {
                                if (thisWorkspace.isContainer($containableEl)) $el.prependTo($containableEl);
                                else $el.insertBefore($containableEl);
                            }
                            catch (err) {}
                        }
                    }
                    else {
                        try {
                            $el = jQuery(html);
                            if (thisWorkspace.isContainer($containableEl)) $el.prependTo($containableEl);
                            else $el.insertBefore($containableEl);
                            thisWorkspace.set('outsideDraggingEl', $el);
                        }
                        catch (err) {}
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

    /**
     * Compare 2 elements.
     * If $el2 is $el1, return true
     * If $el2 has parent is $el1, return true
     *
     * Please note the order, result may not be the same with wrong order
     *
     * @param $el1
     * @param $el2
     */
    isSameElementOrParent: function ($el1, $el2) {
        var maxRecursion = 40;
        var currentRecursion = 0;
        if ($el1.is($el2)) return true;
        var $parent = $el2.parent();
        while (true) {
            if (currentRecursion >= maxRecursion) {
                break;
            }

            if ($parent.is('body')) break;

            if ($parent.is($el1)) return true;

            currentRecursion++;
            $parent = $parent.parent();

        }
        return false;
    },
    /*
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
    */
    generateComponentList: function(componentList) {
        if (componentList === undefined) componentList = this.get('components');
        var thisWorkspace = this;
        componentList.each(function(item) {
            thisWorkspace.addComponentToList(item);
        });

        thisWorkspace.initDraggingOutsideIframe();
    },

    addComponentToList: function(component) {
        var $container = this.get('componentList');
        component.createDraggableElement().appendTo($container);
    },

    generateElementForm: function($el) {
        var $iframe = jQuery(this.get('iframeEl').contents()[0]);
        jQuery('#inputClass').val($el.attr('class') ? $el.attr('class').replace('zo2-selected', '') : '');
        jQuery('#inputId').val($el.attr('id') ? $el.attr('id') : '');
        jQuery('#dynamic-attributes').empty();

        if ($el.attr('data-zo2componenttype') && $el.attr('data-zo2componenttype') == 'data-component') {
            var components = this.get('components');
            var baseComponent = components.findById($el.attr('data-zo2componentid'));

            if (baseComponent && baseComponent.get('attributes')) {
                var attributes = baseComponent.get('attributes');
                for(var i = 0, total = attributes.length; i < total; i++) {
                    var attr = attributes[i];
                    var attrEl = 'data-zo2' + attr.name;
                    var inputId = 'input-' + attr.name;
                    var html = '<div class="control-group"><label class="control-label" for="' + inputId + '">' + attr.label
                        + '</label><div class="controls"><input type="text" id="' + inputId + '">'
                        + '</div></div>';
                    var $row = jQuery(html);

                    $row.appendTo('#dynamic-attributes');

                    var $input = jQuery('#' + inputId);

                    if ($el.attr(attrEl)) $input.val($el.attr(attrEl));

                    $input.on('keyup', function() {
                        $el.attr(attrEl, jQuery(this).val());
                    });
                }
            }
        }
    },

    generateAttributeRow: function($el, attr) {
        var attribute = attr.name.charAt(0).toUpperCase() + attr.name.slice(1); // uppercase first character

        var html = '<div class="control-group"><label class="control-label" for="input' + attribute + '">' + attribute
                + '</label><div class="controls"><input type="text" id="input' + attribute + '">'
                + '</div></div>';

        var $row = jQuery(html);

        /*
        // apply on the fly
        $row.find('input').on('keydown', function(){

        });
        */

        $row.appendTo('#dynamic-attributes');
    },

    isContainer: function($el) {
        var containerClasses = ['container', 'span1', 'span2', 'span3', 'span4', 'span5', 'span6', 'span6', 'span7',
            'span8', 'span9', 'span10', 'span11', 'span12'
        ];

        for (var i = 0, total = containerClasses.length; i < total; i++) {
            if ($el.hasClass(containerClasses[i])) return true;
        }

        return false;
    },

    isSpan: function($el) {
        var containerClasses = ['span1', 'span2', 'span3', 'span4', 'span5', 'span6', 'span6', 'span7',
            'span8', 'span9', 'span10', 'span11', 'span12'
        ];

        for (var i = 0, total = containerClasses.length; i < total; i++) {
            if ($el.hasClass(containerClasses[i])) return true;
        }

        return false;
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
            groups: ['Common components'],
            type: 'normal-component',
            icon: ''
        }
    },
    createDraggableElement: function() {
        var classArray = this.get('class');
        var classes = classArray && classArray.length > 0 ? classArray.join(' ') : '';
        var icon = this.get('icon') != null && this.get('icon').length > 0 ? this.get('icon') : 'empty.png';
        var html = '<div data-zo2componenttype="' + this.get('type') + '" data-zo2componentid="' + this.get('id') + '" class="' + classes + '">'
            + '<img src="../plugins/system/zo2/images/components/' + icon + '" />'
            + this.get('name')
            + '</div>';
        return jQuery(html);
    },
    createElement: function() {
        return this.get('html');
    }
});

var ComponentList = Backbone.Collection.extend({
    model: Component,
    initialize: function() {},
    findById: function(id) {
        return this.findWhere({id: id});
    }
});