/**
 * Handler
 * @module zrender/Handler
 * @author Kener (@Kener-æž—å³°, kener.linfeng@gmail.com)
 *         errorrik (errorrik@gmail.com)
 *         pissang (shenyi.914@gmail.com)
 */
define(function (require) {

    'use strict';

    var env = require('./core/env.js');
    var eventTool = require('./core/event.js');
    var util = require('./core/util.js');
    var Draggable = require('./mixin/Draggable.js');
    var GestureMgr = require('./core/GestureMgr.js');

    var Eventful = require('./mixin/Eventful.js');

    var mouseHandlerNames = [
        'click', 'dblclick', 'mousewheel', 'mouseout'
    ];
    !usePointerEvent() && mouseHandlerNames.push(
        'mouseup', 'mousedown', 'mousemove'
    );

    var touchHandlerNames = [
        'touchstart', 'touchend', 'touchmove'
    ];

    var pointerHandlerNames = [
        'pointerdown', 'pointerup', 'pointermove'
    ];

    var TOUCH_CLICK_DELAY = 300;

    var addEventListener = eventTool.addEventListener;
    var removeEventListener = eventTool.removeEventListener;
    var normalizeEvent = eventTool.normalizeEvent;

    function makeEventPacket(eveType, target, event) {
        return {
            type: eveType,
            event: event,
            target: target,
            cancelBubble: false,
            offsetX: event.zrX,
            offsetY: event.zrY,
            gestureEvent: event.gestureEvent,
            pinchX: event.pinchX,
            pinchY: event.pinchY,
            pinchScale: event.pinchScale,
            wheelDelta: event.zrDelta
        };
    }

    var domHandlers = {
        /**
         * Mouse move handler
         * @inner
         * @param {Event} event
         */
        mousemove: function (event) {
            event = normalizeEvent(this.root, event);

            var x = event.zrX;
            var y = event.zrY;

            var hovered = this.findHover(x, y, null);
            var lastHovered = this._hovered;

            this._hovered = hovered;

            this.root.style.cursor = hovered ? hovered.cursor : this._defaultCursorStyle;
            // Mouse out on previous hovered element
            if (lastHovered && hovered !== lastHovered && lastHovered.__zr) {
                this._dispatchProxy(lastHovered, 'mouseout', event);
            }

            // Mouse moving on one element
            this._dispatchProxy(hovered, 'mousemove', event);

            // Mouse over on a new element
            if (hovered && hovered !== lastHovered) {
                this._dispatchProxy(hovered, 'mouseover', event);
            }
        },

        /**
         * Mouse out handler
         * @inner
         * @param {Event} event
         */
        mouseout: function (event) {
            event = normalizeEvent(this.root, event);

            var element = event.toElement || event.relatedTarget;
            if (element != this.root) {
                while (element && element.nodeType != 9) {
                    // å¿½ç•¥åŒ…å«åœ¨rootä¸­çš„domå¼•èµ·çš„mouseOut
                    if (element === this.root) {
                        return;
                    }

                    element = element.parentNode;
                }
            }

            this._dispatchProxy(this._hovered, 'mouseout', event);

            this.trigger('globalout', {
                event: event
            });
        },

        /**
         * Touchå¼€å§‹å“åº”å‡½æ•°
         * @inner
         * @param {Event} event
         */
        touchstart: function (event) {
            // Default mouse behaviour should not be disabled here.
            // For example, page may needs to be slided.
            // eventTool.stop(event);
            event = normalizeEvent(this.root, event);

            this._lastTouchMoment = new Date();

            processGesture(this, event, 'start');

            // å¹³æ¿è¡¥å……ä¸€æ¬¡findHover
            // this._mobileFindFixed(event);
            // Trigger mousemove and mousedown
            domHandlers.mousemove.call(this, event);

            domHandlers.mousedown.call(this, event);

            setTouchTimer(this);
        },

        /**
         * Touchç§»åŠ¨å“åº”å‡½æ•°
         * @inner
         * @param {Event} event
         */
        touchmove: function (event) {
            // eventTool.stop(event);// é˜»æ­¢æµè§ˆå™¨é»˜è®¤äº‹ä»¶ï¼Œé‡è¦
            event = normalizeEvent(this.root, event);

            processGesture(this, event, 'change');

            // Mouse move should always be triggered no matter whether
            // there is gestrue event, because mouse move and pinch may
            // be used at the same time.
            domHandlers.mousemove.call(this, event);

            setTouchTimer(this);
        },

        /**
         * Touchç»“æŸå“åº”å‡½æ•°
         * @inner
         * @param {Event} event
         */
        touchend: function (event) {
            // eventTool.stop(event);// é˜»æ­¢æµè§ˆå™¨é»˜è®¤äº‹ä»¶ï¼Œé‡è¦
            event = normalizeEvent(this.root, event);

            processGesture(this, event, 'end');

            domHandlers.mouseup.call(this, event);

            // click event should always be triggered no matter whether
            // there is gestrue event. System click can not be prevented.
            if (+new Date() - this._lastTouchMoment < TOUCH_CLICK_DELAY) {
                // this._mobileFindFixed(event);
                domHandlers.click.call(this, event);
            }

            setTouchTimer(this);
        }
    };

    // Common handlers
    util.each(['click', 'mousedown', 'mouseup', 'mousewheel', 'dblclick'], function (name) {
        domHandlers[name] = function (event) {
            event = normalizeEvent(this.root, event);
            // Find hover again to avoid click event is dispatched manually. Or click is triggered without mouseover
            var hovered = this.findHover(event.zrX, event.zrY, null);

            if (name === 'mousedown') {
                this._downel = hovered;
                // In case click triggered before mouseup
                this._upel = hovered;
            }
            else if (name === 'mosueup') {
                this._upel = hovered;
            }
            else if (name === 'click') {
                if (this._downel !== this._upel) {
                    return;
                }
            }

            this._dispatchProxy(hovered, name, event);
        };
    });

    // Pointer event handlers
    // util.each(['pointerdown', 'pointermove', 'pointerup'], function (name) {
    //     domHandlers[name] = function (event) {
    //         var mouseName = name.replace('pointer', 'mouse');
    //         domHandlers[mouseName].call(this, event);
    //     };
    // });

    function processGesture(zrHandler, event, stage) {
        var gestureMgr = zrHandler._gestureMgr;

        stage === 'start' && gestureMgr.clear();

        var gestureInfo = gestureMgr.recognize(
            event,
            zrHandler.findHover(event.zrX, event.zrY, null),
            zrHandler.root
        );

        stage === 'end' && gestureMgr.clear();

        if (gestureInfo) {
            // eventTool.stop(event);
            var type = gestureInfo.type;
            event.gestureEvent = type;

            zrHandler._dispatchProxy(gestureInfo.target, type, gestureInfo.event);
        }
    }

    /**
     * ä¸ºæŽ§åˆ¶ç±»å®žä¾‹åˆå§‹åŒ–dom äº‹ä»¶å¤„ç†å‡½æ•°
     *
     * @inner
     * @param {module:zrender/Handler} instance æŽ§åˆ¶ç±»å®žä¾‹
     */
    function initDomHandler(instance) {
        var handlerNames = touchHandlerNames.concat(pointerHandlerNames);
        for (var i = 0; i < handlerNames.length; i++) {
            var name = handlerNames[i];
            instance._handlers[name] = util.bind(domHandlers[name], instance);
        }

        for (var i = 0; i < mouseHandlerNames.length; i++) {
            var name = mouseHandlerNames[i];
            instance._handlers[name] = makeMouseHandler(domHandlers[name], instance);
        }

        function makeMouseHandler(fn, instance) {
            return function () {
                if (instance._touching) {
                    return;
                }
                return fn.apply(instance, arguments);
            };
        }
    }

    /**
     * @alias module:zrender/Handler
     * @constructor
     * @extends module:zrender/mixin/Eventful
     * @param {HTMLElement} root Main HTML element for painting.
     * @param {module:zrender/Storage} storage Storage instance.
     * @param {module:zrender/Painter} painter Painter instance.
     */
    var Handler = function(root, storage, painter) {
        Eventful.call(this);

        this.root = root;
        this.storage = storage;
        this.painter = painter;

        /**
         * @private
         * @type {boolean}
         */
        this._hovered;

        /**
         * @private
         * @type {Date}
         */
        this._lastTouchMoment;

        /**
         * @private
         * @type {number}
         */
        this._lastX;

        /**
         * @private
         * @type {number}
         */
        this._lastY;

        /**
         * @private
         * @type {string}
         */
        this._defaultCursorStyle = 'default';

        /**
         * @private
         * @type {module:zrender/core/GestureMgr}
         */
        this._gestureMgr = new GestureMgr();

        /**
         * @private
         * @type {Array.<Function>}
         */
        this._handlers = [];

        /**
         * @private
         * @type {boolean}
         */
        this._touching = false;

        /**
         * @private
         * @type {number}
         */
        this._touchTimer;

        initDomHandler(this);

        if (usePointerEvent()) {
            mountHandlers(pointerHandlerNames, this);
        }
        else if (useTouchEvent()) {
            mountHandlers(touchHandlerNames, this);

            // Handler of 'mouseout' event is needed in touch mode, which will be mounted below.
            // addEventListener(root, 'mouseout', this._mouseoutHandler);
        }

        // Considering some devices that both enable touch and mouse event (like MS Surface
        // and lenovo X240, @see #2350), we make mouse event be always listened, otherwise
        // mouse event can not be handle in those devices.
        mountHandlers(mouseHandlerNames, this);

        Draggable.call(this);

        function mountHandlers(handlerNames, instance) {
            util.each(handlerNames, function (name) {
                addEventListener(root, eventNameFix(name), instance._handlers[name]);
            }, instance);
        }
    };

    Handler.prototype = {

        constructor: Handler,

        /**
         * Resize
         */
        resize: function (event) {
            this._hovered = null;
        },

        /**
         * Dispatch event
         * @param {string} eventName
         * @param {event=} eventArgs
         */
        dispatch: function (eventName, eventArgs) {
            var handler = this._handlers[eventName];
            handler && handler.call(this, eventArgs);
        },

        /**
         * Dispose
         */
        dispose: function () {
            var root = this.root;

            var handlerNames = mouseHandlerNames.concat(touchHandlerNames);

            for (var i = 0; i < handlerNames.length; i++) {
                var name = handlerNames[i];
                removeEventListener(root, eventNameFix(name), this._handlers[name]);
            }

            this.root =
            this.storage =
            this.painter = null;
        },

        /**
         * è®¾ç½®é»˜è®¤çš„cursor style
         * @param {string} cursorStyle ä¾‹å¦‚ crosshair
         */
        setDefaultCursorStyle: function (cursorStyle) {
            this._defaultCursorStyle = cursorStyle;
        },

        /**
         * äº‹ä»¶åˆ†å‘ä»£ç†
         *
         * @private
         * @param {Object} targetEl ç›®æ ‡å›¾å½¢å…ƒç´ 
         * @param {string} eventName äº‹ä»¶åç§°
         * @param {Object} event äº‹ä»¶å¯¹è±¡
         */
        _dispatchProxy: function (targetEl, eventName, event) {
            var eventHandler = 'on' + eventName;
            var eventPacket = makeEventPacket(eventName, targetEl, event);

            var el = targetEl;

            while (el) {
                el[eventHandler]
                    && (eventPacket.cancelBubble = el[eventHandler].call(el, eventPacket));

                el.trigger(eventName, eventPacket);

                el = el.parent;

                if (eventPacket.cancelBubble) {
                    break;
                }
            }

            if (!eventPacket.cancelBubble) {
                // å†’æ³¡åˆ°é¡¶çº§ zrender å¯¹è±¡
                this.trigger(eventName, eventPacket);
                // åˆ†å‘äº‹ä»¶åˆ°ç”¨æˆ·è‡ªå®šä¹‰å±‚
                // ç”¨æˆ·æœ‰å¯èƒ½åœ¨å…¨å±€ click äº‹ä»¶ä¸­ disposeï¼Œæ‰€ä»¥éœ€è¦åˆ¤æ–­ä¸‹ painter æ˜¯å¦å­˜åœ¨
                this.painter && this.painter.eachOtherLayer(function (layer) {
                    if (typeof(layer[eventHandler]) == 'function') {
                        layer[eventHandler].call(layer, eventPacket);
                    }
                    if (layer.trigger) {
                        layer.trigger(eventName, eventPacket);
                    }
                });
            }
        },

        /**
         * @private
         * @param {number} x
         * @param {number} y
         * @param {module:zrender/graphic/Displayable} exclude
         * @method
         */
        findHover: function(x, y, exclude) {
            var list = this.storage.getDisplayList();
            for (var i = list.length - 1; i >= 0 ; i--) {
                if (!list[i].silent
                 && list[i] !== exclude
                 // getDisplayList may include ignored item in VML mode
                 && !list[i].ignore
                 && isHover(list[i], x, y)) {
                    return list[i];
                }
            }
        }
    };

    function isHover(displayable, x, y) {
        if (displayable[displayable.rectHover ? 'rectContain' : 'contain'](x, y)) {
            var el = displayable;
            while (el) {
                // If ancestor is silent or clipped by ancestor
                if (el.silent || (el.clipPath && !el.clipPath.contain(x, y)))  {
                    return false;
                }
                el = el.parent;
            }
            return true;
        }

        return false;
    }

    /**
     * Prevent mouse event from being dispatched after Touch Events action
     * @see <https://github.com/deltakosh/handjs/blob/master/src/hand.base.js>
     * 1. Mobile browsers dispatch mouse events 300ms after touchend.
     * 2. Chrome for Android dispatch mousedown for long-touch about 650ms
     * Result: Blocking Mouse Events for 700ms.
     */
    function setTouchTimer(instance) {
        instance._touching = true;
        clearTimeout(instance._touchTimer);
        instance._touchTimer = setTimeout(function () {
            instance._touching = false;
        }, 700);
    }

    /**
     * Althought MS Surface support screen touch, IE10/11 do not support
     * touch event and MS Edge supported them but not by default (but chrome
     * and firefox do). Thus we use Pointer event on MS browsers to handle touch.
     */
    function usePointerEvent() {
        // TODO
        // pointermove event dont trigger when using finger.
        // We may figger it out latter.
        return false;
        // return env.pointerEventsSupported
            // In no-touch device we dont use pointer evnets but just
            // use mouse event for avoiding problems.
            // && window.navigator.maxTouchPoints;
    }

    function useTouchEvent() {
        return env.touchEventsSupported;
    }

    function eventNameFix(name) {
        return (name === 'mousewheel' && env.browser.firefox) ? 'DOMMouseScroll' : name;
    }

    util.mixin(Handler, Eventful);
    util.mixin(Handler, Draggable);

    return Handler;
});