/**
 * äº‹ä»¶è¾…åŠ©ç±»
 * @module zrender/core/event
 * @author Kener (@Kener-æž—å³°, kener.linfeng@gmail.com)
 */
define(function(require) {

    'use strict';

    var Eventful = require('../mixin/Eventful.js');

    var isDomLevel2 = (typeof window !== 'undefined') && !!window.addEventListener;

    function getBoundingClientRect(el) {
        // BlackBerry 5, iOS 3 (original iPhone) don't have getBoundingRect
        return el.getBoundingClientRect ? el.getBoundingClientRect() : {left: 0, top: 0};
    }

    function clientToLocal(el, e, out) {
        // clientX/clientY is according to view port.
        var box = getBoundingClientRect(el);
        out = out || {};
        out.zrX = e.clientX - box.left;
        out.zrY = e.clientY - box.top;
        return out;
    }

    /**
     * å¦‚æžœå­˜åœ¨ç¬¬ä¸‰æ–¹åµŒå…¥çš„ä¸€äº›domè§¦å‘çš„äº‹ä»¶ï¼Œæˆ–touchäº‹ä»¶ï¼Œéœ€è¦è½¬æ¢ä¸€ä¸‹äº‹ä»¶åæ ‡
     */
    function normalizeEvent(el, e) {

        e = e || window.event;

        if (e.zrX != null) {
            return e;
        }

        var eventType = e.type;
        var isTouch = eventType && eventType.indexOf('touch') >= 0;

        if (!isTouch) {
            clientToLocal(el, e, e);
            e.zrDelta = (e.wheelDelta) ? e.wheelDelta / 120 : -(e.detail || 0) / 3;
        }
        else {
            var touch = eventType != 'touchend'
                ? e.targetTouches[0]
                : e.changedTouches[0];
            touch && clientToLocal(el, touch, e);
        }

        return e;
    }

    function addEventListener(el, name, handler) {
        if (isDomLevel2) {
            el.addEventListener(name, handler);
        }
        else {
            el.attachEvent('on' + name, handler);
        }
    }

    function removeEventListener(el, name, handler) {
        if (isDomLevel2) {
            el.removeEventListener(name, handler);
        }
        else {
            el.detachEvent('on' + name, handler);
        }
    }

    /**
     * åœæ­¢å†’æ³¡å’Œé˜»æ­¢é»˜è®¤è¡Œä¸º
     * @memberOf module:zrender/core/event
     * @method
     * @param {Event} e : eventå¯¹è±¡
     */
    var stop = isDomLevel2
        ? function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.cancelBubble = true;
        }
        : function (e) {
            e.returnValue = false;
            e.cancelBubble = true;
        };

    return {
        clientToLocal: clientToLocal,
        normalizeEvent: normalizeEvent,
        addEventListener: addEventListener,
        removeEventListener: removeEventListener,

        stop: stop,
        // åšå‘ä¸Šå…¼å®¹
        Dispatcher: Eventful
    };
});
