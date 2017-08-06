/**
 * åŠ¨ç”»ä¸»æŽ§åˆ¶å™¨
 * @config target åŠ¨ç”»å¯¹è±¡ï¼Œå¯ä»¥æ˜¯æ•°ç»„ï¼Œå¦‚æžœæ˜¯æ•°ç»„çš„è¯ä¼šæ‰¹é‡åˆ†å‘onframeç­‰äº‹ä»¶
 * @config life(1000) åŠ¨ç”»æ—¶é•¿
 * @config delay(0) åŠ¨ç”»å»¶è¿Ÿæ—¶é—´
 * @config loop(true)
 * @config gap(0) å¾ªçŽ¯çš„é—´éš”æ—¶é—´
 * @config onframe
 * @config easing(optional)
 * @config ondestroy(optional)
 * @config onrestart(optional)
 *
 * TODO pause
 */
define(function(require) {

    var easingFuncs = require('./easing');

    function Clip(options) {

        this._target = options.target;

        // ç”Ÿå‘½å‘¨æœŸ
        this._life = options.life || 1000;
        // å»¶æ—¶
        this._delay = options.delay || 0;
        // å¼€å§‹æ—¶é—´
        // this._startTime = new Date().getTime() + this._delay;// å•ä½æ¯«ç§’
        this._initialized = false;

        // æ˜¯å¦å¾ªçŽ¯
        this.loop = options.loop == null ? false : options.loop;

        this.gap = options.gap || 0;

        this.easing = options.easing || 'Linear';

        this.onframe = options.onframe;
        this.ondestroy = options.ondestroy;
        this.onrestart = options.onrestart;
    }

    Clip.prototype = {

        constructor: Clip,

        step: function (time) {
            // Set startTime on first step, or _startTime may has milleseconds different between clips
            // PENDING
            if (!this._initialized) {
                this._startTime = new Date().getTime() + this._delay;
                this._initialized = true;
            }

            var percent = (time - this._startTime) / this._life;

            // è¿˜æ²¡å¼€å§‹
            if (percent < 0) {
                return;
            }

            percent = Math.min(percent, 1);

            var easing = this.easing;
            var easingFunc = typeof easing == 'string' ? easingFuncs[easing] : easing;
            var schedule = typeof easingFunc === 'function'
                ? easingFunc(percent)
                : percent;

            this.fire('frame', schedule);

            // ç»“æŸ
            if (percent == 1) {
                if (this.loop) {
                    this.restart();
                    // é‡æ–°å¼€å§‹å‘¨æœŸ
                    // æŠ›å‡ºè€Œä¸æ˜¯ç›´æŽ¥è°ƒç”¨äº‹ä»¶ç›´åˆ° stage.update åŽå†ç»Ÿä¸€è°ƒç”¨è¿™äº›äº‹ä»¶
                    return 'restart';
                }

                // åŠ¨ç”»å®Œæˆå°†è¿™ä¸ªæŽ§åˆ¶å™¨æ ‡è¯†ä¸ºå¾…åˆ é™¤
                // åœ¨Animation.updateä¸­è¿›è¡Œæ‰¹é‡åˆ é™¤
                this._needsRemove = true;
                return 'destroy';
            }

            return null;
        },

        restart: function() {
            var time = new Date().getTime();
            var remainder = (time - this._startTime) % this._life;
            this._startTime = new Date().getTime() - remainder + this.gap;

            this._needsRemove = false;
        },

        fire: function(eventType, arg) {
            eventType = 'on' + eventType;
            if (this[eventType]) {
                this[eventType](this._target, arg);
            }
        }
    };

    return Clip;
});
