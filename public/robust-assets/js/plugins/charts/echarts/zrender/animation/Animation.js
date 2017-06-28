/**
 * åŠ¨ç”»ä¸»ç±», è°ƒåº¦å’Œç®¡ç†æ‰€æœ‰åŠ¨ç”»æŽ§åˆ¶å™¨
 *
 * @module zrender/animation/Animation
 * @author pissang(https://github.com/pissang)
 */
// TODO Additive animation
// http://iosoteric.com/additive-animations-animatewithduration-in-ios-8/
// https://developer.apple.com/videos/wwdc2014/#236
define(function(require) {

    'use strict';

    var util = require('../core/util.js');
    var Dispatcher = require('../core/event.js').Dispatcher;

    var requestAnimationFrame = (typeof window !== 'undefined' &&
                                    (window.requestAnimationFrame
                                    || window.msRequestAnimationFrame
                                    || window.mozRequestAnimationFrame
                                    || window.webkitRequestAnimationFrame))
                                || function (func) {
                                    setTimeout(func, 16);
                                };

    var Animator = require('./Animator');
    /**
     * @typedef {Object} IZRenderStage
     * @property {Function} update
     */

    /**
     * @alias module:zrender/animation/Animation
     * @constructor
     * @param {Object} [options]
     * @param {Function} [options.onframe]
     * @param {IZRenderStage} [options.stage]
     * @example
     *     var animation = new Animation();
     *     var obj = {
     *         x: 100,
     *         y: 100
     *     };
     *     animation.animate(node.position)
     *         .when(1000, {
     *             x: 500,
     *             y: 500
     *         })
     *         .when(2000, {
     *             x: 100,
     *             y: 100
     *         })
     *         .start('spline');
     */
    var Animation = function (options) {

        options = options || {};

        this.stage = options.stage || {};

        this.onframe = options.onframe || function() {};

        // private properties
        this._clips = [];

        this._running = false;

        this._time = 0;

        Dispatcher.call(this);
    };

    Animation.prototype = {

        constructor: Animation,
        /**
         * æ·»åŠ  clip
         * @param {module:zrender/animation/Clip} clip
         */
        addClip: function (clip) {
            this._clips.push(clip);
        },
        /**
         * æ·»åŠ  animator
         * @param {module:zrender/animation/Animator} animator
         */
        addAnimator: function (animator) {
            animator.animation = this;
            var clips = animator.getClips();
            for (var i = 0; i < clips.length; i++) {
                this.addClip(clips[i]);
            }
        },
        /**
         * åˆ é™¤åŠ¨ç”»ç‰‡æ®µ
         * @param {module:zrender/animation/Clip} clip
         */
        removeClip: function(clip) {
            var idx = util.indexOf(this._clips, clip);
            if (idx >= 0) {
                this._clips.splice(idx, 1);
            }
        },

        /**
         * åˆ é™¤åŠ¨ç”»ç‰‡æ®µ
         * @param {module:zrender/animation/Animator} animator
         */
        removeAnimator: function (animator) {
            var clips = animator.getClips();
            for (var i = 0; i < clips.length; i++) {
                this.removeClip(clips[i]);
            }
            animator.animation = null;
        },

        _update: function() {

            var time = new Date().getTime();
            var delta = time - this._time;
            var clips = this._clips;
            var len = clips.length;

            var deferredEvents = [];
            var deferredClips = [];
            for (var i = 0; i < len; i++) {
                var clip = clips[i];
                var e = clip.step(time);
                // Throw out the events need to be called after
                // stage.update, like destroy
                if (e) {
                    deferredEvents.push(e);
                    deferredClips.push(clip);
                }
            }

            // Remove the finished clip
            for (var i = 0; i < len;) {
                if (clips[i]._needsRemove) {
                    clips[i] = clips[len - 1];
                    clips.pop();
                    len--;
                }
                else {
                    i++;
                }
            }

            len = deferredEvents.length;
            for (var i = 0; i < len; i++) {
                deferredClips[i].fire(deferredEvents[i]);
            }

            this._time = time;

            this.onframe(delta);

            this.trigger('frame', delta);

            if (this.stage.update) {
                this.stage.update();
            }
        },
        /**
         * å¼€å§‹è¿è¡ŒåŠ¨ç”»
         */
        start: function () {
            var self = this;

            this._running = true;

            function step() {
                if (self._running) {

                    requestAnimationFrame(step);

                    self._update();
                }
            }

            this._time = new Date().getTime();
            requestAnimationFrame(step);
        },
        /**
         * åœæ­¢è¿è¡ŒåŠ¨ç”»
         */
        stop: function () {
            this._running = false;
        },
        /**
         * æ¸…é™¤æ‰€æœ‰åŠ¨ç”»ç‰‡æ®µ
         */
        clear: function () {
            this._clips = [];
        },
        /**
         * å¯¹ä¸€ä¸ªç›®æ ‡åˆ›å»ºä¸€ä¸ªanimatorå¯¹è±¡ï¼Œå¯ä»¥æŒ‡å®šç›®æ ‡ä¸­çš„å±žæ€§ä½¿ç”¨åŠ¨ç”»
         * @param  {Object} target
         * @param  {Object} options
         * @param  {boolean} [options.loop=false] æ˜¯å¦å¾ªçŽ¯æ’­æ”¾åŠ¨ç”»
         * @param  {Function} [options.getter=null]
         *         å¦‚æžœæŒ‡å®šgetterå‡½æ•°ï¼Œä¼šé€šè¿‡getterå‡½æ•°å–å±žæ€§å€¼
         * @param  {Function} [options.setter=null]
         *         å¦‚æžœæŒ‡å®šsetterå‡½æ•°ï¼Œä¼šé€šè¿‡setterå‡½æ•°è®¾ç½®å±žæ€§å€¼
         * @return {module:zrender/animation/Animation~Animator}
         */
        animate: function (target, options) {
            options = options || {};
            var animator = new Animator(
                target,
                options.loop,
                options.getter,
                options.setter
            );

            return animator;
        }
    };

    util.mixin(Animation, Dispatcher);

    return Animation;
});
